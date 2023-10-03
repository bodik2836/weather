<?php

namespace App\Services\OpenWeatherMapApi;

abstract class OpenWeatherMap
{
    const API_URIs = [
        'geocoding'       => 'https://api.openweathermap.org/geo/1.0/direct',
        'current_weather' => 'https://api.openweathermap.org/data/2.5/weather',
    ];

    private string $weatherApiKey = '';

    public function __construct()
    {
        $this->weatherApiKey = env('WEATHER_API_KEY');
    }

    public function getWeatherApiKey(): string
    {
        return $this->weatherApiKey;
    }
}
