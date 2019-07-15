<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\MultiStep\Routing\PendingMultiStepRegistration;

class MultiStepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::macro('multistep', function ($uri, $controller) {
            return new PendingMultiStepRegistration(
                $uri, $controller
            );
        });
    }
}
