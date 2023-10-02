<?php

namespace App\Http\Controllers\Geocoding;

use App\Http\Controllers\Controller;
use App\Services\GeocodingApi\GeocodingService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeoController extends Controller
{
    protected string $weatherUri = 'https://api.openweathermap.org/data/2.5/weather';

    public function __construct(
        protected GeocodingService $geocodingApi
    ) {}

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function geo(Request $request): Response
    {
        $data = $request->validate([
            'location' => 'string|max:255'
        ]);

        return $this->geocodingApi->coordinatesByLocation($data);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function weather(Request $request): Response
    {
        $data = $request->validate([
            'lat' => 'required|string|max:255',
            'lon' => 'required|string|max:255'
        ]);

        $client = new Client(['base_uri' => $this->weatherUri]);
        $response = $client->request('GET', '', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'query' => [
                'lat' => $data['lat'],
                'lon' => $data['lon'],
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric',
            ]
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
