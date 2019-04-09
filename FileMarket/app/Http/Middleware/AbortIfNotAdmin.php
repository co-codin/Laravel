<?php

namespace App\Http\Middleware;

use Closure;

class AbortIfNotAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->hasRole('admin')) {
            return abort(404);
        }

        return $next($request);
    }
}
