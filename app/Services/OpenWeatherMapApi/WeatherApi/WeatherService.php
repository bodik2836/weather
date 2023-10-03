<?php

namespace App\Services\OpenWeatherMapApi\WeatherApi;

use App\Services\OpenWeatherMapApi\OpenWeatherMap;
use GuzzleHttp\Client;
use Illuminate\Http\Response;

class WeatherService extends OpenWeatherMap
{
    protected string $currentWeatherUri = self::API_URIs['current_weather'];

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function currentWeather(array $data): Response
    {
        $client = new Client(['base_uri' => $this->currentWeatherUri]);
        $response = $client->request('GET', '', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'query' => [
                'lat' => $data['lat'],
                'lon' => $data['lon'],
                'appid' => $this->getWeatherApiKey(),
                'units' => 'metric',
            ]
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
