<?php

namespace App\Http\Middleware;

use Closure;

class UserAccess
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
        if (Auth::user() == null ||
            Auth::user()->isAdmin != 0)
        {
            return redirect()->route('home', ['#regular-only']);
        }
        return $next($request);
    }
}
