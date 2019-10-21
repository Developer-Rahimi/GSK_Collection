<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $Index=1;
        return view("Pages.Account",compact('Index'));
    }
    public function Login()
    {
        return view("Pages.Login");
    }
    public function LogOut(Request $request)
    {
        $request->session()->forget('Login');
        return  redirect('/');
    }
}
