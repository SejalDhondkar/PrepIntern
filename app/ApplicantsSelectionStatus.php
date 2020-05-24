<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantsSelectionStatus extends Model
{
    use SoftDeletes;

    protected $table = 'applicants_selection_status';

    protected $fillable = ['company_id','post_id','student_id','status'];
}
