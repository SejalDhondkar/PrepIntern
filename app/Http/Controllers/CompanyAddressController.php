<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyAddress;
use App\Company;
use Illuminate\Support\Facades\Auth;

class CompanyAddressController extends Controller
{
    public function store(Request $request)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');        

        $company = new CompanyAddress;
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->city_id = $request->city_id;
        $company->registered_address = $request->registered_address;
        $company->company_id = $this_company_id;
        $company->pincode = $request->pincode;
        $company->save();

        $success = 'success';
        return $success;
    }

    public function check()
    {
        $admin_id = auth()->user()->id;
        $company_id = Company::where('admin_id', $admin_id)->value('id');

        if($company_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function show(Request $request, $id)
    {

        $company = Company::findOrFail($id);
        return $company;
    }

    public function edit(Request $request)
    {
        $company = Company::where('admin_id',Auth::id())->get();
        return $company;
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->contact_email = $request->contact_email;
        $company->contact_no = $request->contact_no;        
        $company->update();

        $success = 'success';
        return $success;

    }
}
