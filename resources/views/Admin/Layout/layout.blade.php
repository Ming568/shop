<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>@yield('title')- 后台管理系统</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--<link rel="icon" href="favicon.ico" type="image/ico">-->
<link href="{{ asset('/Admin/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/Admin/css/materialdesignicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('/Admin/css/style.min.css') }}" rel="stylesheet">
	 <script src="{{asset('/Admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('/Admin/js/xadmin.js')}}"></script>
</head>
  
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">
      
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="{{ url('admin/index') }}" style="font-size:20px">Vanke</a>
      </div>
      <div class="lyear-layout-sidebar-scroll"> 
        
        <nav class="sidebar-main">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="{{ url('admin/index') }}"><i class="mdi mdi-home"></i> 后台首页</a> </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-format-align-justify"></i> 分类管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="{{url('admin/cate')}}">分类列表</a> </li>
                <li> <a href="{{url('admin/addCate')}}">添加类别</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-format-align-justify"></i>商品信息管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="{{url('admin/goodlist')}}">商品列表</a> </li>
                <li> <a href="{{url('admin/addgood')}}">添加商品</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-format-align-justify"></i>订单管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="#">订单列表</a> </li>
                <li> <a href="#">添加订单</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-menu"></i>公告文章</a>
              <ul class="nav nav-subnav">
                <li> <a href="#">文章列表</a> </li>
                <li> <a href="#">添加文章</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-menu"></i>会员管理</a>
               <ul class="nav nav-subnav">
                <li> <a href="#">用户列表</a> </li>
                <li> <a href="#">添加用户</a> </li>
              </ul>
            </li>
             <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-menu"></i>购物模块</a>
               <ul class="nav nav-subnav">
                <li> <a href="#">订单列表</a> </li>
                <li> <a href="#">待定</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-menu"></i>权限管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="#!">一级菜单</a> </li>
                   <li> <a href="#!">一级菜单</a> </li>
                <li class="nav-item nav-item-has-subnav"> 
                  <a href="#!">一级菜单</a>
                  <ul class="nav nav-subnav">
                    <li> <a href="#!">二级菜单</a> </li>
                    <li class="nav-item nav-item-has-subnav"> 
                      <a href="#!">二级菜单</a>
                      <ul class="nav nav-subnav">
                        <li> <a href="#!">三级菜单</a> </li>
                        <li> <a href="#!">三级菜单</a> </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-menu"></i>网站管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="{{url('admin/webinfo')}}">网站信息修改</a> </li>
                <li class="nav-item nav-item-has-subnav"> 
                  <a href="#!">关于我们</a>
                  <ul class="nav nav-subnav">
                    <li> <a href="#!">二级菜单</a> </li>
                    <li class="nav-item nav-item-has-subnav"> 
                      <a href="#!">二级菜单</a>
                      <ul class="nav nav-subnav">
                        <li> <a href="#!">三级菜单</a> </li>
                        <li> <a href="#!">三级菜单</a> </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        
        <div class="sidebar-footer">
          <p class="copyright">Copyright &copy; 2019. <a target="_blank" href="{{url('admin/index')}}">Six</a> All rights reserved.</p>
        </div>
      </div>
      
    </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          
          <div class="topbar-left">
            <div class="lyear-aside-toggler">
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
            </div>
            <span class="navbar-page-title">后台</span>
          </div>
          
          <ul class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown">
               <!-- <img class="img-avatar img-avatar-48 m-r-10" src="" />-->
                <span>{{session('infos.username')}}<span class="caret"></span></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li> <a href="lyear_pages_profile.html"><i class="mdi mdi-account"></i> 个人信息</a> </li>
                <li> <a href="lyear_pages_edit_pwd.html"><i class="mdi mdi-lock-outline"></i>修改密码</a></li>
                <li class="divider"></li>
                <li> <a href="{{url('admin/logout')}}"><i class="mdi mdi-logout-variant"></i>退出登录</a></li>
              </ul>
            </li>
            <!--切换主题配色-->
		    <li class="dropdown dropdown-skin">
			  <span data-toggle="dropdown" class="icon-palette"><i class="mdi mdi-palette"></i></span>
			  <ul class="dropdown-menu dropdown-menu-right" data-stopPropagation="true">
                <li class="drop-title"><p>主题</p></li>
                <li class="drop-skin-li clearfix">
                  <span class="inverse">
                    <input type="radio" name="site_theme" value="default" id="site_theme_1" checked>
                    <label for="site_theme_1"></label>
                  </span>
                  <span>
                    <input type="radio" name="site_theme" value="dark" id="site_theme_2">
                    <label for="site_theme_2"></label>
                  </span>
                  <span>
                    <input type="radio" name="site_theme" value="translucent" id="site_theme_3">
                    <label for="site_theme_3"></label>
                  </span>
                </li>
			    <li class="drop-title"><p>LOGO</p></li>
				<li class="drop-skin-li clearfix">
                  <span class="inverse">
                    <input type="radio" name="logo_bg" value="default" id="logo_bg_1" checked>
                    <label for="logo_bg_1"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_2" id="logo_bg_2">
                    <label for="logo_bg_2"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_3" id="logo_bg_3">
                    <label for="logo_bg_3"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_4" id="logo_bg_4">
                    <label for="logo_bg_4"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_5" id="logo_bg_5">
                    <label for="logo_bg_5"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_6" id="logo_bg_6">
                    <label for="logo_bg_6"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_7" id="logo_bg_7">
                    <label for="logo_bg_7"></label>
                  </span>
                  <span>
                    <input type="radio" name="logo_bg" value="color_8" id="logo_bg_8">
                    <label for="logo_bg_8"></label>
                  </span>
				</li>
				<li class="drop-title"><p>头部</p></li>
				<li class="drop-skin-li clearfix">
                  <span class="inverse">
                    <input type="radio" name="header_bg" value="default" id="header_bg_1" checked>
                    <label for="header_bg_1"></label>                      
                  </span>                                                    
                  <span>                                                     
                    <input type="radio" name="header_bg" value="color_2" id="header_bg_2">
                    <label for="header_bg_2"></label>                      
                  </span>                                                    
                  <span>                                                     
                    <input type="radio" name="header_bg" value="color_3" id="header_bg_3">
                    <label for="header_bg_3"></label>
                  </span>
                  <span>
                    <input type="radio" name="header_bg" value="color_4" id="header_bg_4">
                    <label for="header_bg_4"></label>                      
                  </span>                                                    
                  <span>                                                     
                    <input type="radio" name="header_bg" value="color_5" id="header_bg_5">
                    <label for="header_bg_5"></label>                      
                  </span>                                                    
                  <span>                                                     
                    <input type="radio" name="header_bg" value="color_6" id="header_bg_6">
                    <label for="header_bg_6"></label>                      
                  </span>                                                    
                  <span>                                                     
                    <input type="radio" name="header_bg" value="color_7" id="header_bg_7">
                    <label for="header_bg_7"></label>
                  </span>
                  <span>
                    <input type="radio" name="header_bg" value="color_8" id="header_bg_8">
                    <label for="header_bg_8"></label>
                  </span>
				</li>
				<li class="drop-title"><p>侧边栏</p></li>
				<li class="drop-skin-li clearfix">
                  <span class="inverse">
                    <input type="radio" name="sidebar_bg" value="default" id="sidebar_bg_1" checked>
                    <label for="sidebar_bg_1"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_2" id="sidebar_bg_2">
                    <label for="sidebar_bg_2"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_3" id="sidebar_bg_3">
                    <label for="sidebar_bg_3"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_4" id="sidebar_bg_4">
                    <label for="sidebar_bg_4"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_5" id="sidebar_bg_5">
                    <label for="sidebar_bg_5"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_6" id="sidebar_bg_6">
                    <label for="sidebar_bg_6"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_7" id="sidebar_bg_7">
                    <label for="sidebar_bg_7"></label>
                  </span>
                  <span>
                    <input type="radio" name="sidebar_bg" value="color_8" id="sidebar_bg_8">
                    <label for="sidebar_bg_8"></label>
                  </span>
				</li>
			  </ul>
			</li>
            <!--切换主题配色-->
          </ul>
          
        </div>
      </nav>
      
    </header>
    <!--End 头部信息-->
    
    <!--页面主要内容-->
    <main class="lyear-layout-content">
      <!--in--> 
    	<div class="col-lg-12">
    			@yield('col-lg-12')
    	</div>
      <!--in-->
    </main>
    <!--End 页面主要内容-->
  </div>
</div>

<script type="text/javascript" src="{{ asset('/Admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Admin/js/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/Admin/js/main.min.js')}}"></script>
<!--图表插件-->
<script type="text/javascript" src="{{ asset('/Admin/js/Chart.js') }}"></script>

</body>
</html>