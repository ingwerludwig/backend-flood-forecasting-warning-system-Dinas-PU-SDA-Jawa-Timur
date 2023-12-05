<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsersRolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\UsersRoleService', 'App\Services\Impl\UsersRoleServiceImpl');
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
