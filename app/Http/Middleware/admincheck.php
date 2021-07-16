<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class admincheck
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
      if(Auth::user()){
        if (Auth::user()->email != "admin@gmail.com"){
          return redirect('/');
        }
        else{
          return $next($request);
        }
      }
      else{
        return redirect('/');
      }


    }

}
