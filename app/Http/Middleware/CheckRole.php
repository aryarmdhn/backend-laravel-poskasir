<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->hasRole($roles)) {
            // Jika user tidak memiliki role yang diizinkan, redirect ke home
            return redirect('/home');
        }

        return $next($request);
    }
}
