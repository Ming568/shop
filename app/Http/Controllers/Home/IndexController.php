<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		for($a=0;$a<4;$a++)
    		{
    			echo "<div id='shop' class='col-md-3'>
				<div class='thumbnail'>
					<a href='#'>
						<img src='/Home/image/6375344-1j201710181702562128.jpg' alt='暂无商品信息' title='购买'/>
					</a>
					<div class='caption'>	
						<p><span style='color:orange;'>商品详情</span></p>
						<p><i>￥125</i><a href='#'>点击查看</a></p>
					</div>
				</div>
				</div>";
    		}
    	}else
    	{
    		return view('home.index');
    	}
    	
    }
	
}
