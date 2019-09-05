<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class errorHandleController extends Controller
{
    public function errorPage(){
        return view('errorHandle.errorPage');
    }
}
