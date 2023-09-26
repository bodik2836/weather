<?php

namespace App\Http\Controllers\Geocoding;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeoController extends Controller
{
    protected string $geoUri = 'https://api.openweathermap.org/geo/1.0/direct';
    protected string $weatherUri = 'https://api.openweathermap.org/data/2.5/weather';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function geo(Request $request): Response
    {
        $data = $request->validate([
            'location' => 'string|max:255'
        ]);

        $client = new Client(['base_uri' => $this->geoUri]);
        $response = $client->request('GET', '', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'query' => [
                'q' => $data['location'],
                'limit' => 5,
                'appid' => env('WEATHER_API_KEY')
            ]
        ]);

        return response(json_decode($response->getBody()->getContents()), $response->getStatusCode());
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
//        dd(json_decode($response->getBody()->getContents()));

        return response($response->getBody()->getContents(), $response->getStatusCode());
    }
}
