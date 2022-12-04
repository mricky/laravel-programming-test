<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public $singletons = [
        UserService::class => UserServiceImpl::class
    ];
  
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    //    $this->app->singleton('user',function ($app){
    //       return new UserService();
    //    });
    }

    public function provides() : array
    {
        return [IUserService::class];
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
