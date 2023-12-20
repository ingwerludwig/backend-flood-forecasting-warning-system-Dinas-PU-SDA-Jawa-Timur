<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NotifikasiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\NotifikasiService', 'App\Services\Impl\NotifikasiServiceImpl');
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
