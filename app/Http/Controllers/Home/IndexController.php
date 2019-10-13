<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Redis;
use App\Admin\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	//商品渲染
    public function index(Request $request)
    {
    	//ajax
    	if($request->ajax())
    	{
    		//定义两个键
    		$shopkey='LIST:shopkey';
			$shophash='HSAH:shopContent:';
			if(Redis::exists($shopkey))
    		{
    			//获取所有商品的ID
    			$AllId=Redis::lrange($shopkey,0,-1);
    			foreach($AllId as $k=>$v)
    			{
    				//把商品内容和商品ID相关联
    				$shopContent[]=Redis::hgetall($shophash.$v);
    			}
    		}else
    		{
//    			没有radis缓存,查询前十条数据，存入redis,剩下的由AJAX加载出来
    			$shopInfo=Goods::offset(10)
    			->limit(10)
    			->get()->toArray();
    			//存入redis
    			 foreach($shopInfo as $v)
				 {
				 	//将商品ID存入$shopkey中
				 	Redis::rpush($shopkey,$v['id']);
				 	//将商品内容放入shophash中
				 	Redis::hmset($shophash.$v['id'],$v);
				 }
    		}	//跳过前10条数据
//  		$shopInfo=Goods::offset(10)
//  		->limit(10)
//  		->get();
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
			//定义两个键
			$shopkey='LIST:shopkey';
			$shophash='HSAH:shopContent:';
    		//判断radis中是否有商品信息
    		if(Redis::exists($shopkey))
    		{
    			//获取所有商品的ID
    			$AllId=Redis::lrange($shopkey,0,-1);
    			foreach($AllId as $k=>$v)
    			{
    				//把商品内容和商品ID相关联
    				$shopContent[]=Redis::hgetall($shophash.$v);
    			}
    		}else
    		{
    			
//    			没有radis缓存,查询前十条数据，存入redis,剩下的由AJAX加载出来
    			$shopInfo=Goods::limit(10)->get()->toArray();
    			//存入redis
    			 foreach($shopInfo as $v)
				 {
				 	//将商品ID存入$shopkey中
				 	Redis::rpush($shopkey,$v['id']);
				 	//将商品内容放入shophash中
				 	Redis::hmset($shophash.$v['id'],$v);
				 }
    		}
    		return view('home.index', compact('shopContent'));
    	}
    	
    }
	
}
