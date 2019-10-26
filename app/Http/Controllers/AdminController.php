<?php
/*SL4A*/
namespace App\Http\Controllers;

use App\DataFromServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.index');
    }
    public function User()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.User');
    }
    public function Content()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.Content');
    }
    public function Order()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.Order');
    }
    /*api*/
    public function Contents()
    {
        $url=config('Constant.ServicePath.GetContent');
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function ContentID($id)
    {
        $url=config('Constant.ServicePath.GetContent').'?index='.$id;
        $data= DataFromServer::get($url,0,0);
        return  $data;
    }
    public function users()
    {
        $url=config('Constant.ServicePath.GetUser');
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function userID($index)
    {
        $url=config('Constant.ServicePath.GetUser')."?index=".$index;
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function Orders()
    {
        $url=config('Constant.ServicePath.GetUser');
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function OrderID($index)
    {
        $url=config('Constant.ServicePath.GetUser')."?index=".$index;
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function SendTag(Request $request)
    {

        $url=config('Constant.ServicePath.Tag');
        $data=['form_params' => [
            'ContentID' => $request->ContentID,
            'TagName' => $request->TagName,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
    public function SendSpecification(Request $request)
    {

        $url=config('Constant.ServicePath.Specification');
        $data=['form_params' => [
            'ContentID'                 => $request->ContentID,
            'SpecificationName'        => $request->SpecificationName,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
    public function SendIntroduction(Request $request)
    {

        $url=config('Constant.ServicePath.Introduction');
        $data=['form_params' => [
            'ContentID'                 => $request->ContentID,
            'UserID'        => $request->UserID,
            'IntroductionTitle'        => $request->IntroductionTitle,
            'IntroductionDesc'        => $request->IntroductionDesc,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
    public function SendImage(Request $request)
    {

        /*$url=config('Constant.ServicePath.Introduction');
        $data=['form_params' => [
            'ContentID'                 => $request->ContentID,
            'UserID'        => $request->UserID,
            'IntroductionTitle'        => $request->IntroductionTitle,
            'IntroductionDesc'        => $request->IntroductionDesc,
        ]];
        $response = $client->request('POST', 'http://www.example.com/files/post', [
            'multipart' => [
                [
                    'name'     => 'file_name',
                    'contents' => fopen('/path/to/file', 'r')
                ],
                [
                    'name'     => 'csv_header',
                    'contents' => 'First Name, Last Name, Username',
                    'filename' => 'csv_header.csv'
                ]
            ]
        ]);
        $res= DataFromServer::SendData($url,$data);*/
        return  $request;
    }

}
