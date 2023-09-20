<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $uri = 'https://api.openweathermap.org/data/3.0/onecall';

    public function index(Request $request)
    {
        return view('index');
    }
}
