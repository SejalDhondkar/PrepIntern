<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTenthDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_x_details';

    protected $fillable = ['user_id','status','school_name','year_of_completion','board','gpa_score','is_verified'];
}
