<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user() && auth()->user()->role === $role) {
            return $next($request);
        }

        return redirect('/home'); // Or you can redirect to an error page, etc.
    }
}

