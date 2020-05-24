<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDiplomaDetails;
use Illuminate\Support\Facades\Auth;

class StudentDiplomaDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentDiplomaDetails;
        $student->user_id = $this_user_id;
        $student->status = $request->status;
        $student->college_id = $request->college_id;
        $student->start_year = $request->start_year;
        $student->end_year = $request->end_year;
        $student->degree_id = $request->degree_id;
        $student->stream_id = $request->stream_id;
        $student->gpa_score = $request->score;
        $student->save();

        $success = 'success';
        return $success;
    }
}
