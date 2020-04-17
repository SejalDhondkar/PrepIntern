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
        $users = User::all();

        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
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

    public function show(Request $request, $id)
    {
        $user = User::find($id);

        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }


}
