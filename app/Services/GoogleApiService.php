<?php

namespace App\Services;

class GoogleApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.googleapis.com/books/v1/volumes',
        ]);
    }

    public function search(string $search)
    {
        $response = $this->client->get("?q=$search");
        return json_decode($response->getBody()->getContents(), true);
    }
}
