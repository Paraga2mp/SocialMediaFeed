<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckThemeRole
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
        
        if(!$request->user()->hasRole('Theme Manager'))
        {
            $request->session()->flash('status', 'Denied - You do not have permissions to access Theme Management');
            return redirect()->route('home');
        }
        else {
            return $next($request);
        }
    }
    
}
