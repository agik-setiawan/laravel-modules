<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new Modules';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module_name=$this->argument('module');
        $module_path=base_path('app/Modules/'.$module_name);
        
        
        if(!file_exists($module_path)){
            $f_controller=$module_path.'/'.'Controllers';
            $f_models=$module_path.'/'.'Models';
            $f_views=$module_path.'/'.'Views';
            mkdir($module_path,0775);
            mkdir($f_controller,0775);
            mkdir($f_models,0775);
            mkdir($f_views,0775);
           //create file
            $route=fopen($module_path.'/'.'route.php', "w");
            $controller=fopen($f_controller.'/'.$module_name.'Controller.php', "w");
            $model=fopen($f_models.'/'.$module_name.'.php', "w");
            $view=fopen($f_views.'/'.'index.blade.php', "w");

            $txt_controller = "<?php\n";
            $txt_controller .= "namespace App\Modules"."\\$module_name\Controllers".";\n";
            $txt_controller .="\n";
            $txt_controller .="use Illuminate\Routing\Controller;\n";
            $txt_controller .="\n";
            $txt_controller .="class $module_name"."Controller extends Controller{\n";
            $txt_controller .="\n";
            $txt_controller .="public function index(){\n";
            $txt_controller .="return view('".strtolower($module_name)."::index');";
            $txt_controller .="\n";
            $txt_controller .="\n";
            $txt_controller .="}\n";
            $txt_controller .="}\n";
            fwrite($controller, $txt_controller);
            fclose($controller);

            //route
            $txt_route = "<?php\n";
            $txt_route .="\n";
            $txt_route .="Route::get('/',"."'".$module_name."Controller@index');";
            fwrite($route, $txt_route);
            fclose($route);

            //route
            $txt_view ="\n";
            $txt_view .= "<h1>$module_name</h1>";
            $txt_view .="\n";
            fwrite($view, $txt_view);
            fclose($view);

            $this->info('Module '.$module_name.' Telah dibuat'); 
        }else{
            $this->info('Module '.$module_name.' Sudah Ada');
        }
        
        
    }
}
