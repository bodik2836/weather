<?php

namespace App\Http\Controllers\Api\OpenWeatherMap;

use App\Http\Controllers\Controller;
use App\Services\OpenWeatherMapApi\GeocodingApi\GeocodingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeocodingController extends Controller
{
    public function __construct(
        protected GeocodingService $geocodingApi
    ) {
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function geo(Request $request): Response
    {
        $data = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        return $this->geocodingApi->coordinatesByLocation($data);
    }
}
