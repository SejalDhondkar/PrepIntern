<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAdditionalDetails;
use Illuminate\Support\Facades\Auth;

class StudentAdditionalDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;

        $student = StudentAdditionalDetails::where('user_id',$this_user_id)->first();
        if($student){
            $student->user_id = $this_user_id;
            $student->description = $request->description;
            $student->update();
        }else{
            $new_student = new StudentAdditionalDetails;
            $new_student->user_id = $this_user_id;
            $new_student->description = $request->description;
            $new_student->save();
        }

        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $this_user_id = auth()->user()->id;

        $student = StudentAdditionalDetails::where('user_id',$this_user_id)->first();
        if($student){
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
