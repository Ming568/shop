@extends('Admin.Layout.layout')
@section('title','商品')

@section('col-lg-12')
		<div class="col-lg-12">
            <div class="card">
              <div class="card-toolbar clearfix">
                <form class="pull-right search-bar" method="get" action="#!" role="form">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <input type="hidden" name="search_field" id="search-field" value="title">
                      <button class="btn btn-default dropdown-toggle" id="search-btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                    	  标题 <span class="caret"></span>
                      </button>
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
                        <th>标题</th>
                        <th>书籍</th>
                        <th>作者</th>
                        <th>阅读量</th>
                        <th>状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" name="ids[]" value="1"><span></span>
                          </label>
                        </td>
                        <td>1</td>
                        <td>第01章 天涯思君不可忘</td>
                        <td>《倚天屠龙记》</td>
                        <td>金庸</td>
                        <td>36</td>
                        <td><font class="text-success">正常</font></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-xs btn-default" href="#!" title="编辑" data-toggle="tooltip"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-xs btn-default" href="#!" title="删除" data-toggle="tooltip"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
     	</div>
@endsection
