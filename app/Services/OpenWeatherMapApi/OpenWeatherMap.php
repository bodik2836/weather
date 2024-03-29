<?php

namespace App\Services\OpenWeatherMapApi;

abstract class OpenWeatherMap
{
    const API_URIs = [
        'geocoding'       => 'https://api.openweathermap.org/geo/1.0/direct',
        'current_weather' => 'https://api.openweathermap.org/data/2.5/weather',
        'forecast'        => 'https://api.openweathermap.org/data/2.5/forecast',
    ];
    private string $weatherApiKey = '';

    public function __construct()
    {
        $this->weatherApiKey = config('app.weather_api_key');
    }

    public function getWeatherApiKey(): string
    {
        return $this->weatherApiKey;
    }
}
