@extends('Admin.Layout.layout')
@section('title','添加分类')
@section('col-lg-12')
 	<div class="card col-lg-8 col-lg-offset-2" style="margin-top:50px;">
              <div class="card-header"><h4>添加商品</h4></div>
              <div class="card-body">
          		
                <form name="form" enctype="multipart/form-data" id="forms">
                	{{csrf_field()}}
                  <div class="form-group">
                    <label for="example-nf-email">商品名</label>
                    <input class="form-control" type="name" id="example-nf-email" name="name" placeholder="姓名">
                  </div>
                    
                   <div class="form-group">
                    <label for="example-nf-email">商品分类</label>
                    <select name="tid">
                    	<option value="">请选择</option>
                    	@foreach($cate as $v)
                    	<option value="{{$v->id}}">{{$v->name}}</option>
                    	 @endforeach
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="example-nf-password">商品样图</label>
                    <input class="form-control" type="file" id="example-nf-password" name="pic" placeholder="图样">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-password">价格</label>
                    <input class="form-control" type="text" id="example-nf-password" name="price" placeholder="价格">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">库存</label>
                    <input class="form-control" type="text" id="example-nf-email" name="store" placeholder="库存">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品描述</label>
                    <textarea name="descript" rows="10" cols="20" style="width: 100%;">商品描述:</textarea>
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品状态:</label>
                    <input type="radio"  name="status" value="1" checked="checked">新添加
                    	<input type="radio"  name="status" value="2">在售中
                    	<input type="radio"  name="status" value="3">已下架(失效)
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品颜色:</label>
                    	<input type="radio"  name="color" value="1">粉
                    	<input type="radio"  name="color" value="2">红
                    	<input type="radio"  name="color" value="3">蓝
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="button" id="butt">添加</button>
                  </div>
                </form>
              </div>
    </div>
    <script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
   	<script>
   		//商品名
   		let shopname=document.form.name;
   		//商品类别
   		let shopType=document.form.tid;
   		//商品图样
   		let shoppic=document.form.pic;
   		//商品价格
   		let shopprice=document.form.price;
   		//商品库存
   		let shopstroe=document.form.store;
   		//商品描述
   		let shopdesc=document.form.descript;
   		//商品颜色
   		let shopcolor=document.form.color;
   		//状态
   		let status=document.form.status;
     	$.ajaxSetup({
			headers: 
			{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#butt").click(function(){
			  	let formData=new FormData($("#forms").get(0));
			  	formData.append('name',shopname.value);
			  	formData.append('tid',shopType.value);
			  	formData.append('pic',shoppic.files[0]);
			  	formData.append('price',shopprice.value);
			  	formData.append('store',shopstroe.value);
			  	formData.append('descript',shopdesc.value);
			  	formData.append('color',shopcolor.value);
			  	formData.append('status',status.value);
			  	formData.append('_token','{{ csrf_token() }}');
				$.ajax({
							type:"post",
							url:"{{ url('admin/addgoods') }}",
							dataType:"json",
							data:formData,
							contentType: false, // 告诉jQuery不要去设置Content-Type请求头
							processData: false, // 告诉jQuery不要去处理发送的数据
							success:function()
							{
								alert('添加成功');
								location.href="{{ url('admin/goodlist') }}"
							},
							error:function()
							{
								alert('添加失败');
							}
						});
						return false;
					});
   	</script>
@endsection
