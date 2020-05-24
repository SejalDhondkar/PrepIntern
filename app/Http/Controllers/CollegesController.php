<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colleges;

class CollegesController extends Controller
{
    public function getCollege(Request $request)
    {
        $collegesearchquery = $request->collegesearchquery;
        $data = Colleges::where('name','like','%'.$collegesearchquery.'%')->get();

        return response()->json($data);
    }
}
