<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!class_exists('App\Http\Controllers\App\Http\Controllers\HomeController')) {
            class_alias(\App\Http\Controllers\HomeController::class, 'App\Http\Controllers\App\Http\Controllers\HomeController');
        }
        if (!class_exists('App\Http\Controllers\App\Http\Controllers\AdminController')) {
            class_alias(\App\Http\Controllers\AdminController::class, 'App\Http\Controllers\App\Http\Controllers\AdminController');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
