<?php

namespace Tests\Unit;

use App\Http\Controllers\URLController;
use Illuminate\Http\Request;
use Tests\TestCase;

class ShorturlTest extends TestCase
{
    /** @test */
    public function comprobar_url_envio_no_nulo()
    {
        $request = Request::create('/shorten', 'POST', ['url' => 'https://example.com']);

        $controller = new URLController();

        $response = $controller->shorten($request);

        $this->assertNotNull($response->content());
        $this->assertJson($response->content());
    }

    /** @test */
    public function comprobar_parentesis()
    {
        $this->assertTrue($this->isValid('{}'));
        $this->assertTrue($this->isValid('{}[]()'));
        $this->assertFalse($this->isValid('{)'));
        $this->assertFalse($this->isValid('[{]}'));
        $this->assertTrue($this->isValid('{([])}'));
        $this->assertFalse($this->isValid('(((((((()'));
        $this->assertTrue($this->isValid(''));
    }

    private function isValid($string)
    {
        $stack = [];
        $parenthesesMap = [
            '{' => '}',
            '[' => ']',
            '(' => ')',
        ];

        foreach (str_split($string) as $char) {
            if (array_key_exists($char, $parenthesesMap)) {
                array_push($stack, $char);
            } elseif (in_array($char, $parenthesesMap)) {
                if (empty($stack) || $parenthesesMap[array_pop($stack)] !== $char) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}
