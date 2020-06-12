<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies'; 

    protected $fillable = ['name','contact_email','admin_id','contact_no','profile_pic','is_verified'];

}
