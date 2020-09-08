<?php

namespace App\Http\Middleware;

use AElnemr\RestFullResponse\CoreJsonResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;

class StudentAuth extends Middleware
{
    use CoreJsonResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth('api')->user();
        if (!$user) {
            return $this->unauthorized();
        }
        return $next($request);
    }
}
