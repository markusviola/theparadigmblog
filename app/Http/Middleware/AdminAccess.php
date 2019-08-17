<?php

namespace TheParadigmArticles\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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
        if (!Auth::check() ||
            Auth::user()->isAdmin != 1)
        {
            return redirect()->route('home', ['#admin-only']);
        }
        return $next($request);
    }
}
