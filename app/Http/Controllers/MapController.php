<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;

class MapController extends Controller
{

    public function showMap(Request $request)
    {
        $latitude = 40.7128; // Example: New York City
        $longitude = -74.0059;

        return view('map', compact('latitude', 'longitude'));
    }
}
