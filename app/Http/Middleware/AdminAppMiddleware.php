<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role != 2) {
            return redirect()->back();
        }
        return $next($request);
    }
}
