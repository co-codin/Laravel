<?php

namespace App\Providers;

use App\{Project, Task};
use Illuminate\Support\ServiceProvider;
use App\Observers\{ProjectObserver, TaskObserver};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Project::observe(ProjectObserver::class);
        Task::observe(TaskObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
