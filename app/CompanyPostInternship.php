<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPostInternship extends Model
{
    use SoftDeletes;

    protected $table = 'post_internship_details';

    protected $fillable = ['company_id','profile_id','type_of_internship','city_preferences','applicants_from_sel_cities','is_part_time_allowed','no_of_openings','start_date_type','start_date','end_date','internship_duration','intern_resp_desc','stipend_category','stipend_fixed','stipend_amount_min','stipend_amount_max','stipend_incentive','stipend_type','perks','preplacement_offer','skills_id','question_1','question_2','other_req','is_verified'];
}
