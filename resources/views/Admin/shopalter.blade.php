@extends('Admin.Layout.layout')
@section('title','商品修改')
@section('col-lg-12')
<div class="card col-lg-8 col-lg-offset-2" style="margin-top:50px;">
              <div class="card-header"><h4>修改分类</h4></div>
              <div class="card-body">
                <form name="form">
                	{{csrf_field()}}
                  <div class="form-group">
                    <label for="example-nf-email">商品名</label>
                    <input type="hidden" name="id" value=" {{$alterdate->id}}" />
                     <input type="hidden" name="addtime" value=" {{$alterdate->addtime}}" />
                    <input class="form-control" type="name" id="example-nf-email" name="name" placeholder="姓名" value="{{ $alterdate->name }}">
                  </div>
                   <div class="form-group">
                    <label for="example-nf-email">商品分类</label>
                    <select name="tid">
                    	<option value="{{$date['tid']}}">{{ $date['name'] }}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="example-nf-password">价格</label>
                    <input class="form-control" type="text" id="example-nf-password" name="price" placeholder="价格" value="{{$date['price']}}">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">库存</label>
                    <input class="form-control" type="text" id="example-nf-email" name="store" placeholder="库存" value="{{$date['store']}}">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品描述</label>
                    <textarea name="descript" rows="10" cols="20" style="width: 100%;">{{$date['descript']}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品状态:</label>
                    @switch($date['status'])
                    	@case(1)
                    		  <input type="radio"  name="status" value="1" checked="checked">新添加
                    		  	<input type="radio"  name="status" value="2" >在售中
                    		  		<input type="radio"  name="status" value="3">已下架(失效)
                    		@break
                    	@case(2)
                    			<input type="radio"  name="status" value="1" >新添加
                    		  	<input type="radio"  name="status" value="2" checked="checked">在售中
                    		  		<input type="radio"  name="status" value="3" >已下架(失效)
                    		@break
                    	@case(3)
                    			<input type="radio"  name="status" value="1" >新添加
                    		  	<input type="radio"  name="status" value="2" >在售中
                    		  		<input type="radio"  name="status" value="3" checked="checked">已下架(失效)
                    		@break
                    @endswitch		
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">颜色:</label>
                    @switch($date['color'])
                    	@case(1)
                    		  <input type="radio"  name="color" value="1" checked="checked">粉
                    		  	<input type="radio" name="color" value="2" >红
                    		  		<input type="radio"  name="color" value="3">蓝
                    		@break
                    	@case(2)
                    			<input type="radio"  name="color" value="1" >粉
                    		  	<input type="radio"  name="color" value="2" checked="checked">红
                    		  		<input type="radio"  name="color" value="3" >蓝
                    		@break
                    	@case(3)
                    			<input type="radio" name="color" value="1" >粉
                    		  	<input type="radio"  name="color" value="2" >红
                    		  		<input type="radio" name="color" value="3" checked="checked">蓝
                    		@break
                    @endswitch		
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit" id="butt">添加</button>
                  </div>
                </form>
              </div>
    </div>
     <!--修改操作-->
     <script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
         <script>
         //商品名
	   		let shopname=document.form.name;
	   		//商品类别
	   		let shopType=document.form.tid;
	   		//商品价格
	   		let shopprice=document.form.price;
	   		//商品库存
	   		let shopstroe=document.form.store;
	   		//商品描述
	   		let shopdesc=document.form.descript;
	   		//状态
	   		let status=document.form.status;
	   		//时间
	   		let shopaddtime=document.form.addtime;
	   		//颜色
	   		let shopcolor=document.form.color;
	   		//id
	   		let shopid=document.form.id;
         	$.ajaxSetup({
				headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
          	$('#butt').click(function(){
          		$.ajax({
          	 		type:"post",
          	 		url:"{{ url('admin/shopupdate') }}",
          	 		dataType:"json",
          	 		data:
          	 		{
          	 			'id':shopid.value,
          	 			'addtime':shopaddtime.value,
          	 			'name':shopname.value,
									'tid':shopType.value,
									'price':shopprice.value,
									'store':shopstroe.value,
									'descript':shopdesc.value,
									'color':shopcolor.value,
									'status':status.value,
									'_token':'{{ csrf_token() }}'
          	 		},
          	 		async:true,
          	 		success:function(res)
          	 		{
          	 			alert('修改成功');
          	 			location.href="{{ url('admin/goodlist') }}"
          	 		},
          	 		error:function()
          	 		{
          	 			alert('修改失败');
          	 		}
          	 	});
          	});
         </script>
@endsection
