<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function Contact()
    {
        return response()->json(['Address' => 'تهران-تهرانپارس-فلکه سوم خیابان 212 .... ', 'Email' => 'info@Gskcollection@Gmail.com', 'Phone' => '+989107608438', 'Fax' => '+98213333333']);
    }
}
