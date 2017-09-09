<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ModuleRouteProvider extends ServiceProvider
{
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
        //get module
        $directories = scandir(base_path('app/Modules/'));
        $modules=[];
        foreach ($directories as $dir) {
            if($dir=="."){
                
            }elseif($dir==".."){

            }else{
                array_push($modules, ["module"=>$dir,"namespace"=>"App\Modules\\$dir\Controllers"]);
            }
        }

        /*$modules=[
        ['module'=>'Siswa','namespace'=>'App\Modules\Siswa\Controllers'],
        ['module'=>'Karyawan','namespace'=>'App\Modules\Karyawan\Controllers']
        ];*/

/*$modules=Module::set_module();*/

//looping modules route
foreach ($modules as $setting_module) {
$prefix=strtolower($setting_module['module']);
$namespace=$setting_module['namespace'];
$path=base_path('app/Modules/'.$setting_module['module'].'/'.'route.php');

Route::prefix($prefix)
        ->middleware('web')
        ->namespace($namespace)
        ->group($path);

//config views
$view_path=base_path('app/Modules/'.$setting_module['module'].'/'.'views');
$this->loadViewsFrom($view_path, $prefix);
}

if ($this->app->runningInConsole()) {
        $this->commands([

        ]);
    }

    }

}
