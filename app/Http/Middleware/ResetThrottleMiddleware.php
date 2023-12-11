<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ResetThrottleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Reset throttling for a specific route
        Cache::forget('throttle:books.reviews.store');

        // Reset throttling for the current IP address
        Cache::forget('throttle:ip:' . $request->ip());

        return $next($request);
    }
}
