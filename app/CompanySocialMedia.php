<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySocialMedia extends Model
{

    protected $table = 'company_social_media_links';
    
    protected $fillable = ['company_id','social_media_link_id','url'];
}
