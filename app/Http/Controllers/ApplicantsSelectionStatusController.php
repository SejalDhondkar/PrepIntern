<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantsSelectionStatus;

class ApplicantsSelectionStatusController extends Controller
{
    public function changeStatus(Request $request)
    {
        $student = ApplicantsSelectionStatus::where('post_id',$request->post_id)->where('student_id',$request->student_id)->first();
        $student->status = $request->status;
        $student->update();

        $success = 'success';
        return $success;
    }
}
