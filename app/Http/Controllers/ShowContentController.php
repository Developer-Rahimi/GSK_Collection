<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowContentController extends Controller
{
    public function index()
    {
        return view("Pages.ShowContent");
    }
}
