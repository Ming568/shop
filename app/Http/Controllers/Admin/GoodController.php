<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Goods;
use App\Admin\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
	//商品列表显示包含模糊查询
    public function show(Request $request)
    {
    	$searchName=$request->input('name');
		//获取附加参数
		$page=$request->input('page');
		//如果是AJAX请求，则输出表格给前台
		if($request->ajax())
		{
				echo "
				<table class='table table-bordered'>
					<thead>
                      <tr>
                        <th>编号</th>
                        <th>商品图样</th>
                        <th>商品类别</th>
                        <th>商品名</th>
                        <th>价格</th>
                        <th>库存</th>
                        <th>商品描述</th>
                        <th>添加时间</th> 
                        <th style='width:50px;height:40px'>颜色</th>
                        <th>商品状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>";
					//ajax分页
				//数据总数
				$shopSum=Goods::count();
				//设置显示条数
				$showrow=3;
				//获取最大页码
				$maxRow=ceil($shopSum/$showrow);
				//防止越界
				if(empty($page))
				{
					$page=1;
				}
				$up=($page-1)>0?$page-1:1;
				//下页
				$down=($page+1)<=$maxRow?$page+1:$maxRow;
				//偏移量
				$offset=($page-1)*$showrow;
				//商品信息
				$shopInfos=Goods::where('name','like','%'.$searchName.'%')
				->offset($offset)
				->limit($showrow)
				->get();
				echo " 
					<div>
						<ul class='pagination pagination-md'>
						<li><a href='javascript:void(0)' onclick='page(1)'>首页</a></li>
					    <li><a href='javascript:void(0)' onclick='page($up)'>&lt</a></li>
					    <li><a href='javascript:void(0)' onclick='page($down)'>&gt</a></li>
					    <li><a href='javascript:void(0)' onclick='page($maxRow)'>尾页</a></li>
					    </ul>
					</div>    
					   ";
				//类型信息
				$typeInfos=Cate::all();
                  foreach($shopInfos as $k=>$v)
					{
						//设置键值从1开始累加,作为ID号
							if($k>=0)
							{$k=$k+1;}
							echo "
		                     	<tr>
			                        <td>
			                        	$k
			                        </td>
		                        <td><img src='/Admin/shoppic/$v->pic' style='width:50px;height:40px'></td>";
								//取出类型
								foreach($typeInfos as $t)
								{
									if( $v->tid == $t->id) echo "<td>$t->name</td>";
								}  
		                    echo"<td>$v->name</td>
		                         <td style='color:orange;'>$v->price</td>
		                         <td>$v->store</td>
		                         	<td>
		                        	 <div style='white-space:nowrap;overflow:hidden;text-overflow:ellipsis;width:100px;'>
		                         		$v->descript
		                         	 </div>	
		                         	</td>
		                         <td>$v->addtime</td>";
		                          switch($v->color)
			                       {
										case 1:
										echo "<td>粉</td>";
										break;
										case 2:
											echo "<td>红</td>";
										break;
										case 3:
											echo "<td>蓝</td>";
										break;
			                       } 
		                       switch($v->status)
		                       {
									case 1:
									echo "<td>新添加</td>";
									break;
									case 2:
										echo "<td>在售中</td>";
									break;
									case 3:
										echo "<td>已下架(失效)</td>";
									break;
		                       } 
		                      echo"
		                        <td>
		                          <div class='btn-group'style='width:80px'>
		                            <a class='btn btn-xs btn-default' href='/admin/shopalter/$v->id edit' title='编辑' data-toggle='tooltip'><i class='mdi mdi-pencil'></i></a>
		                            <a class='btn btn-xs btn-default'  title='删除' data-toggle='tooltip' onclick='del($v->id)'><i class='mdi mdi-window-close'></i></a>
		                          </div>
		                        </td>
		                        </tr>"; 
					}
					
				}else
				{
					//商品信息
					$shopInfos=Goods::paginate(3);
					//分类信息
					$typeInfo=Cate::all();
			    	return view('Admin.goodlist',['shopInfos'=>$shopInfos])->with('typeInfo',$typeInfo);
				}
    }
	//表单渲染
	public function addGood(Request $request)
	{
		//查询分类信息渲染页面
		$cateInfo=Cate::all();
		return view('Admin.addgood',['cate'=>$cateInfo]);
	}
	//添加商品,处理添加商品的数据
	public function addGoods(Request $request)
	{
		//获取前端数据
		$goodInfos=$request->except('_token');
		//验证输入信息是否重复
		$this->validate($request,['name'=>'required|unique:vk_goods']);
		//获取文件名
		$filename=$goodInfos['pic']->getClientOriginalName();
		//获取临时目录
		$filetempname=$goodInfos['pic']->getPathname();
		//获取文件后缀
		$fileExcepion=$goodInfos['pic']->getClientOriginalExtension();
		//文件类型判断
		if(in_array($fileExcepion, ['jpg','png','jpeg','gif']))
		{
			//设置文件新名字
			$newFile=md5(date('Y-m-d h:i:s')).$filename;
			//转存
			if(is_uploaded_file($filetempname))
			{
				$request->file('pic')->move('./Admin/shoppic',$newFile); 
			}
			//添加时间和图片路径
			$addtime=['addtime'=>date('Y-m-d,H:i:s'),'pic'=>$newFile];
			//合并数组
			$date=array_merge($goodInfos,$addtime);
			//添加数据
			$addRes=Goods::create($date);
			//可返回相关信息
			return [];
		}else
		{
			//重定向回添加页面
			return redirect('admin/addgood');
		}
	}
	//商品删除
	public function shopDel(Request $request)
	{
		//开启事务
		\DB::beginTransaction();
		//获取图片路劲
		$delpic=Goods::find($_GET['id'])->pic;
		//执行删除操作
		$delRes=Goods::find($_GET['id'])->delete();
		if($delRes!=false)
		{
			\DB::commit();
			//删除旧图片
			unlink('./Admin/shoppic/'.$delpic);
			return 
			[
				'res'=>'删除成功！！！'
			];
		}else
		{
			\DB::rollback();
			return 
			[
				'res'=>'删除失败！！！'
			];
		}
		
	}
	//商品修改数据查询
	public function shopAlter(Request $request,$id)
	{
		//获取修改信息
		$alterDate=Goods::find($id);
		//获取类型表的id值(父类ID)
		$tid=$alterDate->tid;
		//查询父类信息
		$typeInfos=Cate::find($tid);
		//转换数据格式
		$updatedate=collect($alterDate)->toArray();
		$typedate=collect($typeInfos)->toArray();
		$date=array_merge($updatedate,$typedate);
		return view('admin.shopalter',['date'=>$date])->with('alterdate',$alterDate);
	}
	//处理商品修改数据
	public function shopUpdate(Request $request)
	{
		//获取修改对应ID
		$updateID=$request->input('id');
		//获取修改数据
		$date=$request->except('_token');
		Goods::where('id',$updateID)->update($date);
		return [
			'res'=>'修改成功'
		];
	}
}
