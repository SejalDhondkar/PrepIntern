<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;
use App\InternshipProfiles;
use App\Company;

class PostedInternshipsController extends Controller
{
    public function index(){
        $data = CompanyPostInternship::where('is_verified',1)->get();
        foreach($data as $d){
            $d->company_name = Company::where('id',$d->company_id)->value('name');
            $d->profile_name = InternshipProfiles::where('id',$d->profile_id)->value('title');
        }
        return $data;

    }
    public function sortByStatus(Request $request)
    {

      $status = $request->status;


      if($status == 1){
          $data = CompanyPostInternship::where('is_verified',$status)->get();
          foreach($data as $d){
              $d->company_name = Company::where('id',$d->company_id)->value('name');
              $d->profile_name = InternshipProfiles::where('id',$d->profile_id)->value('title');
          }
      }
      if($status == 2){
          $data = CompanyPostInternship::where('is_verified',$status)->get();
          foreach($data as $d){
            $d->company_name = Company::where('id',$d->company_id)->value('name');
            $d->profile_name = InternshipProfiles::where('id',$d->profile_id)->value('title');
        }
      }
      return $data;
     }
}
