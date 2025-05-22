<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('api')->user() && auth('api')->user()->role === 'admin') {
            return $next($request);
        }

        return response()->json([
            'message' => 'No autorizado, solo administradores'
        ], 403);
    }
}
