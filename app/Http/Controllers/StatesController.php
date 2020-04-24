<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\States;

class StatesController extends Controller
{
    public function getStates(Request $request)
    {
        $country_id = $request->country_id;
        $statesearchquery = $request->statesearchquery;
        $data = States::where('country_id',$country_id)->where('name','like','%'.$statesearchquery.'%')->get();

        return response()->json($data);        

    }
}
