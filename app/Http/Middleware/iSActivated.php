<?php

namespace App\Http\Middleware;

use Closure;

class iSActivated
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
        if($request->user()->status == '0'){

            toast('Your Account is Not Activated!','error')->position('top')->autoClose(4500);

            return redirect('/profile');
        }else{
            return $next($request);
        }


    }
}
