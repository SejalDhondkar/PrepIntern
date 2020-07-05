<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\CompanyAddress;
use App\CompanyAdditionalDetails;
use App\CompanySocialMedia;
use App\SocialMediaLinks;
use App\CompanyPostInternship;
use App\Cities;
use App\States;
use App\Countries;
use Illuminate\Support\Facades\Auth;

class ViewCompanyDetailsController extends Controller
{
    public function viewDetails($id){
        $company_id = $id;
        $company_basic_info = Company::where('id',$company_id)->first();
        $company_admin_details = Company::where('id',$company_id)->value('admin_id');
        $company_address_details = User::where('id',$company_admin_details)->first();
        $company_address = CompanyAddress::where('company_id',$company_id)->first();
        $company_address->city_name = Cities::where('id',$company_address_details->city_id)->value('name');
        $company_address->state_name = States::where('id',$company_address_details->state_id)->value('name');
        $company_address->country_name = Countries::where('id',$company_address_details->country_id)->value('name');
        $company_additional_details = CompanyAdditionalDetails::where('company_id',$company_id)->first();
        $company_social_media_links = CompanySocialMedia::where('company_id',$company_id)->get();
        foreach($company_social_media_links as $csml){
            $csml->title = SocialMediaLinks::where('id',$csml->social_media_link_id)->value('title');
        }

        return response()->json(['company_basic_info'=>$company_basic_info,'company_address'=>$company_address,
        'company_additional_details'=>$company_additional_details,'company_social_media_links'=>$company_social_media_links]);
    }
}