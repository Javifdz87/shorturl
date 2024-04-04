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

        $url = $request->url;

        $response = Http::get('https://tinyurl.com/api-create.php', [
            'url' => $url,
        ]);

        $shortenedUrl = $response->body();


        return response()->json(['url' => "<".$shortenedUrl.">"], 200, [], JSON_UNESCAPED_SLASHES);
    }

}
