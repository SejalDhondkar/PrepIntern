<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 'flag', 'wikiDataId'];
}
