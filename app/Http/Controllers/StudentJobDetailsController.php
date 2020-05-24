<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentJobDetails;
use Illuminate\Support\Facades\Auth;

class StudentJobDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentJobDetails;
        $student->user_id = $this_user_id;
        $student->position = $request->position;
        $student->organization = $request->organization;
        $student->city_id = $request->city_id;
        $student->is_work_from_home = $request->is_work_from_home;
        $student->start_date = $request->start_date;
        $student->end_date = $request->end_date;
        $student->is_currently_working = $request->is_currently_working;
        $student->description = $request->description;
        $student->save();

        $success = 'success';
        return $success;
    }
}
