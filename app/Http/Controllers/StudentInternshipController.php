<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantsSelectionStatus;
use App\InternshipProfiles;
use Illuminate\Support\Arr;
use App\Company;
use App\CompanyPostInternship;
use App\User;
use Illuminate\Support\Facades\Auth;

class StudentInternshipController extends Controller
{
    public function viewDetails()
    {
        $student_id = Auth::id();
        $student_data = ApplicantsSelectionStatus::where('student_id',$student_id)->get();
        $array = [];
        $result = [];
        foreach($student_data as $student){
            $post = CompanyPostInternship::where('id',$student->post_id)->first();
            $post->company_name = Company::where('id',$post->company_id)->value('name');
            $post->profile_name = InternshipProfiles::where('id',$post->profile_id)->value('title');
            $array = Arr::prepend($array,$post);
            $result = array_values($array);
        }
        return $result;
    }
    
}
