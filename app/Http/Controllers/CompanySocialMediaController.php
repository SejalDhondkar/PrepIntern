<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanySocialMedia;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\CompanyAdditionalDetails;

class CompanySocialMediaController extends Controller
{
    
    public function store(Request $request)
    {
        $admin_id = auth()->user()->id;
        $this_company_id = Company::where('admin_id', $admin_id)->value('id');
        
        $links = $request->input('company_links');

        foreach($links as $link)
        {
            $company = new CompanySocialMedia;
            $company->company_id = $this_company_id;
            $company->social_media_link_id = $link['social_media_link_id'];
            $company->url = $link['url'];
            $company->save();
            
        }

        $success = 'success';
        return $success;
    }

    public function check()
    {
        $admin_id = auth()->user()->id;
        $company_id = Company::where('admin_id', $admin_id)->value('id');
        $this_company_id = CompanyAdditionalDetails::where('company_id', $company_id)->value('company_id');

        if($this_company_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function checkForDashboard()
    {
        $admin_id = auth()->user()->id;
        $company_id = Company::where('admin_id', $admin_id)->value('id');
        $this_company_id = CompanySocialMedia::where('company_id', $company_id)->value('company_id');

        if($this_company_id){
            $flag = 'true';
        }else{
            $flag = 'false';
        }

        return $flag;
    }

    public function show(Request $request, $company_id)
    {
        $links= CompanySocialMedia::where('company_id', $company_id)->get();
        return $links;
    }

    public function edit(Request $request, $company_id)
    {
        $links= CompanySocialMedia::where('company_id', $company_id)->get();
        return $links;
    }

    public function update(Request $request, $company_id)
    {
        $links = CompanySocialMedia::where('company_id', $company_id)->get();
        $var_request = $request;
        foreach($links as $link){
            foreach($var_request as $req){
                if($link->social_media_link_id == $req->social_media_link_id){
                    $link->url = $req->url;
                    $link->update();
                    
                }
            }
            
        }        

        $success = 'success';
        return $success;
    }
}
