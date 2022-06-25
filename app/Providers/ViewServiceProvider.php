<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('control-panel.dashboard.index', function ($view) {
            View::share('activeNavItem', 'dashboard');
        });

        View::composer('control-panel.users.*', function ($view) {
            View::share('activeNavItem', 'users');
        });

        View::composer('control-panel.clients.*', function ($view) {
            View::share('activeNavItem', 'clients');
        });

        View::composer('control-panel.organizations.*', function ($view) {
            View::share('activeNavItem', 'organizations');
        });

        View::composer('control-panel.projects.*', function ($view) {
            View::share('activeNavItem', 'projects');
        });

        View::composer('control-panel.tasks.*', function ($view) {
            View::share('activeNavItem', 'tasks');
        });

        View::composer('control-panel.roles.*', function ($view) {
            View::share('activeNavItem', 'roles');
        });
    }
}
