<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSkillsDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_skill_details';

    protected $fillable = ['user_id','skill_id','level','is_verified'];
}
