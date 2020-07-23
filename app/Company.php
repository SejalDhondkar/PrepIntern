<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    protected $fillable = ['name','contact_email','admin_id','contact_no','profile_pic','is_verified'];

    public function company_get_users()
    {
      return $this->belongsTo('App\User','admin_id');
    }

    public function company_social_get_company()
    {
      return $this->hasMany('App\CompanySocialMedia','company_id');
    }

    public function company_address_get_company()
    {
      return $this->hasMany('App\CompanyAddress','company_id');
    }

}
