<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::with('users_get_countries')->get();
        return $users;
    }


    public function mobileOtpVerified()
    {
      $user = User::findOrFail(Auth::id());
      $user->mobile_verified = 1;
      $user->mobile_verified_at = Carbon::now();
      $user->update();
      $success = 'success';
      return $success;
    }

    public function show($id)
    {
        $user = User::where('id',$id)->with('users_get_countries','users_get_states','users_get_cities')->get();
        return $user;
    }


}
