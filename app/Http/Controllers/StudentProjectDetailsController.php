<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProjectDetails;
use Illuminate\Support\Facades\Auth;

class StudentProjectDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = new StudentProjectDetails;
        $student->user_id = Auth::id();
        $student->project_name = $request->project_name;
        $student->start_month = $request->start_month;
        $student->end_month = $request->end_month;
        $student->is_currently_ongoing = $request->is_currently_ongoing;
        $student->description = $request->description;
        $student->project_link = $request->project_link;
        $student->save();

        $success = 'success';
        return $success;
    }
}
