<?php

namespace App\Http\Controllers\Home;

use App\Admin\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	//ajax
    	if($request->ajax())
    	{
    		//跳过前10条数据
    		$shopInfo=Goods::offset(10)
    		->limit(10)
    		->get();
			foreach($shopInfo as $v)
			{
				//过滤失效的商品
				if($v->status != 3)
				{
					echo "<div id='shop' class='col-md-3'>
							<div class='thumbnail'>
							<a href='#'>
									<img src='/Admin/shoppic/$v->pic' alt='暂无商品信息' title='购买' style='width:100%;height:150px;'/>
								</a>	
							<div class='caption'>	
									<p>
										<span style='color:orange;'>
									 	<div style='white-space:nowrap;overflow:hidden;text-overflow:ellipsis;width:200px;' >
					                        <span>商品详情:</span>&nbsp;<span style='color:red;'>$v->descript</span>
					                    </div>	
					                    </span>
					               	</p>";
					                    if($v->status == 1)
										{
											echo "<p style='float:left;color:green;font-size:15px;'>
														新品
												  </p>";
										}
					echo "<i style='font-size:15px;color:orange;margin-left:-150px;'>￥$v->price</i>
							<p><a href='#'>点击查看</a></p>
								</div>
							</div>
						</div>";
				}
				
			} 			
    	}else
    	{
    		//查询前十条数据，剩下的由AJAX加载出来
    		$shopInfo=Goods::limit(10)->get();
    		return view('home.index',['shopInfo'=>$shopInfo]);
    	}
    	
    }
	
}
