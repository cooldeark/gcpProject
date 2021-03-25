<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testFunctionController extends Controller
{
    public function test001(Request $request){
        dd(url('/'));
    }
}
