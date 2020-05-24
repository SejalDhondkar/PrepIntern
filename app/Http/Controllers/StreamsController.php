<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Streams;

class StreamsController extends Controller
{
    public function getStream(Request $request)
    {
        $streamsearchquery = $request->streamsearchquery;
        $data = Streams::where('title','like','%'.$streamsearchquery.'%')->get();

        return response()->json($data);
    }
}
