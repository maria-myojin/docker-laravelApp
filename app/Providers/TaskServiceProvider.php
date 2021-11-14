<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\TaskRepositoryInterface::class,
            \App\Repositories\TaskRepository::class
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
