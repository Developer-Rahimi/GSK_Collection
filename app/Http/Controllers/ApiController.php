<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            ['ProductName' => 'محصول اول',
                'ProductIamge' => '1.jpg',
                'ProductPrice' => '125000'],
            ['ProductName' => 'محصول دوم',
                'ProductIamge' => '2.jpg',
                'ProductPrice' => '345000'],
            ['ProductName' => 'محصول سوم',
                'ProductIamge' => '3.jpg',
                'ProductPrice' => '195000'],
            ['ProductName' => 'محصول چهارم',
                'ProductIamge' => '4.jpg',
                'ProductPrice' => '325000'],


        );
        return response()->json($product, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
}
