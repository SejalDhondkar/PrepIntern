<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipFields;
use App\Cities;
use Illuminate\Support\Facades\Auth;
use App\StudentPrimaryDetails;

class InternshipPreferencesController extends Controller
{
    public function getFields()
    {
        $data = InternshipFields::select('id','title')->get();
        return response()->json($data);
    }

    public function getCity(Request $request)
    {

        $this_country_id = auth()->user()->country_id;
        $citysearchquery = $request->citysearchquery;
        $data = Cities::where('country_id',$this_country_id)->where('name','like','%'.$citysearchquery.'%')->get();

        return response()->json($data);       

    }

    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;

        $student = StudentPrimaryDetails::where('user_id',$this_user_id)->first();
        $student->fields = json_encode($request->fields);
        $student->type_of_internship_id = $request->type_of_internship_id;
        $student->city_preferences = json_encode($request->city_preferences);
        $student->update();

        $success = 'success';
        return $success;
    }

    public function check()
    {
        $this_user_id = auth()->user()->id;
        $student_id = StudentPrimaryDetails::where('user_id', $this_user_id)->value('id');

        if($student_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function checkForDashboard()
    {
        $this_user_id = auth()->user()->id;
        $student_id = StudentPrimaryDetails::where('user_id', $this_user_id)->value('type_of_internship_id');

        if($student_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }
}
