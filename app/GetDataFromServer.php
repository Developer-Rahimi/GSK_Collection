<?php
namespace App;
use App\Cache;
use Carbon\Carbon;

class GetDataFromServer {
        public static function get($url,$day,$hours)
        {
            $data=Cache::where('url',$url)->first();
            if($data){
                /*$client = new \GuzzleHttp\Client();
                $request = $client->get($url);
                $response = $request->getBody()->getContents();
                $data->data =$response;
                $data->update_at =Carbon::now();
                $data->save();*/

                //return  $data->data;
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
                //if($data->update_at)
                return  $data->data;
            }else {
                $client = new \GuzzleHttp\Client();
                $request = $client->get($url);
                $response = $request->getBody()->getContents();
                $cache=new Cache();
                $cache->url =$url;
                $cache->data =$response;
                $cache->created_at =Carbon::now();
                $cache->update_at =Carbon::now();
                $cache->save();
            }
        }
    }
