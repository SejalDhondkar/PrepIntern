<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentLinks;
use Illuminate\Support\Facades\Auth;

class StudentLinksController extends Controller
{
    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;

        $student = StudentLinks::where('user_id',$this_user_id)->first();
        if($student){
            $student->user_id = $this_user_id;
            $student->blog_url = $request->blog_url;
            $student->github_url = $request->github_url;
            $student->linkedin_url = $request->linkedin_url;
            $student->playstore_developer_url = $request->playstore_developer_url;
            $student->other_url = $request->other_url;
            $student->update();
        }else{
            $new_student = new StudentLinks;
            $new_student->user_id = $this_user_id;
            $new_student->blog_url = $request->blog_url;
            $new_student->github_url = $request->github_url;
            $new_student->linkedin_url = $request->linkedin_url;
            $new_student->playstore_developer_url = $request->playstore_developer_url;
            $new_student->other_url = $request->other_url;
            $new_student->save();
        }
        
        $success = 'success';
        return $success;
    }

    
    public function edit()
    {
        $this_user_id = auth()->user()->id;

        $student = StudentLinks::where('user_id',$this_user_id)->first();
        if($student){
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
