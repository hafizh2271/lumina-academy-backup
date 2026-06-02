<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

 use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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
    \Illuminate\Auth\Middleware\RedirectIfAuthenticated::redirectUsing(fn () => route('dashboard'));
}
}
