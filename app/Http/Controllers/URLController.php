<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\ShortProvider;

class URLController extends Controller
{
    /**
     * @param Request $request
     * @param ShortProvider $shortProvider
     * @return \Illuminate\Http\JsonResponse
     */
    public function shorten(Request $request, ShortProvider $shortProvider)
    {
        $request->validate([
            'url' => 'required|string',
        ]);

        $url = $request->url;

        $shortenedUrl = $shortProvider->getShortURL($url);

        return response()->json(['url' => "<".$shortenedUrl.">"], 200, [], JSON_UNESCAPED_SLASHES);
    }

}
