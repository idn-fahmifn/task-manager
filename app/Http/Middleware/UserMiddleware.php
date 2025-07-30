<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::check() && Auth::user()->level == 'admin')
        {
            return redirect()->route('dashboard');
        }elseif(Auth::check() && Auth::user()->level == 'team')
        {
            return redirect()->route('dashboard.team');
        }

        return $next($request);
    }
}
