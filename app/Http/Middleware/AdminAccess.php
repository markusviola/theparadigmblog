<?php

namespace App\Http\Middleware;

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
        if (Auth::user() == null ||
            Auth::user()->isAdmin != 1)
        {
<<<<<<< HEAD
            return redirect()->route('home');
=======
            return redirect('/');
>>>>>>> registered users and admins can now be separated
        }
        return $next($request);
    }
}
