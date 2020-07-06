<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAdditionalDetails;
use Auth;

class StudentAdditionalDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = StudentAdditionalDetails::where('user_id',Auth::id())->first();
        if($student){
            $student->user_id = Auth::id();
            $student->description = $request->description;
            $student->update();
        }else{
            $new_student = new StudentAdditionalDetails;
            $new_student->user_id = Auth::id();
            $new_student->description = $request->description;
            $new_student->save();
        }

        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $student = StudentAdditionalDetails::where('user_id',Auth::id())->first();
        if($student){
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
