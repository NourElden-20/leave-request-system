<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->employee_type === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
