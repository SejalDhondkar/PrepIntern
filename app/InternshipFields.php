<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipFields extends Model
{
    use SoftDeletes;

    protected $table = 'internship_fields';

    protected $fillable = ['title'];
}
