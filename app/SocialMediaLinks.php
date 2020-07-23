<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLinks extends Model
{
    protected $table = 'social_media_links';
    protected $fillable = ['title'];
    public function company_social_get_title()
    {
      return $this->hasMany('App\CompanySocialMedia','social_media_link_id');
    }
}
