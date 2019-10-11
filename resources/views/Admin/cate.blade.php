@extends('Admin.Layout.layout')
@section('title','分类')

@section('col-lg-12')
	<div class="col-lg-12">
            <div class="card">
              <div class="card-toolbar clearfix">
                <form class="pull-right search-bar" name="form">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <ul class="dropdown-menu">
                        <li> <a tabindex="-1" href="javascript:void(0)" data-field="title">标题</a> </li>
                        <li> <a tabindex="-1" href="javascript:void(0)" data-field="cat_name">栏目</a> </li>
                      </ul>
                    </div>
                    <input type="text" class="form-control"  name="name" placeholder="请输入名称" onblur="search(this.value)">
                  </div>
                </form>
                <div class="toolbar-btn-action">
                  <a class="btn btn-primary m-r-5" href="{{url('admin/addCate')}}"><i class="mdi mdi-plus"></i> 新增</a>
                  <a class="btn btn-success m-r-5" href="#!"><i class="mdi mdi-check"></i> 启用</a>
                  <a class="btn btn-warning m-r-5" href="#!"><i class="mdi mdi-block-helper"></i> 禁用</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive" id="back">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" id="check-all"><span></span>
                          </label>
                        </th>
                        <th>编号</th>
                        <th>标题</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    	@foreach($cateInfo as $v)
                      <tr>
                        <td>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" name="ids[]" value="1"><span></span>
                          </label>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->name}}</td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-xs btn-default" href="{{url('admin/alter')}}/{{$v->id}}"  title="编辑" data-toggle="tooltip"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-xs btn-default"  title="删除" data-toggle="tooltip" onclick="del({{$v->id}})"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                     </tbody>
              </div>
            </div>
          </div>
            <script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
        	<!--删除操作-->
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
          	  		url:"{{ url('admin/del') }}",
          	  		async:true,
          	  		dataType:'json',
          	  		data:
          	  		{
          	  			'id':id,
          	  			'_token':'{{ csrf_token() }}'
          	  		},
          	  		success:function()
          	  		{
          	  			alert('删除成功'); 			
          	  			location.href="{{ url('admin/cate') }}";
          	  		},
          	  		error:function()
          	  		{
          	  			alert('删除失败');
          	  		}
          	  	});
          	  }
          </script>
          <!--搜索-->
          <script>
          	 function search(str)
          	  {
          	  	//浏览器兼容性设置
          	  	 let aj;
          	  	 if(window.XMLHttpRequest)
				{
					 aj=new XMLHttpRequest;
				}else
				{
					 aj=new ActiveXObject("Microsoft.XMLHTTP");
				}
				aj.onreadystatechange=function()
				{
					if(aj.readyState==4 && aj.status==200)
					{
						document.getElementById("back").innerHTML=aj.responseText;
					}
				}
				aj.open('GET','/admin/cate?name='+str,true);
				aj.setRequestHeader('x-requested-with', 'XMLHttpRequest');
				aj.send();
          	  }
          </script>
@endsection