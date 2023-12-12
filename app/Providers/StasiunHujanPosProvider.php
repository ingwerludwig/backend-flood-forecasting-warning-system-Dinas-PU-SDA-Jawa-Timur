<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StasiunHujanPosProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\StasiunPosHujanService', 'App\Services\Impl\StasiunHujanPosServiceImpl');
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
