<?php

namespace App\Http\Middleware;

use Closure;

class AccessRedirector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $access)
    {
        if($request->user()->access != $access && $request->user()->access != 0){
            return redirect('/profile');
        }

        return $next($request);
    }
}
