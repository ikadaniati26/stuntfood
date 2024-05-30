<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $sesion = session()->all();
        // dd($sesion);
        if (session()->has('Role')) {
            return $next($request);
            // $username = session('username');
            // dd($username);
        }

        return redirect()->route('login');
    }
}
