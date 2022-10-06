<?php

namespace App\Providers;

use App\View\Components\NavigationComposer;
use Illuminate\Support\ServiceProvider;
use Cart;
use View;

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
        view()->composer(['layouts.navbar._shared._responsive-nav','layouts.sidebar'], NavigationComposer::class);
    }
}
