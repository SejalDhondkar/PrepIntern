<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;
use App\Company;

class AdminInternshipPostsController extends Controller
{
    public function index()
    {
        $data = CompanyPostInternship::all();
        foreach($data as $dt){
            $dt->company_name = Company::where('id',$dt->company_id)->value('name');
        }
        return $data;
    }
}
