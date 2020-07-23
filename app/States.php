<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'states';

    protected $fillable = ['name', 'country_id', 'country_code', 'fips_code', 'iso2', 'flag', 'wikiDataId'];

    public function states_get_countries()
    {
      return $this->belongsTo('App\Countries','country_id');
    }

    public function users_get_states()
    {
      return $this->hasMany('App\User','state_id');
    }

    public function company_address_get_state()
    {
      return $this->hasMany('App\CompanyAddress','state_id');
    }
}
