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

        if($request->id_1){
            $student = StudentSkillsDetails::where('user_id',$this_user_id)->where('id',$request->id_1)->first();
            $student->skill_id = $request->skill_1;
            $student->level = $request->level_1;
            $student->update();
        }else{
            $student = new StudentSkillsDetails;
            $student->user_id = $this_user_id;
            $student->skill_id = $request->skill_1;
            $student->level = $request->level_1;
            $student->save();
        }

        if($request->id_2){
            $student = StudentSkillsDetails::where('user_id',$this_user_id)->where('id',$request->id_2)->first();
            $student->skill_id = $request->skill_2;
            $student->level = $request->level_2;
            $student->update();
        }else{
            $student = new StudentSkillsDetails;
            $student->user_id = $this_user_id;
            $student->skill_id = $request->skill_2;
            $student->level = $request->level_2;
            $student->save();
        }

        if($request->id_3){
            $student = StudentSkillsDetails::where('user_id',$this_user_id)->where('id',$request->id_3)->first();
            $student->skill_id = $request->skill_3;
            $student->level = $request->level_3;
            $student->update();
        }else{
            $student = new StudentSkillsDetails;
            $student->user_id = $this_user_id;
            $student->skill_id = $request->skill_3;
            $student->level = $request->level_3;
            $student->save();
        }

        if($request->id_4){
            $student = StudentSkillsDetails::where('user_id',$this_user_id)->where('id',$request->id_4)->first();
            $student->skill_id = $request->skill_4;
            $student->level = $request->level_4;
            $student->update();
        }else{
            $student = new StudentSkillsDetails;
            $student->user_id = $this_user_id;
            $student->skill_id = $request->skill_4;
            $student->level = $request->level_4;
            $student->save();
        }

        if($request->id_5){
            $student = StudentSkillsDetails::where('user_id',$this_user_id)->where('id',$request->id_5)->first();
            $student->skill_id = $request->skill_5;
            $student->level = $request->level_5;
            $student->update();
        }else{
            $student = new StudentSkillsDetails;
            $student->user_id = $this_user_id;
            $student->skill_id = $request->skill_5;
            $student->level = $request->level_5;
            $student->save();
        }


        $success = 'success';
        return $success;
    }

    public function edit()
    {
        $this_user_id = auth()->user()->id;

        $student = StudentSkillsDetails::where('user_id',$this_user_id)->get();
        if($student){
            foreach($student as $std){
                $std->skill_name = Skills::where('id',$std->skill_id)->value('title');
            }
            return $student;
        }else{
            $student = (object) [];

            return json_encode($student);
        }
    }
}
