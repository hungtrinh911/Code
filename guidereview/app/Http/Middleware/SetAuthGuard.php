<?php

namespace App\Http\Middleware;

use App\Helper;
use Closure;
use Illuminate\Support\Facades\Auth;

class SetAuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Helper::currentRoutePrefix(true) == env('BACKEND_ALIAS')) {
            Auth::shouldUse('backend');
        }
        return $next($request);
    }
}
