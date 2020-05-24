<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipProfiles extends Model
{
    use SoftDeletes;

    protected $table = 'internship_profiles';

    protected $fillable = ['category_id','title','description'];
}
