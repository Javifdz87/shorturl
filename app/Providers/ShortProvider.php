<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;


class ShortProvider extends ServiceProvider
{
    protected $httpClient;
    protected $url;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->httpClient = new Http();
        $this->url = 'https://tinyurl.com/api-create.php';
    }

    /**
     * @param $url
     * @return string
     */
    public function getShortURL($shortURL)
    {
        $response = $this->httpClient::get($this->url, [
            'url' => $shortURL,
        ]);

        return $response->body();
    }
}
