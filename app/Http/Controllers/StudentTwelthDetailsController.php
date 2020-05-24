<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTwelthDetails;
use Illuminate\Support\Facades\Auth;

class StudentTwelthDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentTwelthDetails;
        $student->user_id = $this_user_id;
        $student->status = $request->status;
        $student->school_name = $request->school_name;
        $student->year_of_completion = $request->year_of_completion;
        $student->stream = $request->stream;
        $student->board = $request->board;
        $student->gpa_score = $request->score;
        $student->save();

        $success = 'success';
        return $success;
    }
}
