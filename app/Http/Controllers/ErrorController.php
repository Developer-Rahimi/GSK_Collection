<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ErrorController extends Controller
{
    public function Access()
    {
        return View('Access');
    }
}
