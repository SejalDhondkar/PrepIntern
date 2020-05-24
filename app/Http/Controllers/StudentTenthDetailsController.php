<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTenthDetails;
use Illuminate\Support\Facades\Auth;

class StudentTenthDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentTenthDetails;
        $student->user_id = $this_user_id;
        $student->status = $request->status;
        $student->school_name = $request->school_name;
        $student->year_of_completion = $request->year_of_completion;
        $student->board = $request->board;
        $student->gpa_score = $request->score;
        $student->save();

        $success = 'success';
        return $success;
    }
}
