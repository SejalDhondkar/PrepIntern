<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;

class CountriesController extends Controller
{
    public function getCountries(Request $request)
    {
        $searchquery = $request->searchquery;
        $data = Countries::where('name','like','%'.$searchquery.'%')->get();
        return response()->json($data);

    }

}
