<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebInfoController extends Controller
{
    public function show()
    {
    	return view('Admin/webinfo');
    }
}
