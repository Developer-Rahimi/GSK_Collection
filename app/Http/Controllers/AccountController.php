<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class AccountController extends Controller
{
    public function index()
    {
        $log=Session::get('Login');
        $json=json_decode($log);
        $Index=$json->id;
        return view("Pages.Account",compact('Index'));
    }
    public function Login()
    {
        $log=Session::exists('Login');
        if($log){
            return redirect('User/MyAccount');
        }else {
            return view("Pages.Login");
        }

    }
    public function LogOut(Request $request)
    {
        $request->session()->forget('Login');
        return  redirect('/');
    }
}
