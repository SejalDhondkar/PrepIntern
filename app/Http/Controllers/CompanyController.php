<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use Auth;

class CompanyController extends Controller
{

    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->contact_email = $request->contact_email;
        $company->contact_no = $request->contact_no;
        $company->admin_id = Auth::id();
        $company->save();
        $success = 'success';
        return $success;
    }

    public function show($id)
    {
      $company = Company::with('company_get_users:id,name,email,contact_no')->where('id',$id)->get();
      return $company;
    }

    public function edit()
    {
        $company = Company::where('admin_id',Auth::id())->first();
        return $company;
    }

    public function update(Request $request)
    {
        $company = Company::where('admin_id',Auth::id())->first();
        $company->name = $request->name;
        $company->contact_email = $request->contact_email;
        $company->contact_no = $request->contact_no;
        $company->update();

        $success = 'success';
        return $success;

    }

}
