<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name', 'state_id', 'state_code', 'country_id', 'country_code', 'latitude', 'longitude', 'flag', 'wikiDataId'];

    public function users_get_cities()
    {
      return $this->hasMany('App\User','city_id');
    }

    public function company_address_get_city()
    {
      return $this->hasMany('App\CompanyAddress','city_id');
    }
}
