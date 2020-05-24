<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTwelthDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_xii_details';

    protected $fillable = ['user_id','status','school_name','stream','year_of_completion','board','gpa_score','is_verified'];
}
