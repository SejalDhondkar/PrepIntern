<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;

class CitiesController extends Controller
{
    public function getCity(Request $request)
    {
        $state_id = $request->state_id;
        $citysearchquery = $request->citysearchquery;
        $data = Cities::where('state_id',$state_id)->where('name','like','%'.$citysearchquery.'%')->get();

        return response()->json($data);        

    }
}
