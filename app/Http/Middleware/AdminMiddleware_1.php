<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
