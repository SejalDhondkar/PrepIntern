<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPhdDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_phd_details';

    protected $fillable = ['user_id','status','college_id','start_year','end_year','stream_id','gpa_score','is_verified'];
}
