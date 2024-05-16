<?php

namespace App\Http\Controllers;

use App\Models\Buildign;
use App\Models\Circuit;
use App\Models\Path;
use Illuminate\Http\Request;
use GoogleMaps;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class MapController extends Controller
{

    public function circuit_map_index(Circuit $circuit)
    {
        return view('circuit_map', compact('circuit'));
    }

    public function building_map_index()
    {
        $buildings = Buildign::where('circuit_id', null)->get();
        
        return view('building_map', compact('buildings'));
    }

    public function assign_building_index(string $id)
    {
        $path_of_circuit = Path::select('latitude AS lat', 'longitude AS lng')->where('circuit_id', $id)->get();

        $buildings = Buildign::all()->where('circuit_id', null);

        $circuit = Circuit::where('id', $id)->first();

        return view('assign_building_map', compact('path_of_circuit', 'buildings', 'id', 'circuit'));
    }
}
