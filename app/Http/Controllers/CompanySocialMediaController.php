<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanySocialMedia;

class CompanySocialMediaController extends Controller
{
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
