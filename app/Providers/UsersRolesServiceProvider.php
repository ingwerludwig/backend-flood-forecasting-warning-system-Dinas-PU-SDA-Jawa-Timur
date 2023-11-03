<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsersRolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\UsersRoleService', 'App\Services\Impl\UsersRoleServiceImpl');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
