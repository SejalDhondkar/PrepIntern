<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\StudentSkillsDetails;
use App\CompanyPostInternship;
use Illuminate\Support\Arr;
use App\InternshipProfiles;
use App\Company;
use App\Cities;

class StudentViewInternshipsController extends Controller
{
    public function index()
    {
        $student_skills_full = StudentSkillsDetails::where('user_id',Auth::id())->get();
        for ($i=0; $i < count($student_skills_full); $i++) { 
            $student_skills_id_array[$i] = $student_skills_full[$i]->skill_id;
        }
        $result_array = [];

        $all_posts = CompanyPostInternship::all();
        foreach($all_posts as $post){
            $post->skills_array = json_decode($post->skills_id);
            foreach($post->skills_array as $company_skill_id){
                foreach($student_skills_id_array as $student_skill_id){
                    if($student_skill_id==$company_skill_id){
                        $result_array = Arr::prepend($result_array, $post);
                        $result = array_values(array_unique($result_array));
                    }
                }
            }
        }

        foreach($result as $res){
            $res->profile_name = InternshipProfiles::where('id',$res->profile_id)->value('title');
            $res->company_name = Company::where('id',$res->company_id)->value('name');
            $cities = json_decode($res->city_preferences);
            if($res->type_of_internship=='Regular'){
                for ($i=0; $i < count($cities); $i++) { 
                    $location[$i] = Cities::where('id',$cities[$i])->value('name');
                }       
            }
            if($res->type_of_internship=='Work from home'){
                $location = ['Work from home'];
            }
    
            $res->location = $location;
    
        }

        return $result;
    }
}
