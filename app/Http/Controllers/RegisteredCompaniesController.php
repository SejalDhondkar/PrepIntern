<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class RegisteredCompaniesController extends Controller
{
    public function index(){
        $data = Company::where('is_verified',1)->get();
        return $data;

    }
    public function sortByStatus(Request $request)
    {

      $status = $request->status;


      if($status == 1){
          $data = Company::where('is_verified',$status)->get();
      }
      if($status == 0){
          $data = Company::where('is_verified',$status)->get();
      }
      return $data;
     }
}
