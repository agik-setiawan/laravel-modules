<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\TestLib;

class Test extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Lib\TestLib',function($app){
            return new TestLib();
        });
    }
}
