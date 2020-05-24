<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipAssessmentAnswers extends Model
{
    use SoftDeletes;

    protected $table = 'assessment_questions_answers';

    protected $fillable = ['company_id','post_id','student_id','default_question1_ans','default_question2_ans','company_question1_ans','company_question2_ans'];
}
