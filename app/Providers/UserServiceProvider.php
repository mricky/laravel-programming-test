<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    // public $singletons = [
    //     UserService::class => UserServiceImpl::class
    // ];
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
       $this->app->singleton('App\Services\UserService',function ($app){
          return new UserServiceImpl();
       });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
   
}
