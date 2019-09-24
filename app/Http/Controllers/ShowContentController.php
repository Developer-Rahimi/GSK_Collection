<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowContentController extends Controller
{
    public function index($id)
    {
        return view("Pages.ShowContent",compact('id'));
    }
}
