<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class IsRental
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('level_akses')){
            if ((Session::get('level_akses') == 'Rental') ){
                return $next($request);        
            }    
            return redirect()->back();
        }
        else {
            return route('logout');
        }
    }
}
