<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLinks extends Model
{
    protected $table = 'social_media_links';

    protected $fillable = ['title'];
}
