<?php

namespace App\Services\OpenWeatherMapApi\GeocodingApi;

use App\Services\OpenWeatherMapApi\OpenWeatherMap;
use GuzzleHttp\Client;
use Illuminate\Http\Response;

class GeocodingService extends OpenWeatherMap
{
    protected string $geoUri = self::API_URIs['geocoding'];

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function coordinatesByLocation(array $data): Response
    {
        $client = new Client(['base_uri' => $this->geoUri]);
        $response = $client->request('GET', '', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'query' => [
                'q' => $data['location'],
                'limit' => $data['limit'] ?? 5,
                'appid' => $this->getWeatherApiKey()
            ]
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
