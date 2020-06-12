<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAdditionalDetails extends Model
{
    protected $table = 'company_details';

    protected $fillable = ['company_id','registration_no','certificate_of_incorporation','website','year_of_establishment','type_of_company','description','range_of_employees'];
}
