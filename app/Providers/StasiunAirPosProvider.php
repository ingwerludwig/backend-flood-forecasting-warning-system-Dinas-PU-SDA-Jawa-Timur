<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StasiunAirPosProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\StasiunAirPosService', 'App\Services\Impl\StasiunAirPosServiceImpl');
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
