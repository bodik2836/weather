<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }
}
