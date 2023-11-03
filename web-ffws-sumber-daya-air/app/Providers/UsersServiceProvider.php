<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\UserService', 'App\Services\Impl\UserServiceImpl');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
