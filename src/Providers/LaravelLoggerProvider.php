<?php

namespace Codelab7\LaravelLogger\Providers;

use Codelab7\LaravelLogger\Commands\Cl7Observation;
use Illuminate\Support\ServiceProvider;

class LaravelLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/cl7_loggers.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','laravel-logger');

        $this->commands([
            Cl7Observation::class
        ]);
    }
}
