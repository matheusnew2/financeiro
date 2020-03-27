<?php

namespace App\Http\Middleware;

use Closure;

class Autenticar
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
        if($request->session()->get('key') === NULL){
            return redirect("/erro");
        }
        return $next($request);
    }
}