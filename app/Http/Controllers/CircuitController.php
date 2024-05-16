<?php

namespace App\Http\Controllers;

use App\Models\Buildign;
use App\Models\Circuit;
use App\Models\Path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\BuildInformation;

class CircuitController extends Controller
{
    //
    public function index()
    {
        $circuits = Circuit::all();
        $building = Buildign::all();
        $circuit = Circuit::all();
        return view('welcome', compact('circuits', 'building', 'circuit'));
    }

    public function post(Request $request)
    {
        // dd($request);
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

        return redirect()->route('circuit.index', compact('circuit'));
    }

    public function path_post(Request $request)
    {
        // ! method 1
        // $validator = Validator::make($request->json()->all(), [
        //     '*.circuit_id' => 'nullable|integer', // Adjust validation as needed
        //     '*.latitude' => 'required|numeric|between:-90,90',
        //     '*.longitude' => 'required|numeric|between:-180,180',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors() . 'hahahahhahah', 422);
        // }

        // ! method 2
        $request->validate([
            '*.circuit_id' => 'required',
            '*.latitude' => 'required|numeric|between:-90,90',
            '*.longitude' => 'required|numeric|between:-180,180',
        ]);


        $circuit = $request->json()->all();
        foreach ($circuit as $path) {
            Path::create([
                'circuit_id' => $path['circuit_id'],
                'latitude' => $path['latitude'],
                'longitude' => $path['longitude'],
            ]);
        }

        return response()->json(['route_to_building' => '/building/map/' . $circuit[0]['circuit_id']]);
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

    public function update_building(string $latitude)
    {
        dd($latitude);
    }
}
