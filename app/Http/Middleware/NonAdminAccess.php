<?php

namespace TheParadigmArticles\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use TheParadigmArticles\User;


class NonAdminAccess
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
        $user = User::where('url', $request->user_url)->first();
        if ($user && $user->isAdmin == 1)
        {
            return redirect()->route('home', ['#non-admin-only']);
        }
        return $next($request);
    }
}
