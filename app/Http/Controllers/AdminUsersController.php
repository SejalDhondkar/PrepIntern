<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
