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

        return response()->json(['error' => 'Token invalid'], 401);
    }

    /**
     * @param String $token
     * @return bool
     */
    public function validateParentheses(string $token)
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
                    if (array_pop($stack) !== '[') {
                        return false;
                    }
                    break;
                case '}':
                    if (array_pop($stack) !== '{') {
                        return false;
                    }
                    break;
                case ')':
                    if (array_pop($stack) !== '(') {
                        return false;
                    }
                    break;
                default:
                    return false;
            }
        }

        return empty($stack);
    }
}
