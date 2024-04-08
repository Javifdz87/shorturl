<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Http\Middleware\ValidateBearerToken;


class ShorturlTest extends TestCase
{
    /** @test */
    public function validate()
    {
        $middleware = new ValidateBearerToken();

        $this->assertTrue($middleware->validateParentheses('{}'));
        $this->assertTrue($middleware->validateParentheses('{}[]()'));
        $this->assertFalse($middleware->validateParentheses('{)'));
        $this->assertFalse($middleware->validateParentheses('[{]}'));
        $this->assertTrue($middleware->validateParentheses('{([])}'));
        $this->assertFalse($middleware->validateParentheses('(((((((()'));
        $this->assertTrue($middleware->validateParentheses(''));
    }
}
