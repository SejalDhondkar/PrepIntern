<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    protected $table = 'company_address';

    protected $fillable = ['company_id','country_id','state_id','city_id','registered_address','pincode'];

    public function company_address_get_company()
    {
      return $this->belongsTo('App\Company','company_id');
    }

    public function company_address_get_country()
    {
      return $this->belongsTo('App\Countries','country_id');
    }

    public function company_address_get_state()
    {
      return $this->belongsTo('App\States','state_id');
    }

    public function company_address_get_city()
    {
      return $this->belongsTo('App\Cities','city_id');
    }
}
