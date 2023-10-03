<?php

namespace App\Http\Controllers\Api\OpenWeatherMap;

use App\Http\Controllers\Controller;
use App\Services\OpenWeatherMapApi\WeatherApi\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function __construct(
        protected WeatherService $weatherApi,
    ) {
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function weather(Request $request): Response
    {
        $data = $request->validate([
            'lat' => 'required|string|max:255',
            'lon' => 'required|string|max:255',
        ]);

        return $this->weatherApi->currentWeather($data);
    }
}
