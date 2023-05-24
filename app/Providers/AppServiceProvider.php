<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('sale_and_admin', function () {
            return auth()->user() && Auth::user()->role == 2 || Auth::user()->role == 1;
        });
        Blade::if('super_admin', function () {
            return auth()->user() &&  Auth::user()->role == 1;
        });
    }
}
