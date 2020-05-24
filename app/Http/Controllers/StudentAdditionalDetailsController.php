<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAdditionalDetails;
use Illuminate\Support\Facades\Auth;

class StudentAdditionalDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentAdditionalDetails;
        $student->user_id = $this_user_id;
        $student->description = $request->description;
        $student->save();

        $success = 'success';
        return $success;
    }
}
