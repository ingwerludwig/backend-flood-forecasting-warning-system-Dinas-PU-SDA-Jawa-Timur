<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NotifikasiKontakProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\NotifikasiKontakService', 'App\Services\Impl\NotifikasiKontakServiceImpl');
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
