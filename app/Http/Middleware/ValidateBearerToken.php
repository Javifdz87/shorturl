<?php

namespace App\Http\Middleware;

use Closure;

class ValidateBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if ($token !== null && $this->validateParentheses($token)) {
            return $next($request);
        }

        return response()->json(['error' => 'Token inválido'], 401);

    }

    private function validateParentheses($token)
    {
        $stack = [];

        foreach (str_split($token) as $char) {
            switch ($char) {
                case '[':
                case '{':
                case '(':
                    array_push($stack, $char);
                    break;
                case ']':
                    if (empty($stack) || array_pop($stack) !== '[') {
                        return false;
                    }
                    break;
                case '}':
                    if (empty($stack) || array_pop($stack) !== '{') {
                        return false;
                    }
                    break;
                case ')':
                    if (empty($stack) || array_pop($stack) !== '(') {
                        return false;
                    }
                    break;
            }
        }

        return empty($stack);
    }
}
