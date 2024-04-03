<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateBearerToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        // Validar el formato del token
        if ($token && preg_match('/^Bearer [\[\]\{\}\(\)]+$/', $token)) {
            return $next($request);
        }

        return response()->json(['error' => 'Token inválido'], 401);
    }
}
