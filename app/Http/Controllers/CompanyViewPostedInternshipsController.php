<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;
use App\Company;
use App\InternshipProfiles;
use Auth;

class CompanyViewPostedInternshipsController extends Controller
{
    public function index()
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id',Auth::id())->value('id');
        $posts = CompanyPostInternship::where('company_id', $this_company_id)->where('is_verified',1)->get();
        foreach($posts as $post){
          $this_profile_id = $post->profile_id;
          $post->profile_name = InternshipProfiles::where('id',$this_profile_id)->value('title');
        }

        return $posts;

    }
}
