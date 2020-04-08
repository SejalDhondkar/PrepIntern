<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user;
    }

    public function edit()
    {
        $user = Auth::user();
        return $user;
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->secondary_contact_no = $request->secondary_contact_no;
        $user->secondary_email = $request->secondary_email;
        $user->update();

        $success = 'success';
        return $success;
    }

}
