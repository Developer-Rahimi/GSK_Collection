<?php

namespace App\Http\Controllers;

use App\Cache;
use App\DataFromServer;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ApiController extends Controller
{
    public function Contact()
    {
        $data=['Address' => 'تهران-تهرانپارس-فلکه سوم خیابان 212 .... ',
            'Email' => 'info@Gskcollection@Gmail.com',
            'Phone' => '+989107608438',
            'Fax' => '+98213333333'];
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
    /*////////////////////////////User/////////////////////////////////*/
    public function Users()
    {
        $url=config('Constant.ServicePath.GetUser');
       $data= DataFromServer::get($url,1,0);


        return  $data;
    }
    public function User($id)
    {
        $url=config('Constant.ServicePath.GetUser').'?index='.$id;
       $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function Login(Request $request)
    {
        $url=config('Constant.ServicePath.Login');
        $data=['form_params' => [
            'UserEmail' => $request->UserEmail,
            'UserPassword' => $request->UserPassword,
        ]];
        $user=null;
        $res= DataFromServer::SendData($url,$data);
        $json=json_decode($res);
        if($json->Status==='OK'){
            $url=config('Constant.ServicePath.GetUser').'?index=1';
      $user= DataFromServer::get($url,1,0);
            $request->session()->put('Login', $user);
        }
        return  $res;
    }

    public function CheckEmail(Request $request)
    {
        $url=config('Constant.ServicePath.EmailCheck');
        $data=['form_params' => [
            'UserEmail' => $request->UserEmail,
        ]];
        $res= DataFromServer::SendData($url,$data);


        return  $res;
    }
    public function Register(Request $request)
    {
        $url=config('Constant.ServicePath.Register');
        $data=['form_params' => [
            'UserName' => $request->UserName,
            'UserPhone' => $request->UserPhone,
            'UserEmail' => $request->UserEmail,
            'UserPassword' => $request->UserPassword,
        ]];
        $res=DataFromServer::SendData($url,$data);
        return $res;
    }

    public function Contents()
    {
        $url=config('Constant.ServicePath.GetContent');
       $data= DataFromServer::get($url,1,0);


        return  $data;
    }
    public function Content($id)
    {
        $url=config('Constant.ServicePath.GetContent').'?index='.$id;
       $data= DataFromServer::get($url,0,0);


        return  $data;
    }
/***************************************Comment**************************************/
    public function SendComment(Request $request)
    {
        $url=config('Constant.ServicePath.Comment');
        $data=['form_params' => [
        'UserID' => $request->UserID,
        'ContentID' => $request->ContentID,
        'CommentSubject' => "CommentSubject",
        'CommentDesc' => $request->CommentDesc,
    ]];
        $res=DataFromServer::SendData($url,$data);
        return $res;
    }
/***************************************Contact**************************************/
    public function SendContact(Request $request)
    {
        $url=config('Constant.ServicePath.Contact');
        $data=['form_params' => [
        'ContactName' => $request->ContactName,
        'ContactEmail' => $request->ContactEmail,
        'ContactDesc' => $request->ContactDesc,
    ]];
        $res=DataFromServer::SendData($url,$data);
        return $res;
    }
    /***************************************Cart**************************************/
    public function GetCart()
    {
        $UserID=1;
        $url=config('Constant.ServicePath.Cart').'?index='.$UserID;
        $data= DataFromServer::get($url,0,0);
        return  $data;
    }
    public function AddCart(Request $request)
    {
        $url=config('Constant.ServicePath.Cart');
        $UserID=1;
        $data=['form_params' => [
            'UserID' => $UserID,
            'ContentID' => $request->ContentID,
            'Quantity' => $request->Quantity,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
}
