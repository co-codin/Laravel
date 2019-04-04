<?php

namespace App\Providers;

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
        resolve(EngineManager::class)->extend('elasticsearch', function () {
            return new ElasticSearchEngine();
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
