<?php

namespace App\Http\Controllers;

use App\DataFromServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function SetLogin(Request $request,$id)
    {
        $url=config('Constant.ServicePath.GetUser').'?index='.$id;
        $data= DataFromServer::get($url,0,0);
        $request->session()->put('Login', $data);
        return $data;
    }
    public function Logout(Request $request)
    {
        $request->session()->forget('Login');
        return "OK";
    }
    public function CheckLogin(Request $request)
    {
        $res=Null;
        $check=$request->session()->has('Login');
        if($check)
        $res=$request->session()->get('Login');
        return $res;

    }

}
