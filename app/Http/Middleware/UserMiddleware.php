<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->getOriginal('rank_id') == 3){
            return redirect('/profile');
        }
        else if(auth()->check() && auth()->user()->getOriginal('rank_id') == 1)
        {
            return redirect('/admin');
        }
        else if(auth()->check() && auth()->user()->getOriginal('rank_id') == 2)
        {
            return redirect('/employee');
        }

        return $next($request);
    }
}
