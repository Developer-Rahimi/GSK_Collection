<?php

namespace App\Http\Controllers;

use App\DataFromServer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function Pay(Request $request)
    {
        $MerchantID = '9269fa72-ce05-11e9-ab9e-000c295eb8fc'; //Required
        $Amount =$request->PayPrice; //Amount will be based on Toman - Required
        $Description =$request->PayDesc; /*'توضیحات تراکنش تستی'; // Required*/
        $Email = $request->PayEmail; // Optional
        $Mobile = $request->PayPhone; // Optional
        $CallbackURL = 'http://gskcollection.com/redi_pay'; // Required
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $request->session()->put('OrderID', $request->PayOrder);
        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            // Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
            $url='https://www.zarinpal.com/pg/StartPay/'.$result->Authority;
            return $url;
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
        } else {
            echo'ERR: '.$result->Status;
        }

    }
    public function redi_pay(Request $request)
    {
        //$request->OrderID=$request->session()->get('OrderID');
        $res=$request;

        /* $res->OrderID=$request->Authority;
         $res->OrderID=$request->Status;*/
        //$res['OrderID']=$request->session()->get('OrderID');


        $res['OrderID']=$request->session()->get('OrderID');
        $url=config('Constant.ServicePath.Order');
        $data=['form_params' => [
            'OrderID' => $request->session()->get('OrderID'),
            'OrderCode' => 'dsdsdd',
            /*'Quantity' => $request->Quantity,*/
        ]];
        $res= DataFromServer::SendData($url,$data);

        return $res;
    }
}
