<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    protected $table = 'company_address';

    protected $fillable = ['company_id','country_id','state_id','city_id','registered_address','pincode']; 
}
