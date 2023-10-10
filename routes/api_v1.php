<?php

use App\Http\Controllers\Api\ContactFormController;
use App\Http\Controllers\Api\OpenWeatherMap\GeocodingController;
use App\Http\Controllers\Api\OpenWeatherMap\WeatherController;
use App\Http\Controllers\Api\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('geo', [GeocodingController::class, 'geo']);
Route::get('weather', [WeatherController::class, 'weather']);
Route::get('forecast', [WeatherController::class, 'forecast']);

Route::apiResource('subscribers', SubscriberController::class)->only(['store']);
Route::post('contact-form', [ContactFormController::class, 'store']);
