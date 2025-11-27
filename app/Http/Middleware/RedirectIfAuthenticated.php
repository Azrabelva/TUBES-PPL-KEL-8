<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) {

            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (auth()->user()->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return $next($request);
    }
}
