<?php

namespace App\Http\Controllers;

use App\Cache;
use App\DataFromServer;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

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
    public function Cart()
    {
        $cart= array(
            [   'CartID' => 1,
                "Quntity"=>3,
                "Content" =>[
                    "ContentName" =>"محصول اول",
                    "Product" =>[
                        "ProductPrice"=>5000
                    ]
                ]
            ],[   'CartID' => 2,
                "Quntity"=>2,
                "Content" =>[
                    "ContentName" =>"محصول دوم",
                    "Product" =>[
                        "ProductPrice"=>75000
                    ]
                ]
            ],[   'CartID' => 3,
                "Quntity"=>6,
                "Content" =>[
                    "ContentName" =>"محصول سوم",
                    "Product" =>[
                        "ProductPrice"=>36000
                    ]
                ]
            ],[   'CartID' => 4,
                "Quntity"=>1,
                "Content" =>[
                    "ContentName" =>"محصول چهارم",
                    "Product" =>[
                        "ProductPrice"=>28000
                    ]
                ]
            ],[   'CartID' => 5,
                "Quntity"=>9,
                "Content" =>[
                    "ContentName" =>"محصول پنجم",
                    "Product" =>[
                        "ProductPrice"=>13000
                    ]
                ]
            ],[   'CartID' => 6,
                "Quntity"=>3,
                "Content" =>[
                    "ContentName" =>"محصول ششم",
                    "Product" =>[
                        "ProductPrice"=>51000
                    ]
                ]
            ],
        );
        return response()->json($cart, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
    public function Users()
    {
        $url=config('Constant.ServicePath.GetUser');
       $data= DataFromServer::get($url,1,0);


        return  $data;
    }
    public function User($id)
    {
        $url=config('Constant.ServicePath.GetUser').'?index='.$id;
       $data= DataFromServer::get($url,1,0);


        return  $data;
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
}
