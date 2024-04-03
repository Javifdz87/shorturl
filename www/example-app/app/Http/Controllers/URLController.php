<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class URLController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|string',
        ]);

        $url = $request->input('url');

        $response = Http::post('https://tinyurl.com/api-create.php', [
            'url' => $url,
        ]);

        $shortUrl = $response->body();

        return response()->json(['short_url' => $shortUrl], 200, [], JSON_UNESCAPED_SLASHES);
    }

}
