<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;

class VerifyCompanyController extends Controller
{
    public function index (){
        $null = null;
        $verification = Company::where('is_verified',$null)->get();
        return $verification;
    }
    public function changeVerified(Request $request) {
        $company_id = $request->id;
        $company = Company::where('id',$company_id)->first();
        $company->is_verified = $request->is_verified;
        $company->update();

        $success = 'success';
        return $success;
        
    }

    public function getAccess() {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');  
        $company = Company::where('id',$this_company_id)->value('is_verified');
        if($company==1) {
            $flag = 'true'; 
        }else{
            $flag = 'false';
        }
        return $flag;
    }
}
