<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentPositionOfRespDetails;
use Illuminate\Support\Facades\Auth;

class StudentPositionOfRespDetailsController extends Controller
{
    public function store(Request $request)
    {
        $student = new StudentPositionOfRespDetails;
        $student->user_id = Auth::id();
        $student->description = $request->description;
        $student->save();
        $success = 'success';
        return $success;
    }

    public function show($id)
    {
        $student = StudentPositionOfRespDetails::findOrFail($id);
        return $student;
    }

    public function update(Request $request, $id)
    {
        $student = StudentPositionOfRespDetails::findOrFail($id);
        $student->user_id = Auth::id();
        $student->description = $request->description;
        $student->update();

        $success = 'success';
        return $success;

    }
}
