<?php

namespace App\Providers;

use App\Services\Impl\CartServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function boot()
    {
        //
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\CartService',function($app){
                return new CartServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
   
}
