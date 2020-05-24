<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipAssessmentAnswers;

class InternshipAssessmentAnswersController extends Controller
{
    public function store(Request $request)
    {
        $answer = new InternshipAssessmentAnswers;
        $answer->company_id = $request->company_id;
        $answer->post_id = $request->post_id;
        $answer->student_id = $request->student_id;
        $answer->default_question1_ans = $request->default_question1_ans;
        $answer->default_question2_ans = $request->default_question2_ans;
        $answer->company_question1_ans = $request->company_question1_ans;
        $answer->company_question2_ans = $request->company_question2_ans;
        $answer->save();

        $status = new ApplicantsSelectionStatus;
        $status->company_id = $request->company_id;
        $status->post_id = $request->post_id;
        $status->student_id = $request->student_id;
        $status->status = 'none';

        $success = 'success';
        return $success;
    }
}
