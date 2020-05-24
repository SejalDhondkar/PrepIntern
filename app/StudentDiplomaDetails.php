<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDiplomaDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_diploma_details';

    protected $fillable = ['user_id','status','college_id','start_year','end_year','degree_id','stream_id','gpa_score','is_verified'];
}
