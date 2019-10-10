@extends('Admin.Layout.layout')
@section('title','添加分类')

@section('col-lg-12')
 	<div class="card col-lg-8 col-lg-offset-2" style="margin-top:50px;">
              <div class="card-header"><h4>添加商品</h4></div>
              <div class="card-body">
                
                <form action=" " method="post" onsubmit="return false;">
                	{{csrf_field()}}
                  <div class="form-group">
                    <label for="example-nf-email">商品名</label>
                    <input class="form-control" type="name" id="example-nf-email" name="name" placeholder="姓名">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-password">价格</label>
                    <input class="form-control" type="password" id="example-nf-password" name="password" placeholder="价格">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">库存</label>
                    <input class="form-control" type="text" id="example-nf-email" name="store" placeholder="库存">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品描述</label>
                    <textarea name="desc" rows="10" cols="20" style="width: 100%;">商品描述</textarea>
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">添加时间</label>
                    <input class="form-control" type="text" id="example-nf-email" name="addtime" placeholder="添加时间">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-email">商品状态:</label>
                    <input type="radio"  name="status" value="0">新添加
                    	<input type="radio"  name="status" value="1">在售中
                    		<input type="radio"  name="status" value="2">已下架(失效)
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">添加</button>
                  </div>
                </form>
                
              </div>
    </div>
@endsection
