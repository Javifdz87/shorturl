<?php

namespace Tests\Unit;

use App\Http\Controllers\URLController;
use Illuminate\Http\Request;
use Tests\TestCase;

class URLTest extends TestCase
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
        $request = Request::create('/shorten', 'POST', ['url' => 'https://example.com']);

        $controller = new URLController();

        $response = $controller->shorten($request);

    }

}
