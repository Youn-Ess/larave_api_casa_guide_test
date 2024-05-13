<?php

namespace App\Http\Controllers;

use App\Models\Buildign;
use App\Models\Circuit;
use App\Models\Path;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\BuildInformation;

class CircuitController extends Controller
{
    //
    public function index()
    {
        $circuits = Circuit::all();
        $building = Buildign::all();
        $circuit = Circuit::all();
        // dd($circuit[0]);
        return view('welcome', compact('circuits', 'building', 'circuit'));
    }

    public function post(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'alternative' => 'required',
            'description' => 'required',
            'audio' => 'required',
            'image' => 'required',
            'headpoint' => 'required',
            'zoom' => 'required',
        ]);

        $circuit = Circuit::create([
            'name' => $request->name,
            'alternative' => $request->alternative,
            'description' => $request->description,
            'description' => $request->description,
            'audio' => $request->audio,
            'headpoint' => $request->headpoint,
            'zoom' => $request->zoom,
        ]);


        $images = $request->file('image');
        foreach ($images as  $image) {
            $image = $image->getClientOriginalName();
            $circuit->images()->create([
                'path' => $image
            ]);
        }


        return back();
    }

    public function path_post(Request $request)
    {
        request()->validate([
            'circuit_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        Path::create([
            'circuit_id' => $request->circuit_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return back();
    }

    public function buildign_post(Request $request)
    {
        request()->validate([
            'circuit_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'audio' => 'required',
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $building =  Buildign::create([
            'circuit_id' => $request->circuit_id,
            'name' => $request->name,
            'description' => $request->description,
            'audio' => $request->audio,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $images = $request->file('image');
        foreach ($images as  $image) {
            $image = $image->getClientOriginalName();
            $building->images()->create([
                'path' => $image
            ]);
        }
        return back();
    }
}
