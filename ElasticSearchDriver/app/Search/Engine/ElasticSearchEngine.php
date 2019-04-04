<?php

namespace App\Search\Engine;

use Elasticsearch\Client;
use Laravel\Scout\Builder;
use Laravel\Scout\Engines\Engine;

class ElasticSearchEngine extends Engine
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Update the given model in the index.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $models
     * @return void
     */
    public function update($models)
    {
        $models->each(function ($model) {
            $params = $this->getRequestBody($model, [
                'id' => $model->id,
                'body' => $model->toSearchableArray()
            ]);

            $this->client->index($params);
        });
    }

    /**
     * Remove the given model from the index.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $models
     * @return void
     */
    public function delete($models)
    {
        $models->each(function ($model) {
            $params = $this->getRequestBody($model, [
                'id' => $model->id
            ]);

            $this->client->delete($params);
        });
    }

    /**
     * Perform the given search on the engine.
     *
     * @param  \Laravel\Scout\Builder  $builder
     * @return mixed
     */
    public function search(Builder $builder)
    {
        return $this->performSearch($builder, [
            'from' => 0,
            'size' => 100
        ]);
    }

    protected function performSearch(Builder $builder, array $options = [])
    {
        $params = array_merge_recursive($this->getRequestBody($builder->model), [
            'body' => [
                'from' => 0,
                'size' => 5000,
                'query' => [
                    'multi_match' => [
                        'query' => $builder->query,
                        'fields' => ['username', 'name', 'email'],
                        'type' => 'phrase_prefix'
                    ]
                ]
            ]
        ], $options);

        return $this->client->search($params);
    }

    /**
     * Perform the given search on the engine.
     *
     * @param  \Laravel\Scout\Builder  $builder
     * @param  int  $perPage
     * @param  int  $page
     * @return mixed
     */
    public function paginate(Builder $builder, $perPage, $page)
    {
        return $this->performSearch($builder, [
            'from' => ($page - 1) * $perPage,
            'size' => 10
        ]);
    }

    /**
     * Pluck and return the primary keys of the given results.
     *
     * @param  mixed  $results
     * @return \Illuminate\Support\Collection
     */
    public function mapIds($results)
    {

    }

    /**
     * Map the given results to instances of the given model.
     *
     * @param  \Laravel\Scout\Builder  $builder
     * @param  mixed  $results
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function map(Builder $builder, $results, $model)
    {
        if (count($hits = array_get($results, 'hits.hits')) === 0) {
            return $model->newCollection();
        }

        return $model->getScoutModelsByIds(
            $builder,
            collect($hits)->pluck('_id')->values()->all()
        );
    }

    /**
     * Get the total count from a raw result returned by the engine.
     *
     * @param  mixed  $results
     * @return int
     */
    public function getTotalCount($results)
    {
        return array_get($results, 'hits.total', 0);
    }

    /**
     * Flush all of the model's records from the engine.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function flush($model)
    {

    }

    protected function getRequestBody($model, array $options = [])
    {
        return array_merge_recursive([
            'index' => $model->searchableAs(),
            'type' => $model->searchableAs(),
        ], $options);
    }
}
