<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyAddress;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\Countries;
use App\States;
use App\Cities;
use Auth;
class CompanyAddressController extends Controller
{
    public function store(Request $request)
    {
        $this_company_id = Company::where('admin_id', Auth::id())->value('id');
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
        $company_id = Company::where('admin_id', Auth::id())->value('id');

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
        $this_company_id = Company::where('admin_id', Auth::id())->value('id');
        $company = CompanyAddress::where('company_id',$this_company_id)->first();
        $company->country_name = Countries::where('id',$company->country_id)->value('name');
        $company->state_name = States::where('id',$company->state_id)->value('name');
        $company->city_name = Cities::where('id',$company->city_id)->value('name');
        return $company;
    }

    public function update(Request $request)
    {
        $this_company_id = Company::where('admin_id', Auth::id())->value('id');

        $company = CompanyAddress::where('company_id',$this_company_id)->first();
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->city_id = $request->city_id;
        $company->registered_address = $request->registered_address;
        $company->company_id = $this_company_id;
        $company->pincode = $request->pincode;
        $company->update();

        $success = 'success';
        return $success;

    }
}
