<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipProfiles;
use App\CompanyAddress;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\Cities;
use App\Skills;
use App\CompanyPostInternship;

class CompanyPostInternshipController extends Controller
{
    public function getProfiles()
    {
        $data = InternshipProfiles::select('id','title')->get();
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $this_company_id = Company::where('admin_id', Auth::id())->value('id');
        $this_country_id = CompanyAddress::where('company_id',$this_company_id)->value('country_id');
        $citysearchquery = $request->citysearchquery;
        $data = Cities::where('country_id',$this_country_id)->where('name','like','%'.$citysearchquery.'%')->get();
        return response()->json($data);

    }

    public function getSkills()
    {
        $data = Skills::select('id','title')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this_company_id = Company::where('admin_id', Auth::id())->value('id');
        $post = new CompanyPostInternship;
        $post->company_id = $this_company_id;
        $post->profile_id = $request->profile_id;
        $post->type_of_internship = $request->type_of_internship;
        if(!empty($request->city_preferences))
        {
            $post->city_preferences = json_encode($request->city_preferences);
        }
        $post->applicants_from_sel_cities = $request->applicants_from_sel_cities;
        $post->is_part_time_allowed = $request->is_part_time_allowed;
        $post->no_of_openings = $request->no_of_openings;
        $post->start_date_type = $request->start_date_type;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->internship_duration = $request->internship_duration;
        $post->intern_resp_desc = $request->intern_resp_desc;
        $post->stipend_category = $request->stipend_category;
        $post->stipend_fixed = $request->stipend_fixed;
        $post->stipend_amount_min = $request->stipend_amount_min;
        $post->stipend_amount_max = $request->stipend_amount_max;
        $post->stipend_incentive = $request->stipend_incentive;
        $post->stipend_type = $request->stipend_type;
        if(!empty($request->perks)){
            $post->perks = json_encode($request->perks);
        }
        $post->preplacement_offer = $request->preplacement_offer;
        if(!empty($request->skills_id))
        {
          $post->skills_id = json_encode($request->skills_id);
        }
        $post->question_1 = $request->question_1;
        $post->question_2 = $request->question_2;
        $post->other_req = $request->other_req;
        $post->save();

        $success = 'success';
        return $success;

    }

    public function show($id)
    {

        $data = CompanyPostInternship::findOrFail($id);

        if(!empty($data->city_preferences)){
            $cities = json_decode($data->city_preferences);
        }
        $location = [];

        if($data->type_of_internship=='Regular'){
            for ($i=0; $i < count($cities); $i++) {
                $location[$i] = Cities::where('id',$cities[$i])->value('name');
            }
        }
        if($data->type_of_internship=='Work from home'){
            $location = ['Work from home'];
        }

        $data->location = $location;
        if(!empty($data->skills_id)){
            $skills = json_decode($data->skills_id);
            for ($i=0; $i < count($skills); $i++) {
                $skills_name[$i] = Skills::where('id',$skills[$i])->value('title');
            }
            $data->skills = $skills_name;
        }
        
        if(!empty($data->city_preferences)){
            $perks = json_decode($data->perks);
            $data->perks_array = $perks;
        }        

        $this_profile_id = $data->profile_id;
        $data->profile_name = InternshipProfiles::where('id',$this_profile_id)->value('title');

        $this_company_id = $data->company_id;
        $data->company_name = Company::where('id',$this_company_id)->value('name');

        return $data;
    }
}
