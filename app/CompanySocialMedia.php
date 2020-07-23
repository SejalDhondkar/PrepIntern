<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySocialMedia extends Model
{
  protected $table = 'company_social_media_links';
  protected $fillable = ['company_id','social_media_link_id','url'];

  public function company_social_get_title()
  {
    return $this->belongsTo('App\SocialMediaLinks','social_media_link_id');
  }

  public function company_social_get_company()
  {
    return $this->belongsTo('App\Company','company_id');
  }
}
