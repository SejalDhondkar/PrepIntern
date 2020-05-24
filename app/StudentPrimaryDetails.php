<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPrimaryDetails extends Model
{
    use SoftDeletes;

    protected $table = 'student_primary_details';

    protected $fillable = ['user_id', 'date_of_birth', 'fields','type_of_internship_id', 'city_preferences'];
}
