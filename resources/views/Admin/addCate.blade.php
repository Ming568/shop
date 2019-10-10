@extends('Admin.Layout.layout')
@section('title','添加分类')
@section('col-lg-12')
<div class="card col-lg-8 col-lg-offset-2" style="margin-top:50px;">
              <div class="card-header"><h4>添加分类</h4></div>
              <div class="card-body">
                <form method="post"  name="form">
                	{{ csrf_field() }}
                  <div class="form-group">
                    <label for="example-nf-email">商品类名</label>
                    <input class="form-control" type="name" id="example-nf-email" name="name" placeholder="类名">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="button" id="butt">添加</button>
                  </div>
                </form> 
              </div>
    </div>
    <script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
    <script>
					let name=document.form.name;
					$.ajaxSetup({
						headers: 
							{
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
					});
					$("#butt").click(function(){
								$.ajax({
									type:"post",
									url:"{{ url('admin/add') }}",
									async:true,
									dataType:"json",
									data:
									{
										 'name':name.value,
										 '_token':'{{ csrf_token() }}'
									},
									success:function()
									{
										alert('添加成功');
										location.href="{{ url('admin/cate') }}"
									},
									error:function()
									{
										alert('已存在');
									}
								});
					});
    </script>
    
@endsection