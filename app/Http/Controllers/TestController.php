<?php

namespace App\Http\Controllers;

use App\Statistic;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
{
    public function index(Request $request)
    {



        return View('Pages.Test');
    }
}
