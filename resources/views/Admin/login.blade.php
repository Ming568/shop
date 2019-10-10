<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <!--code-->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('/Admin/favicon.ico')}}" type="image/x-icon" />
	<link rel="stylesheet" href="{{asset('/Admin/css/xadmin.css')}}">
	<link rel="stylesheet" href="{{asset('/Admin/css/bootstrap.min1.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('/Admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('/Admin/js/xadmin.js')}}"></script>
    <!--此处为验证规则-->
	<script>
        $(function(){
            layui.use(['form'], function(){
              var form = layui.form;
              form.verify({
              	validatepass:[/^[0-9a-zA-Z]{6,18}/,'密码必须为6-18个字节！']
              });
//            form.verify({
//            	validateemail:[/^[0-9a-zA-Z]{6,18}@[a-z0-9]+(\.[a-z]+){1,2}$/,'请正确填写邮箱格式！']
//            });
              //监听提交
              form.on('submit(login)', function(data){
//              layer.msg(JSON.stringify(data.field),function(){
                	location.href="{{url('admin/check')}}"
//              });
                return true;
              });
            });
        })
    </script>
</head>
<body class="login-bg">
    <div class="login layui-anim layui-anim-up">
        <div class="message">管理登录</div>
        <div id="darkbannerwrap"></div>
       
        <form method="post" class="layui-form" action="{{url('admin/check')}}" >
        	{{ csrf_field() }}
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required|validatepass" placeholder="密码"  type="password" class="layui-input"  autocomplete="off" >
            <hr class="hr15">
            <!--<input name="email" lay-verify="required|validateemail" placeholder="邮箱"  type="email" class="layui-input"  autocomplete="off" >
            <hr class="hr15">-->
            <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" style="width:150px;float:left;">
            <hr class="hr15">
            	<a onclick="javascript:re_captcha();">  
					<img src="{{ URL('/code/captcha/1') }}" id="23456789abcdefghjkmnpqrstuvwsyz" style="float:right;margin-top:-60px;">  
				</a>  
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
         <!--错误提示区域-->
        	@foreach ($errors->all() as $error)
			<div class="alert alert-danger alert-dismissable" style="width:80%;margin:0 auto;border: 1px solid;">
				<button type="button" class="close" data-dismiss="alert"
						aria-hidden="true">
					&times;
				</button>
				{{ $error }}
			</div>
			@endforeach
			
			@if(session('error'))
				{{ session('error') }}
			@endif	
        <!--错误提示区域-->
       
    </div>
    <!-- 底部结束 -->
</body>
 <!--验证码-->
   <script type="text/javascript">  
	function re_captcha() {  
	    $url = "{{ URL('/code/captcha') }}";
	    $url = $url + "/" + Math.random();
	        document.getElementById('23456789abcdefghjkmnpqrstuvwsyz').src = $url;
	    }
</script>
</html>