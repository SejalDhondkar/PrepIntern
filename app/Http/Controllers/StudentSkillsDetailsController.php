<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skills;
use Illuminate\Support\Facades\Auth;
use App\StudentSkillsDetails;

class StudentSkillsDetailsController extends Controller
{
    public function getSkills(Request $request)
    {
        $skillsearchquery = $request->skillsearchquery;
        $data = Skills::where('title','like','%'.$skillsearchquery.'%')->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this_user_id = auth()->user()->id;
        
        $student = new StudentSkillsDetails;
        $student->user_id = $this_user_id;
        $student->skill_id = $request->skill_1;
        $student->level = $request->level_1;
        $student->save();

        $student = new StudentSkillsDetails;
        $student->user_id = $this_user_id;
        $student->skill_id = $request->skill_2;
        $student->level = $request->level_2;
        $student->save();

        $student = new StudentSkillsDetails;
        $student->user_id = $this_user_id;
        $student->skill_id = $request->skill_3;
        $student->level = $request->level_3;
        $student->save();

        $success = 'success';
        return $success;
    }
}
