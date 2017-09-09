<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
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
       $this->publishes([
        __DIR__.'/../Package/module.php' => config_path('module.php'),
    ]);
    }
}
