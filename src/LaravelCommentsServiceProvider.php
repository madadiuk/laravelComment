<?php

namespace Imanborumand\LaravelComments;

use Illuminate\Support\ServiceProvider;

class LaravelCommentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {

            $this->publishes([
              __DIR__.'/../config/laravel_comment.php' => config_path('laravel_comment.php'),
            ], 'laravel-comment');

        }




    }
}
