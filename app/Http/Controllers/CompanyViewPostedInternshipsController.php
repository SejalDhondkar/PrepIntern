<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\InternshipProfiles;

class CompanyViewPostedInternshipsController extends Controller
{
    public function index()
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');

        $posts = CompanyPostInternship::where('company_id', $this_company_id)->get();


        foreach($posts as $post){
        $this_profile_id = $post->profile_id;
        $post->profile_name = InternshipProfiles::where('id',$this_profile_id)->value('title');
        }

        return $posts;
        
    }
}
