<?php
/*SL4A*/
namespace App\Http\Controllers;

use App\DataFromServer;
use App\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $check=Session::exists('Login');
        $user=Session::get('Login');
        if(!$check)
            return redirect('/User/Login');
        else{
            $json=json_decode($user);
            if ($json->Permission->id<5)
            return  View('Admin.index');
            else
                return  View('Access');
        }

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
    public function Store()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.Store');
    }
    public function Product()
    {
        $check=Session::exists('Login');
        if(!$check)
            return redirect('/User/Login');
        else
        return  View('Admin.Product');
    }
    /*api*/
    public function Contents()
    {
        $url=config('Constant.ServicePath.Contents');
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function ContentID($id)
    {
        $url=config('Constant.ServicePath.Contents').'?index='.$id;
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
        $url=config('Constant.ServicePath.Order');
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function OrderID($index)
    {
        $url=config('Constant.ServicePath.GetUser')."?index=".$index;
        $data= DataFromServer::get($url,0,0);


        return  $data;
    }
    public function SendProduct(Request $request)
    {

        $url=config('Constant.ServicePath.Product');
        $data=['form_params' => [
            'ContentID' => $request->ContentID,
            'ProductPrice' => $request->ProductPrice,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
    public function SendContent(Request $request)
    {

        $url=config('Constant.ServicePath.GetContent');
        $data=['form_params' => [
            'UserID' => $request->UserID,
            'ContentName' => $request->ContentName,
            'ProductID' => $request->ProductID,
            'ContentTypeID' => 1,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
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
    public function SendSubSpecification(Request $request)
    {

        $url=config('Constant.ServicePath.SubSpecification');
        $data=['form_params' => [
            'SpecificationID'                 => $request->SpecificationID,
            'SubSpecificationName'        => $request->SubSpecificationName,
            'SubSpecificationDesc'        => $request->SubSpecificationDesc,
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
        $url=config('Constant.ServicePath.Image');
        $file="No";
        if ($request->hasFile('image')) {
            $file="Yes";
            $image = $request->file('image');
            $path=$image->store('gsk/Appdata/images');
            $data=['form_params' => [
                'ContentID'                 => $request->ContentID,
                'ImageUrl'        => $path,
            ]];
            $res= DataFromServer::SendData($url,$data);
            return $res;
        }else return "Error";



    }
    /***************Store**********************/
    public function GetStore()
    {
        $url=config('Constant.ServicePath.Store');
        $data= DataFromServer::get($url,0,0);
        return  $data;
    }
    public function SendStore(Request $request)
    {

    $url=config('Constant.ServicePath.Store');
    $data=['form_params' => [
        'ProductID'                   => $request->ProductID,
        'Quantity'                  => $request->Quantity,
    ]];
    $res= DataFromServer::SendData($url,$data);
    return  $res;
}
    /***************Product**********************/
    public function GetProduct()
    {
        $url=config('Constant.ServicePath.Product');
        $data= DataFromServer::get($url,0,0);
        return  $data;
    }
    public function SendProducts(Request $request)
    {

        $url=config('Constant.ServicePath.Product');
        $data=['form_params' => [
            'ProductName'                   => $request->ProductName,
            'ProductPrice'                  => $request->ProductPrice,
            'CategoryID'                       => $request->CategoryID,
        ]];
        $res= DataFromServer::SendData($url,$data);
        return  $res;
    }
/*************************************Statistics**************************************/
    public function Statistics()
    {
        $date=Carbon::today();
        $data1=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data1){
            $data1=new Statistic();
            $data1->Review=0;
        }
        $date=Carbon::today()->addDays(-1);
        $data2=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data2){
            $data2=new Statistic();
            $data2->Review=0;
        }
        $date=Carbon::today()->addDays(-2);
        $data3=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data3){
            $data3=new Statistic();
            $data3->Review=0;
        }
        $date=Carbon::today()->addDays(-3);
        $data4=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data4){
            $data4=new Statistic();
            $data4->Review=0;
        }
        $date=Carbon::today()->addDays(-4);
        $data5=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data5){
            $data5=new Statistic();
            $data5->Review=0;
        }
        $date=Carbon::today()->addDays(-5);
        $data6=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data6){
            $data6=new Statistic();
            $data6->Review=0;
        }
        $date=Carbon::today()->addDays(-6);
        if(!$data6)$data6->Review=0;
        $data7=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if(!$data7){
            $data7=new Statistic();
            $data7->Review=0;
        }
        $da=['data' => [
            'day1' => $data1->Review,
            'day2' => $data2->Review,
            'day3' => $data3->Review,
            'day4' => $data4->Review,
            'day5' => $data5->Review,
            'day6' => $data6->Review,
            'day7' => $data7->Review,
        ]];
        return $da;
    }
}
