<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return view("Pages.Test");
        //return  $request->session()->get('Login');
    }
}
