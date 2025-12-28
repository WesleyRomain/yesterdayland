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
        // 1. Als iemand niet is ingelogd, stuur dan door naar de loginpagina.
        if(!auth()->check()){
            return redirect()->route('login');
        }

        // 2. Als iemand geen admin is, stuur door naar gewoon dashboard.
        if(!auth()->user()->is_admin){
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
