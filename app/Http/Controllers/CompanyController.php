<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

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
        $company->email = $request->email;
        $company->contact_no = $request->contact_no;
        $company->country = $request->country;
        $company->state = $request->state;
        $company->city = $request->city;
        $company->registered_address = $request->registered_address;
        $company->pincode = $request->pincode;
        $company->website = $request->website;
        $company->registration_no = $request->registration_no;
        $company->certificate_of_incorporation = $request->certificate_of_incorporation;
        $company->year_of_establishment = $request->year_of_establishment;
        $company->type_of_company = $request->type_of_company;
        $company->description = $request->description;
        $company->range_of_employees = $request->range_of_employees;
        $company->update();

        $success = 'success';
        return $success;

    }

}
