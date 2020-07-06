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
}
