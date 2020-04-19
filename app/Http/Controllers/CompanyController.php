<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Company;


class CompanyController extends Controller
{

    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->contact_email = $request->contact_email;
        $company->contact_no = $request->contact_no;
        $company->admin_id = auth()->user()->id;
        $company->save();

        $success = 'success';
        return $success;
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
