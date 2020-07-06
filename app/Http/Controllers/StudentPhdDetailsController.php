<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentPhdDetails;
use Illuminate\Support\Facades\Auth;
use App\Colleges;
use App\Streams;


class StudentPhdDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = StudentPhdDetails::where('user_id',Auth::id())->first();
        if($student){
            $student->user_id = Auth::id();
            $student->status = $request->status;
            $student->college_id = $request->college_id;
            $student->start_year = $request->start_year;
            $student->end_year = $request->end_year;
            $student->stream_id = $request->stream_id;
            $student->gpa_score = $request->gpa_score;
            $student->update();
        }else{
            $new_student = new StudentPhdDetails;
            $new_student->user_id = Auth::id();
            $new_student->status = $request->status;
            $new_student->college_id = $request->college_id;
            $new_student->start_year = $request->start_year;
            $new_student->end_year = $request->end_year;
            $new_student->stream_id = $request->stream_id;
            $new_student->gpa_score = $request->gpa_score;
            $new_student->save();
        }

        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $student = StudentPhdDetails::where('user_id',Auth::id())->first();
        if($student){
            $student->college_name = Colleges::where('id',$student->college_id)->value('name');
            $student->stream_name = Streams::where('id',$student->stream_id)->value('title');
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
