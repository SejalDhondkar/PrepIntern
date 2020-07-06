<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInternshipDetails;
use Illuminate\Support\Facades\Auth;

class StudentInternshipDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = new StudentInternshipDetails;
        $student->user_id = Auth::id();
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
