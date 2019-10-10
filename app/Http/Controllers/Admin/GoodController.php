<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
	//商品列表显示
    public function show()
    {
    	return view('Admin.goodlist');
    }
	//添加商品
	public function addGood()
	{
		return view('Admin.addgood');
	}
	
}
