<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentInternshipDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_experience_internship_details';

    protected $fillable = ['user_id','position','organization','city_id','is_work_from_home','start_date','end_date','is_currently_working','description','is_verified'];
}
