<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTenthDetails;
use Illuminate\Support\Facades\Auth;

class StudentTenthDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = Auth::id();

        $student = StudentTenthDetails::where('user_id',$this_user_id)->first();
        if($student){
            $student->user_id = $this_user_id;
            $student->status = $request->status;
            $student->school_name = $request->school_name;
            $student->year_of_completion = $request->year_of_completion;
            $student->board = $request->board;
            $student->gpa_score = $request->gpa_score;
            $student->update();
        }else{
            $new_student = new StudentTenthDetails;
            $new_student->user_id = $this_user_id;
            $new_student->status = $request->status;
            $new_student->school_name = $request->school_name;
            $new_student->year_of_completion = $request->year_of_completion;
            $new_student->board = $request->board;
            $new_student->gpa_score = $request->gpa_score;
            $new_student->save();
        }

        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $student = StudentTenthDetails::where('user_id',Auth::id())->first();
        if($student){
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
