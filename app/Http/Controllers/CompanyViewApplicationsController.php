<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipAssessmentAnswers;
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
use App\Cities;
use App\StudentPositionOfRespDetails;
use App\StudentTrainingDetails;
use App\StudentProjectDetails;
use App\StudentSkillsDetails;
use App\Skills;
use App\StudentLinks;
use App\StudentAdditionalDetails;
use App\CompanyPostInternship;
use App\ApplicantsSelectionStatus;
use Illuminate\Support\Facades\Auth;
use App\Company;

class CompanyViewApplicationsController extends Controller
{
    public function index($id)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');

        $data = InternshipAssessmentAnswers::where('company_id',$this_company_id)->where('post_id',$id)->get();
        foreach($data as $dt){
            $student_id = $dt->student_id;
            $dt->student_name = User::where('id',$student_id)->value('name');
            $dt->status = ApplicantsSelectionStatus::where('student_id',$student_id)->where('post_id',$dt->post_id)->value('status');
        }
        return $data;
    }

    public function sortByStatus(Request $request, $id)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');

        $status = $request->status;

        if($status!='none'){
            $data = ApplicantsSelectionStatus::where('company_id',$this_company_id)->where('post_id',$id)->where('status', $status)->get();
            foreach($data as $dt){
                $student_id = $dt->student_id;
                $dt->student_name = User::where('id',$student_id)->value('name');
                $dt->status = ApplicantsSelectionStatus::where('student_id',$student_id)->where('post_id',$dt->post_id)->value('status');
            }
        }

        if($status=='none'){
            $data = InternshipAssessmentAnswers::where('company_id',$this_company_id)->where('post_id',$id)->get();
            foreach($data as $dt){
                $student_id = $dt->student_id;
                $dt->student_name = User::where('id',$student_id)->value('name');
                $dt->status = ApplicantsSelectionStatus::where('student_id',$student_id)->where('post_id',$dt->post_id)->value('status');
            }
        }

        return $data;
    }

    public function getStudent($id)
    {
        $student_assessment = InternshipAssessmentAnswers::where('id',$id)->first();
        $student_id = $student_assessment->student_id;
        $student_assessment->student_name = User::where('id',$student_id)->value('name');
        
        $student_basic_info = User::where('id',$student_id)->first();
        $student_basic_info->city_name = Cities::where('id',$student_basic_info->city_id)->value('name');

        $student_grad = StudentGraduationDetails::where('user_id',$student_id)->first();
        if($student_grad){
            $student_grad->college_name = Colleges::where('id',$student_grad->college_id)->value('name');
            $student_grad->degree_name = Degrees::where('id',$student_grad->degree_id)->value('title');
            $student_grad->stream_name = Streams::where('id',$student_grad->stream_id)->value('title');
        }

        $student_post_grad = StudentPostGraduationDetails::where('user_id',$student_id)->first();
        if($student_post_grad){
            $student_post_grad->college_name = Colleges::where('id',$student_post_grad->college_id)->value('name');
            $student_post_grad->degree_name = Degrees::where('id',$student_post_grad->degree_id)->value('title');
            $student_post_grad->stream_name = Streams::where('id',$student_post_grad->stream_id)->value('title');
        }

        $student_xii = StudentTwelthDetails::where('user_id',$student_id)->first();
        $student_x = StudentTenthDetails::where('user_id',$student_id)->first();

        $student_diploma = StudentDiplomaDetails::where('user_id',$student_id)->first();
        if($student_diploma){
            $student_diploma->college_name = Colleges::where('id',$student_diploma->college_id)->value('name');
            $student_diploma->degree_name = Degrees::where('id',$student_diploma->degree_id)->value('title');
            $student_diploma->stream_name = Streams::where('id',$student_post_grad->stream_id)->value('title');
        }

        $student_phd = StudentPhdDetails::where('user_id',$student_id)->first();
        if($student_phd){
            $student_phd->college_name = Colleges::where('id',$student_phd->college_id)->value('name');
            $student_phd->stream_name = Streams::where('id',$student_phd->stream_id)->value('title');
        }

        $student_job = StudentJobDetails::where('user_id',$student_id)->get();
        foreach($student_job as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_work_from_home==1){
                $std->location = 'Virtual';
            }
        }

        $student_internship = StudentInternshipDetails::where('user_id',$student_id)->get();
        foreach($student_internship as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_work_from_home==1){
                $std->location = 'Virtual';
            }
        }

        $student_pos_of_resp = StudentPositionOfRespDetails::where('user_id',$student_id)->get();

        $student_training = StudentTrainingDetails::where('user_id',$student_id)->get();
        foreach($student_training as $std){
            if($std->city_id){
                $std->location = Cities::where('id',$std->city_id)->value('name');
            }
            if($std->is_online==1){
                $std->location = 'Online';
            }
        }

        $student_project = StudentProjectDetails::where('user_id',$student_id)->get();

        $student_skills = StudentSkillsDetails::where('user_id',$student_id)->get();
        foreach($student_skills as $std){
            $std->skill_name = Skills::where('id',$std->skill_id)->value('title');
        }

        $student_links = StudentLinks::where('user_id',$student_id)->first();

        $student_additional = StudentAdditionalDetails::where('user_id',$student_id)->get();

        $post_data = CompanyPostInternship::where('id',$student_assessment->post_id)->first();

        $status = ApplicantsSelectionStatus::where('student_id',$student_id)->where('post_id',$student_assessment->post_id)->value('status');

        
        return response()->json(['student_assessment'=>$student_assessment , 'student_basic_info'=>$student_basic_info ,
                                'student_grad'=>$student_grad , 'student_post_grad'=>$student_post_grad ,
                                'student_xii'=>$student_xii , 'student_x'=>$student_x ,
                                'student_diploma'=>$student_diploma , 'student_phd'=>$student_phd ,
                                'student_job'=>$student_job , 'student_internship'=>$student_internship ,
                                'student_pos_of_resp'=>$student_pos_of_resp , 'student_training'=>$student_training ,
                                'student_project'=>$student_project , 'student_skills'=>$student_skills,
                                'student_links'=>$student_links , 'student_additional'=>$student_additional , 
                                'post_data'=>$post_data , 'status'=>$status]);
    }
}
