@extends('Admin.Layout.layout')
@section('title','修改')

@section('col-lg-12')
<div class="card col-lg-8 col-lg-offset-2" style="margin-top:50px;">
              <div class="card-header"><h4>修改分类</h4></div>
              <div class="card-body">
                <form name="form">
                	{{ csrf_field() }}
                  <div class="form-group">
                    <label for="example-nf-email">商品类名</label>
                   		 <input class="form-control" type="name" id="example-nf-email" name="name" value="{{ $date->name }}">
                    	 <input type="hidden"  name="id" value="{{$date->id}}"/>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="button" id="butt">添加</button>
                  </div>
                </form> 
              </div>
    </div>
     <!--修改操作-->
     <script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
         <script>
         	let name=document.form.name;
         	let id=document.form.id;
         	$.ajaxSetup({
				headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
          	$('#butt').click(function(){
          		$.ajax({
          	 		type:"post",
          	 		url:"{{ url('admin/update') }}",
          	 		dataType:"json",
          	 		data:
          	 		{
          	 			'id':id.value,
          	 			'name':name.value,
          	 			'_token':'{{ csrf_token() }}'
          	 		},
          	 		async:true,
          	 		success:function()
          	 		{
          	 			alert('修改成功');
          	 			location.href="{{ url('admin/cate') }}"
          	 		},
          	 		error:function()
          	 		{
          	 			alert('修改失败');
          	 		}
          	 	});
          	});
          </script>
@endsection
