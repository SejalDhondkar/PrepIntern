<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTrainingDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_other_experience_training_details';

    protected $fillable = ['user_id','training_program','organization','city_id','is_online','start_date','end_date','is_currently_ongoing','description','is_verified'];
}
