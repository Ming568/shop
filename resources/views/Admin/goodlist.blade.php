@extends('Admin.Layout.layout')
@section('title','商品列表')
@section('col-lg-12')
		<div class="col-lg-12">
            <div class="card">
              <div class="card-toolbar clearfix">
                <form class="pull-right search-bar" id="form">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <input type="hidden" name="search_field" id="search-field" value="title">
                      <ul class="dropdown-menu">
                        <li> <a tabindex="-1" href="javascript:void(0)" data-field="title">标题</a> </li>
                        <li> <a tabindex="-1" href="javascript:void(0)" data-field="cat_name">栏目</a> </li>
                      </ul>
                    </div>
                    <input type="text" class="form-control" value="" name="keyword" placeholder="请输入名称">
                  </div>
                </form>
                <div class="toolbar-btn-action">
                  <a class="btn btn-primary m-r-5" href="{{url('admin/addgood')}}"><i class="mdi mdi-plus"></i> 新增</a>
                  <a class="btn btn-success m-r-5" href="#!"><i class="mdi mdi-check"></i> 启用</a>
                  <a class="btn btn-warning m-r-5" href="#!"><i class="mdi mdi-block-helper"></i> 禁用</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" id="check-all"><span></span>
                          </label>
                        </th>
                        <th>编号</th>
                        <th>商品类别</th>
                        <th>商品名</th>
                        <th>价格</th>
                        <th>库存</th>
                        <th>商品描述</th>
                        <th>添加时间</th>
                        <th>商品状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                    	 @foreach($shopInfos as $v)
                      <tr>
                        <td>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" name="ids[]" value="1"><span></span>
                          </label>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->tid }}</td>
                        <td>{{ $v->name }}</td>
                        <td style="color: red;">{{ $v->price }}</td>
                        <td>{{ $v->store }}</td>
                        <td>{{ $v->descript }}</td>
                        <td>{{ $v->addtime }}</td>
                        @switch($v->status)
                        	@case(1)
                        	<td>新添加</td>
                        	@break
                        	@case(2)
                        	<td>在售中</td>
                        	@break
                        	@case(3)
                        	<td>已下架(失效)</td>
                        	@break
                        @endswitch
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-xs btn-default" href="{{url('admin/shopalter')}}/{{$v->id}}"  title="编辑" data-toggle="tooltip"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-xs btn-default" title="删除" data-toggle="tooltip" onclick="del({{$v->id}})"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
     	</div>
 		<!--商品删除-->
 		 <script>
          	$.ajaxSetup({
					headers:
					{ 
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
					});
          	  function del(id)
          	  {
          	  	$.ajax({
          	  		type:"get",
          	  		url:"{{ url('admin/shopdel') }}",
          	  		async:true,
          	  		dataType:'json',
          	  		data:
          	  		{
          	  			'id':id,
          	  			'_token':'{{ csrf_token() }}'
          	  		},
          	  		success:function(res)
          	  		{
          	  			alert("删除成功！"); 			
          	  			location.href="{{ url('admin/goodlist') }}";
          	  		},
          	  		error:function()
          	  		{
          	  			alert('删除失败');
          	  		}
          	  	});
          	  }
          </script>
@endsection
