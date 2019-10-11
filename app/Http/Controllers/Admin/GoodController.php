<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Goods;
use App\Admin\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
	//商品列表显示
    public function show()
    {
		//商品信息
		$shopInfos=Goods::all();
    	return view('Admin.goodlist',['shopInfos'=>$shopInfos]);
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
		$goodInfos=$request->except('_token');
		$this->validate($request,['name'=>'required|unique:vk_goods']);
		//添加时间
		$addtime=['addtime'=>date('Y-m-d,H:i:s')];
		$date=array_merge($goodInfos,$addtime);
		$addRes=Goods::create($date);
		return [
			
		];
	}
	//商品删除
	public function shopDel(Request $request)
	{
		Goods::find($_GET['id'])->delete();
		return 
		[
			'res'=>'删除成功！！！'
		];
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
		$date=$request->except('_token');
		
	}
}
