<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTrainingDetails;
use Illuminate\Support\Facades\Auth;
use App\Cities;

class StudentTrainingDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = new StudentTrainingDetails;
        $student->user_id = Auth::id();
        $student->training_program = $request->training_program;
        $student->organization = $request->organization;
        $student->city_id = $request->city_id;
        $student->is_online = $request->is_online;
        $student->start_date = $request->start_date;
        $student->end_date = $request->end_date;
        $student->is_currently_ongoing = $request->is_currently_ongoing;
        $student->description = $request->description;
        $student->save();

        $success = 'success';
        return $success;
    }

    public function show($id)
    {
        $student = StudentTrainingDetails::findOrFail($id);
        $student->city_name = Cities::where('id',$student->city_id)->value('name');
        return $student;
    }

    public function update(Request $request, $id)
    {
        $student = StudentTrainingDetails::findOrFail($id);
        $student->user_id = Auth::id();
        $student->training_program = $request->training_program;
        $student->organization = $request->organization;
        $student->city_id = $request->city_id;
        $student->is_online = $request->is_online;
        $student->start_date = $request->start_date;
        $student->end_date = $request->end_date;
        $student->is_currently_ongoing = $request->is_currently_ongoing;
        $student->description = $request->description;
        $student->update();

        $success = 'success';
        return $success;

    }
}
