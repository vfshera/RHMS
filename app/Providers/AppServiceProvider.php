<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        // custom directive
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->access == 0;
        });

        Blade::if('engineer', function () {
            return auth()->check() && auth()->user()->access == 1;
        });

        Blade::if('contractor', function () {
            return auth()->check() && auth()->user()->access == 2;
        });

        Blade::if('roaduser', function () {
            return auth()->check() && auth()->user()->access == 3;
        });
    }
}
