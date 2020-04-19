<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyAdditionalDetails extends Model
{
    use SoftDeletes;

    protected $table = 'company_details';
}
