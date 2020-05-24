<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPositionOfRespDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_other_exp_position_of_resp';

    protected $fillable = ['user_id','description','is_verified'];
}
