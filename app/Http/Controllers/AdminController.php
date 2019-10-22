<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return  View('Admin.index');
    }
    public function User()
    {
        return  View('Admin.User');
    }
    public function Content()
    {
        return  View('Admin.Content');
    }
}
