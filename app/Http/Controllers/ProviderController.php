<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\TestLib;
class ProviderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestLib $aa)
    {
        return $aa->show();
    }
}
