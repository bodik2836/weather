<?php

namespace App\Services\GeocodingApi;

use GuzzleHttp\Client;
use Illuminate\Http\Response;

class GeocodingService
{
    protected string $geoUri = 'https://api.openweathermap.org/geo/1.0/direct';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function coordinatesByLocation($data): Response
    {
        $client = new Client(['base_uri' => $this->geoUri]);
        $response = $client->request('GET', '', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'query' => [
                'q' => $data['location'],
                'limit' => $data['limit'] ?? 5,
                'appid' => env('WEATHER_API_KEY')
            ]
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
