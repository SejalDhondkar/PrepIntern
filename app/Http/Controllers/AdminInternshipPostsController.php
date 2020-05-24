<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPostInternship;

class AdminInternshipPostsController extends Controller
{
    public function index()
    {
        $data = CompanyPostInternship::all();
        return $data;
    }
}
