<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 'flag', 'wikiDataId'];

    public function states_get_countries()
    {
      return $this->hasMany('App\States','country_id');
    }

    public function users_get_countries()
    {
      return $this->hasMany('App\User','country_id');
    }

    public function company_address_get_country()
    {
      return $this->hasMany('App\CompanyAddress','country_id');
    }
}
