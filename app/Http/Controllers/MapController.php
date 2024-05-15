<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use Illuminate\Http\Request;
use GoogleMaps;

use function PHPUnit\Framework\returnSelf;

class MapController extends Controller
{

    public function showMap(Circuit $circuit)
    {
        return view('map', compact('circuit'));
    }
}
