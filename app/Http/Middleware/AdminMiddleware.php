<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->getPathInfo());
        if(!auth()->check() || auth()->user()->getOriginal('rank_id') != 1) {
            if($request->getRequestUri() == '/admin/login'){
                return $next($request);
            }
            return redirect('/');
        }
        return $next($request);
    }
}
