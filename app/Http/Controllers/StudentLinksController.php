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
        
        $student = new StudentLinks;
        $student->user_id = $this_user_id;
        $student->blog_url = $request->blog_url;
        $student->github_url = $request->github_url;
        $student->linkedin_url = $request->linkedin_url;
        $student->playstore_developer_url = $request->playstore_developer_url;
        $student->other_url = $request->other_url;
        $student->save();

        $success = 'success';
        return $success;
    }
}
