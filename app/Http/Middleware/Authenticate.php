<?php

namespace App\Http\Middleware;

use AElnemr\RestFullResponse\CoreJsonResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
    use CoreJsonResponse;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
    // public function handle($request, Closure $next)
    // {
    //     $user = auth('api')->user();
    //     if (!$user) {
    //         return $this->unauthorized();
    //     }
    //     return $next($request);
    // }
}
