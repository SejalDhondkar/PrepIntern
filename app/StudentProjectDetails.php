<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProjectDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_other_experience_project_details';

    protected $fillable = ['user_id','project_name','start_month','end_month','is_currently_ongoing','description','project_link','is_verified'];
}
