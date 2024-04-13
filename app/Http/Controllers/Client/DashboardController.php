<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        // $token = 'sk.eyJ1IjoiaW5kcmFzeiIsImEiOiJjbHVxaW11MzUxZmExMm1wbmcwbTB2aHE4In0.HlEalQKwdn5EZOOYqMsYyg';

        // $latitude = 40.7128;
        // $longitude = -74.0060;

        return view('pages.index', [
            // 'token' => $token,
            // 'latitude' => $latitude,
            // 'longitude' => $longitude,
        ]);

        // return view('pages.index');
    }
}
