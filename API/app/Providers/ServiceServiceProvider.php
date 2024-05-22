<?php

namespace App\Providers;

use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceEloquent;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TaskService::class, TaskServiceEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
