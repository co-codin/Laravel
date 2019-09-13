<?php

namespace App\Http\Middleware;

use DB;
use Closure;

class QueryLog
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
        DB::listen(function ($query) {
            info($query->sql);
        });

        return $next($request);
    }
}
