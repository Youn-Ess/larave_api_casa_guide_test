<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CircuitResouce;
use App\Models\Circuit;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TestController extends Controller
{
    //

    public function index()
    {
        $circuits = Circuit::all();
        return CircuitResouce::collection($circuits);
        // return response()->json(
        //     $circuits->map(function ($circuit) {
        //         return [
        //             ...$circuit->toArray(),
        //             'paths' => $circuit->paths,
        //             'images' => $circuit->images
        //         ];
        //     })
        // );
    }
}
