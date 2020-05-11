<?php

namespace App\Http\Middleware;

use Closure;

class Mita
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="mitra")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect('mitra');
        }
        return $next($request);
    }
}
