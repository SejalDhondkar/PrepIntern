<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Countries;
use App\States;
use App\Cities;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->country_id){
            $user->country_name = Countries::where('id',$user->country_id)->value('name');
        }else{
            $user->country_name = '';
        }
        if($user->state_id){
            $user->state_name = States::where('id',$user->state_id)->value('name');
        }else{
            $user->state_name = '';
        }
        if($user->city_id){
            $user->city_name = Cities::where('id',$user->city_id)->value('name');
        }else{
            $user->city_name = '';
        }
        
        return $user;
    }

    public function edit()
    {
        $user = Auth::user();
        if($user->country_id){
            $user->country_name = Countries::where('id',$user->country_id)->value('name');
        }else{
            $user->country_name = '';
        }
        if($user->state_id){
            $user->state_name = States::where('id',$user->state_id)->value('name');
        }else{
            $user->state_name = '';
        }
        if($user->city_id){
            $user->city_name = Cities::where('id',$user->city_id)->value('name');
        }else{
            $user->city_name = '';
        }

        return $user;
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->secondary_contact_no = $request->secondary_contact_no;
        $user->secondary_email = $request->secondary_email;
        $user->update();

        $success = 'success';
        return $success;
    }

}
