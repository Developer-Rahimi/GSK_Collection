<?php
/*SL4A*/
namespace App\Http\Controllers;

use App\DataFromServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return  View('Admin.index');
    }
    public function User()
    {
        return  View('Admin.User');
    }
    public function Content()
    {
        return  View('Admin.Content');
    }
    public function Order()
    {
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

}
