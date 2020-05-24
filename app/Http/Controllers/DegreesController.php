<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degrees;

class DegreesController extends Controller
{
    public function getDegree(Request $request)
    {
        $degreesearchquery = $request->degreesearchquery;
        $data = Degrees::where('title','like','%'.$degreesearchquery.'%')->get();

        return response()->json($data);
    }
}
