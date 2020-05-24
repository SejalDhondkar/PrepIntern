<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAdditionalDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_additional_details';

    protected $fillable = ['user_id','description','is_verified'];
}
