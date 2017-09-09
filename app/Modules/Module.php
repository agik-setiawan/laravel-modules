<?php
namespace App\Modules;
/**
* 
*/
class Module
{
	
	function __construct()
	{
		# code...
	}

	public static function set_module(){
		return [
		['module'=>'Siswa','namespace'=>'App\Modules\Siswa\Controllers'],
		['module'=>'Karyawan','namespace'=>'App\Modules\Karyawan\Controllers']
		];
	}
}