<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentLinks extends Model
{
    use SoftDeletes;

    protected $table = 'student_links_details';

    protected $fillable = ['user_id','blog_url','github_url','linkedin_url','playstore_developer_url','other_url'];
}
