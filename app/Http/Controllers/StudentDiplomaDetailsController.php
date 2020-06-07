<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDiplomaDetails;
use Illuminate\Support\Facades\Auth;
use App\Colleges;
use App\Degrees;
use App\Streams;

class StudentDiplomaDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;

        $student = StudentDiplomaDetails::where('user_id',$this_user_id)->first();
        if($student){
            $student->user_id = $this_user_id;
            $student->status = $request->status;
            $student->college_id = $request->college_id;
            $student->start_year = $request->start_year;
            $student->end_year = $request->end_year;
            $student->degree_id = $request->degree_id;
            $student->stream_id = $request->stream_id;
            $student->gpa_score = $request->gpa_score;
            $student->update();
        }else{
            $new_student = new StudentDiplomaDetails;
            $new_student->user_id = $this_user_id;
            $new_student->status = $request->status;
            $new_student->college_id = $request->college_id;
            $new_student->start_year = $request->start_year;
            $new_student->end_year = $request->end_year;
            $new_student->degree_id = $request->degree_id;
            $new_student->stream_id = $request->stream_id;
            $new_student->gpa_score = $request->gpa_score;
            $new_student->save();
        }

        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $this_user_id = auth()->user()->id;

        $student = StudentDiplomaDetails::where('user_id',$this_user_id)->first();
        if($student){
            $student->college_name = Colleges::where('id',$student->college_id)->value('name');
            $student->degree_name = Degrees::where('id',$student->degree_id)->value('title');
            $student->stream_name = Streams::where('id',$student->stream_id)->value('title');
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
