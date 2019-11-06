<?php

namespace App\Providers;

use App\Cache;
use App\Statistic;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $view->with('User', \Session::get('Login') );
            $view->with('Login', true);
        });
        $date=Carbon::today();
        $data=Statistic::wheredate('Datetime','=',$date)->orderBy('Datetime', 'desc')->first();
        if($data!=null){
            $d=Carbon::today();;
            $data->Review=$data->Review+1;
            $data->Datetime=$date;
            $data->save();
        }else{
            $d=Carbon::today();;
            $sta =new Statistic();
            $sta->Review=1;
            $sta->Datetime=$d;
            $sta->save();
        }


    }
}
