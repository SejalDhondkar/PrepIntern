<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentGraduationDetails;
use App\StudentPostGraduationDetails;
use App\StudentTwelthDetails;
use App\StudentTenthDetails;
use App\StudentDiplomaDetails;
use App\StudentPhdDetails;
use App\Colleges;
use App\Degrees;
use App\Streams;
use App\StudentJobDetails;
use App\StudentInternshipDetails;
use App\States;
use App\Countries;
use App\Cities;
use App\StudentPositionOfRespDetails;
use App\StudentTrainingDetails;
use App\StudentProjectDetails;
use App\StudentSkillsDetails;
use App\Skills;
use App\StudentLinks;
use App\StudentAdditionalDetails;

class AdminUsersController extends Controller
{
    public function index(){
        $data = User::all();
        return $data;

    }
    public function sortByStatus(Request $request)
    {

      $status = $request->status;


      if($status!=0){
          $data = User::where('role_id',$status)->get();
           return $data;
      }
      elseif($status==0){
        $data = User::all();
         return $data;
       }
     }

     public function allStudents()
     {
      $data = User::where('role_id',5)->orderBy('created_at', 'desc')->get();
      return $data;
    }

    public function ViewStudent($id)
    {
      $student_basic_info = User::findOrFail($id);
      if($student_basic_info->country_id){
        $student_basic_info->country_name = Countries::where('id',$student_basic_info->country_id)->value('name');
      }
      if($student_basic_info->state_id){
        $student_basic_info->state_name = States::where('id',$student_basic_info->state_id)->value('name');
      }
      if($student_basic_info->city_id){
        $student_basic_info->city_name = Cities::where('id',$student_basic_info->city_id)->value('name');
      }

        $student_grad = StudentGraduationDetails::where('user_id',$id)->first();
        if($student_grad){
            $student_grad->college_name = Colleges::where('id',$student_grad->college_id)->value('name');
            $student_grad->degree_name = Degrees::where('id',$student_grad->degree_id)->value('title');
            $student_grad->stream_name = Streams::where('id',$student_grad->stream_id)->value('title');
        }

        $student_post_grad = StudentPostGraduationDetails::where('user_id',$id)->first();
        if($student_post_grad){
            $student_post_grad->college_name = Colleges::where('id',$student_post_grad->college_id)->value('name');
            $student_post_grad->degree_name = Degrees::where('id',$student_post_grad->degree_id)->value('title');
            $student_post_grad->stream_name = Streams::where('id',$student_post_grad->stream_id)->value('title');
        }

        $student_xii = StudentTwelthDetails::where('user_id',$id)->first();
        $student_x = StudentTenthDetails::where('user_id',$id)->first();

        $student_diploma = StudentDiplomaDetails::where('user_id',$id)->first();
        if($student_diploma){
            $student_diploma->college_name = Colleges::where('id',$student_diploma->college_id)->value('name');
            $student_diploma->degree_name = Degrees::where('id',$student_diploma->degree_id)->value('title');
            $student_diploma->stream_name = Streams::where('id',$student_post_grad->stream_id)->value('title');
        }

        $student_phd = StudentPhdDetails::where('user_id',$id)->first();
        if($student_phd){
            $student_phd->college_name = Colleges::where('id',$student_phd->college_id)->value('name');
            $student_phd->stream_name = Streams::where('id',$student_phd->stream_id)->value('title');
        }

        $student_job = StudentJobDetails::where('user_id',$id)->get();
        foreach($student_job as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_work_from_home==1){
                $std->location = 'Virtual';
            }
        }

        $student_internship = StudentInternshipDetails::where('user_id',$id)->get();
        foreach($student_internship as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_work_from_home==1){
                $std->location = 'Virtual';
            }
        }

        $student_pos_of_resp = StudentPositionOfRespDetails::where('user_id',$id)->get();

        $student_training = StudentTrainingDetails::where('user_id',$id)->get();
        foreach($student_training as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_online==1){
                $std->location = 'Online';
            }
        }

        $student_project = StudentProjectDetails::where('user_id',$id)->get();

        $student_skills = StudentSkillsDetails::where('user_id',$id)->get();
        foreach($student_skills as $std){
            $std->skill_name = Skills::where('id',$std->skill_id)->value('title');
        }

        $student_links = StudentLinks::where('user_id',$id)->first();

        $student_additional = StudentAdditionalDetails::where('user_id',$id)->get();

        return response()->json(['student_basic_info'=>$student_basic_info ,
                                'student_grad'=>$student_grad , 'student_post_grad'=>$student_post_grad ,
                                'student_xii'=>$student_xii , 'student_x'=>$student_x ,
                                'student_diploma'=>$student_diploma , 'student_phd'=>$student_phd ,
                                'student_job'=>$student_job , 'student_internship'=>$student_internship ,
                                'student_pos_of_resp'=>$student_pos_of_resp , 'student_training'=>$student_training ,
                                'student_project'=>$student_project , 'student_skills'=>$student_skills,
                                'student_links'=>$student_links , 'student_additional'=>$student_additional ,
                                ]);
    }
}
