<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Http\Controllers\URLController;

class URLTest extends TestCase
{
    /** @test */
    public function comprobar_url_envio_no_nulo()
    {
        $request = Request::create('/shorten', 'POST', ['url' => 'https://example.com']);

        $controller = new URLController();

        $response = $controller->shorten($request);

        $this->assertNotNull($response->content());
    }

    /** @test */
    public function comprobar_json_respuesta_shorten()
    {
        $request = Request::create('/shorten', 'POST', ['url' => 'https://example.com']);

        $controller = new URLController();

        $response = $controller->shorten($request);

        $this->assertJson($response->content());
    }

}
