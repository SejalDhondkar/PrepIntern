<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;
use App\Company;
use App\InternshipProfiles;

class AdminInternshipPostsController extends Controller
{
    public function index()
    {
        $data = CompanyPostInternship::where('is_verified',0)->get();
        foreach($data as $dt){
            $dt->company_name = Company::where('id',$dt->company_id)->value('name');
            $dt->profile_name = InternshipProfiles::where('id',$dt->profile_id)->value('title');
        }
        return $data;
    }
    public function changeStatusVerification(Request $request)
    {
        $Internship =CompanyPostInternship::where('id',$request->post_id)->first();
        $Internship->is_verified = $request->is_verified;
        $Internship->update();

        $success = 'success';
        return $success;
    }
}
