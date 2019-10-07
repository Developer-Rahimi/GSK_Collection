<?php

namespace App\Http\Controllers;

use App\Cache;
use App\GetDataFromServer;
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

    public function Product()
    {
        $product = $array = array(
            [   'ProductID' => 1,
                'ProductName' => 'محصول اول',
                'ProductIamge' => '1.jpg',
                'ProductPrice' => '125000'],
            [   'ProductID' => 2,
                'ProductName' => 'محصول دوم',
                'ProductIamge' => '2.jpg',
                'ProductPrice' => '345000'],
            [   'ProductID' => 3,
                'ProductName' => 'محصول سوم',
                'ProductIamge' => '3.jpg',
                'ProductPrice' => '195000'],
            [   'ProductID' => 4,
                'ProductName' => 'محصول چهارم',
                'ProductIamge' => '4.jpg',
                'ProductPrice' => '325000'],
            [   'ProductID' => 5,
                'ProductName' => 'محصول پنجم',
                'ProductIamge' => '5.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 6,
                'ProductName' => 'محصول ششم',
                'ProductIamge' => '6.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 7,
                'ProductName' => 'محصول هفتم',
                'ProductIamge' => '7.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 8,
                'ProductName' => 'محصول هشتم',
                'ProductIamge' => '8.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 9,
                'ProductName' => 'محصول نهم',
                'ProductIamge' => '9.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 10,
                'ProductName' => 'محصول دهم',
                'ProductIamge' => '10.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 11,
                'ProductName' => 'محصول یازدهم',
                'ProductIamge' => '11.jpg',
                'ProductPrice' => '725000'],
            [   'ProductID' => 12,
                'ProductName' => 'محصول دوازدهم',
                'ProductIamge' => '12.jpg',
                'ProductPrice' => '725000'],


        );
        return response()->json($product, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
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
       $data= GetDataFromServer::get($url,1,0);


        return  $data;
    }
    public function User($id)
    {
        $url=config('Constant.ServicePath.GetUser').'?index='.$id;
       $data= GetDataFromServer::get($url,1,0);


        return  $data;
    }
    public function Contents()
    {
        $url=config('Constant.ServicePath.GetContent');
       $data= GetDataFromServer::get($url,1,0);


        return  $data;
    }
    public function Content($id)
    {
        $url=config('Constant.ServicePath.GetContent').'?index='.$id;
       $data= GetDataFromServer::get($url,1,0);


        return  $data;
    }
}
