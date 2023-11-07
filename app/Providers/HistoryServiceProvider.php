<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\HistoryService', 'App\Services\Impl\HistoryServiceImpl');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
