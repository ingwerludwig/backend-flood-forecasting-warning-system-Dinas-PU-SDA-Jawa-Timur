<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StasiunAirPosProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\StasiunAirPosService', 'App\Services\Impl\StasiunAirPosServiceImpl');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
