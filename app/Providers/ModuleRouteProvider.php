<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ModuleRouteProvider extends ServiceProvider
{

protected $namespace = 'App\Http\Controllers';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
     public function map()
    {
$this->mapWebRoutes();
    }

        /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $modules=[
        ['module'=>'Siswa','namespace'=>'App\Modules\Siswa\Controllers'],
        ['module'=>'Karyawan','namespace'=>'App\Modules\Karyawan\Controllers']
        ];

//looping modules route
foreach ($modules as $setting_module) {
$prefix=strtolower($setting_module['module']);
$namespace=$setting_module['namespace'];
$path=base_path('Modules/'.$setting_module['module'].'/'.'route.php');

Route::prefix($prefix)
        ->middleware('web')
        ->namespace($namespace)
        ->group($path);
}
    }

}
