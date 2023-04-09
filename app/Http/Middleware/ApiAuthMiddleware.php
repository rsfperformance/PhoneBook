<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    use ApiResponse;

    public function handle(Request $request, Closure $next)
    {

        if (auth('sanctum')->check()) {
            return $next($request);
        }
        return $this->errorResponse('Unauthenticated', '401');
    }
}
