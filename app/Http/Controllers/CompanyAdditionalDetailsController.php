<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyAdditionalDetails;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\CompanyAddress;

class CompanyAdditionalDetailsController extends Controller
{
    public function store(Request $request)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');        

        $company = new CompanyAdditionalDetails;
        $company->company_id = $this_company_id;
        $company->registration_no = $request->registration_no;
        $company->certificate_of_incorporation = $request->certificate_of_incorporation;
        $company->website = $request->website;
        $company->year_of_establishment = $request->year_of_establishment;        
        $company->type_of_company = $request->type_of_company;
        $company->description = $request->description;
        $company->range_of_employees = $request->range_of_employees;
        $company->save();

        $success = 'success';
        return $success;
    }

    public function check()
    {
        $admin_id = auth()->user()->id;
        $company_id = Company::where('admin_id', $admin_id)->value('id');
        $this_company_id = CompanyAddress::where('company_id', $company_id)->value('company_id');

        if($this_company_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function edit()
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');

        $company = CompanyAdditionalDetails::where('company_id',$this_company_id)->first();

        return $company;
    }

    public function update(Request $request)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');

        $company = CompanyAdditionalDetails::where('company_id',$this_company_id)->first();
        $company->company_id = $this_company_id;
        $company->registration_no = $request->registration_no;
        $company->certificate_of_incorporation = $request->certificate_of_incorporation;
        $company->website = $request->website;
        $company->year_of_establishment = $request->year_of_establishment;        
        $company->type_of_company = $request->type_of_company;
        $company->description = $request->description;
        $company->range_of_employees = $request->range_of_employees;
        $company->update();

        $success = 'success';
        return $success;

    }
    

}
