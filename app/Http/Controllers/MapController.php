<?php

namespace App\Http\Controllers;

use App\Models\Buildign;
use App\Models\Circuit;
use App\Models\Path;
use Illuminate\Http\Request;
use GoogleMaps;

use function PHPUnit\Framework\returnSelf;

class MapController extends Controller
{

    public function circuit_map_index(Circuit $circuit)
    {
        return view('circuit_map', compact('circuit'));
    }

    public function building_map_index(string $id)
    {
        $circuit = Path::select('latitude AS lat', 'longitude AS lng')->where('circuit_id', $id)->get();
        $buildingsOfCircuit = Buildign::select('latitude AS lat', 'longitude AS lng')->where('circuit_id', $id)->get();

        return view('building_map', compact('circuit', 'id', 'buildingsOfCircuit'));
    }
}
