<?php

namespace App\Providers;

use Elasticsearch\ClientBuilder;
use Laravel\Scout\EngineManager;
use Illuminate\Support\ServiceProvider;
use App\Search\Engine\ElasticSearchEngine;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('elasticsearch', function () {
            return ClientBuilder::create()
                                ->setHosts([
                                    'localhost:9200'
                                ])
                                ->build();
        });

        resolve(EngineManager::class)->extend('elasticsearch', function () {
            return new ElasticSearchEngine(
                app('elasticsearch')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
