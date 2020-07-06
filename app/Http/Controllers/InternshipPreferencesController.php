<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipFields;
use App\Cities;
use App\StudentPrimaryDetails;
use Auth;
class InternshipPreferencesController extends Controller
{
    public function getFields()
    {
        $data = InternshipFields::select('id','title')->get();
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
      $citysearchquery = $request->citysearchquery;
      $data = Cities::where('country_id',Auth::user()->country_id)->where('name','like','%'.$citysearchquery.'%')->get();
      return response()->json($data);
    }

    public function store(Request $request)
    {
        $student = StudentPrimaryDetails::where('user_id',Auth::id())->first();
        $student->fields = json_encode($request->fields);
        $student->type_of_internship_id = $request->type_of_internship_id;
        $student->city_preferences = json_encode($request->city_preferences);
        $student->update();
        $success = 'success';
        return $success;
    }

    public function check()
    {
        $student_id = StudentPrimaryDetails::where('user_id', Auth::id())->value('id');
        if($student_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function checkForDashboard()
    {
        $student_id = StudentPrimaryDetails::where('user_id', Auth::id())->value('type_of_internship_id');
        if($student_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }
}
