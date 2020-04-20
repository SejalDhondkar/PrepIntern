<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'state';

    protected $fillable = ['name', 'country_id', 'country_code', 'fips_code', 'iso2', 'flag', 'wikiDataId'];
}
