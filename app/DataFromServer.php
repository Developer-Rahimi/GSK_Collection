<?php
namespace App;
use App\Cache;
use Carbon\Carbon;

class DataFromServer {
        public static function get($url,$day,$hours)
        {
            $data=Cache::where('url',$url)->first();
            if($data){
                $time=Carbon::now();
                $valid=Carbon::create($data->update_at)->addDays($day)->addHours($hours);
                if($time>$valid){
                    $client = new \GuzzleHttp\Client();
                    $request = $client->get($url);
                    $response = $request->getBody()->getContents();
                    $data->data =$response;
                    $data->update_at =Carbon::now();
                    $data->save();
                }
                return  $data->data;
            }
            else {
                $client = new \GuzzleHttp\Client();
                $request = $client->get($url);
                $response = $request->getBody()->getContents();
                $cache=new Cache();
                $cache->url =$url;
                $cache->data =$response;
                $cache->created_at =Carbon::now();
                $cache->update_at =Carbon::now();
                $cache->save();
                return  $cache->data;
            }
        }

    public static function  SendData($url,$data)
    {
        $client = new \GuzzleHttp\Client();
       $response = $client->request('POST', $url,
            $data
        );
        return $response->getBody()->getContents();
    }
}
