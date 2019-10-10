@extends('Admin.Layout.layout')
@section('title','Vanke网站信息')

@section('col-lg-12')
	<div class="tab-content" style="margin-top:50px">
                <div class="tab-pane active">
                  <form action=" " method="post" name="edit-form" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="web_site_title">网站标题</label>
                      <input class="form-control" type="text" id="web_site_title" name="webname" value="" placeholder="请输入站点标题" >
                    
                    </div>
                    <div class="form-group">
                      <label for="web_site_logo">LOGO图片</label>
                      <div class="input-group" style="width: 100%;">
                        <input type="file" class="form-control" name="logo" id="web_site_logo" value="" placeholder="" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="web_site_keywords">站点关键词</label>
                      <input class="form-control" type="text"  name="keywords" value="" placeholder="请输入站点关键词" >
                      <small class="help-block">网站搜索引擎关键字</small>
                    </div>
                    <div class="form-group">
                      <label for="web_site_description">站点描述</label>
                      <textarea class="form-control"  rows="5" name="descript" placeholder="请输入站点描述" ></textarea>
                      <small class="help-block">网站描述，有利于搜索引擎抓取相关信息</small>
                    </div>
                    <div class="form-group">
                      <label for="web_site_copyright">版权信息</label>
                      <input class="form-control" type="text"  name="copyright" value="" placeholder="请输入版权信息" >
                    </div>
                    <div class="form-group">
                      <label for="web_site_icp">icp备案信息</label>
                      <input class="form-control" type="text"  name="icp" value="" placeholder="请输入备案信息" >
                    </div>
                    <div class="form-group">
                      <label for="web_site_icp">统计</label>
                      <input class="form-control" type="text"  name="count" value="" >
                    </div>
                    <div class="form-group">
                      <label class="btn-block" for="status">站点开关</label>
                      <label class="lyear-switch switch-solid switch-primary">
                        	<input type="radio" name="status" value="0">关闭
                        	<input type="radio" name="status" value="1">开启
                        <span></span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="web_site_icp">关闭原因</label>
                      <input class="form-control" type="text"  name="reason" value="" placeholder="关闭原因" >
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                </div>
              </div>
@endsection
