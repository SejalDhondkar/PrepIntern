<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPostGraduationDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_post_graduation_details';

    protected $fillable = ['user_id','status','college_id','start_year','end_year','degree_id','stream_id','gpa_score','is_verified'];

}
