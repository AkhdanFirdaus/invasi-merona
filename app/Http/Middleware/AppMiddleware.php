<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $roles = explode("&", $roles);
        if (!in_array($request->user()->role, $roles)) {
            return redirect()->back();
        }
        return $next($request);
    }
}
