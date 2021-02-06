<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\CacheMessages;
use App\Repositories\CacheUsers;
use App\Repositories\MessagesInterface;
use App\Repositories\UsersInterface;

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
        $this->app->bind(
            MessagesInterface::class, 
            CacheMessages::class
        );
        
        $this->app->bind(
            UsersInterface::class, 
            CacheUsers::class
        );
    }
}
