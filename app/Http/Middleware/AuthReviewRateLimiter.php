<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class AuthReviewRateLimiter
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // $limiterName = 'auth_reviews';

        $key = auth()->id();

        if (RateLimiter::tooManyAttempts($key, 10)) {
            return abort(Response::HTTP_TOO_MANY_REQUESTS, 'Too many requests.');
        }

        RateLimiter::hit($key, now()->addHour());

        return $next($request);
    }
}
