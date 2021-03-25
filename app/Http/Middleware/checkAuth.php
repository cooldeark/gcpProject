<?php

namespace App\Http\Middleware;

use Closure;
//預設只有上面的Closure
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(is_null(Auth::user())){
            // response()->view('login.loginPage');
            return redirect('/');
        }else{
            return $next($request);
        }
        
    }
}
