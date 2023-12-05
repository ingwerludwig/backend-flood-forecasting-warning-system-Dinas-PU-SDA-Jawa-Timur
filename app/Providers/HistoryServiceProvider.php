<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\HistoryService', 'App\Services\Impl\HistoryServiceImpl');
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
