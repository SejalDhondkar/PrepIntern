<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StudentPrimaryDetails;
use App\User;

class StudentPrimaryDetailsController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentPrimaryDetails;
        $student->user_id = $this_user_id;
        $student->date_of_birth = $request->date_of_birth;
        $student->save();

        $student = User::findOrFail(Auth::id());
        $student->country_id = $request->country_id;
        $student->state_id = $request->state_id;
        $student->city_id = $request->city_id;
        $student->update();

        $success = 'success';
        return $success;
    }
}
