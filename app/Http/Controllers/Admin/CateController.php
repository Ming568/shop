<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Cate;

class CateController extends Controller
{
	//类别表单列表
     public function show(Request $request)
     {
     	$searchName=$request->input('name');
		//如果是AJAX请求，则输出表格给前台
		if($request->ajax())
		{
			$cateInfo=Cate::where('name','like','%'.$searchName.'%')->get();
				echo "
				<table class='table table-bordered'>
					<thead>
                      <tr>
                        <th>
                          <label class='lyear-checkbox checkbox-primary'>
                            <input type='checkbox' id='check-all'><span></span>
                          </label>
                        </th>
                        <th>编号</th>
                        <th>标题</th>
                        <th>操作</th>
                      </tr>
                    </thead>";
                  foreach($cateInfo as $k=>$v)
					{
						//设置键值从1开始累加,作为ID号
							if($k>=0)
							{$k=$k+1;}
							echo "
		                      <tr>
		                        <td>
		                          <label class='lyear-checkbox checkbox-primary'>
		                            <input type='checkbox'><span></span>
		                          </label>
		                        </td>
		                        <td>
		                        	$k
		                        </td>
		                        <td>$v->name</td>
		                        <td>
		                          <div class='btn-group'>
		                            <a class='btn btn-xs btn-default' href='/admin/alter/$v->id edit' title='编辑' data-toggle='tooltip'><i class='mdi mdi-pencil'></i></a>
		                            <a class='btn btn-xs btn-default'  title='删除' data-toggle='tooltip' onclick='del($v->id)'><i class='mdi mdi-window-close'></i></a>
		                          </div>
		                        </td>
		                      </tr>
		                     ";
				}
				}else
				{
					$cateInfo=Cate::all();
					return view('admin.cate',['cateInfo'=>$cateInfo]);
				}
     }
	 //添加类别表单渲染
	 public function addCate(Request $request)
	 {
	 	return view('Admin.addCate');
	 }
	 //处理添加的数据
	 public function add(Request $request)
	 {
	 	$name=$request->input('name');
		$this->validate($request,['name'=>'required|unique:vk_type'],
		[
			'name.required'=>':attribute 不能为空',
			'name.unique'=>':attribute 已存在 '
		],
		[
			'name'=>'分类名称'
		]
		);
		Cate::create([
			'name' => $name
		]);
				
		return [
//			'code' => 0,
//			'msg' => '',
//			'redirect_url' => "location.href={{url('admin/cate')}}"
		];
	 }
	 //删除表单数据
	 public function delCate(Request $request)
	 {
	 	Cate::find($_GET['id'])->delete();
		return[];//可以返回值给前端页面
	 }
	 //获取修改数据
	 public function alter(Request $request,$id)
	 {
	 	 $date=Cate::find($id);
		return view('admin.alter')->with('date',$date);
	 }
	 //写入修改的数据
	 public function update(Request $request)
	 {
	 	 $upid=$request->input('id');
		  $upname=$request->input('name');
		 Cate::where('id',$upid)->update(['id'=>$upid,'name'=>$upname]);
		 return [];//返回信息
	 }
	 
	 
}
