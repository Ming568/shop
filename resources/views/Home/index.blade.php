<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>凡客商城</title>
	<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script> 
	<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{ asset('/Home/css/common.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/indexnew.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/list.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/login.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/regist.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/mycart.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/order.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/preinfo.css') }}">
	<link rel="stylesheet" href="{{ asset('/Home/css/orderdetailed.css') }}">
</head>
<body>
	<!-- 头部开始 -->
	<div class="head">
		<!-- 头部欢迎注册登录开始 -->
		<div class="login">
			<div class="main">
				<div class="headleft fl">
					<span>
					你好，欢迎光临凡客诚品!&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="./login.html">登录</a>&nbsp;&nbsp; | &nbsp;&nbsp;
					<a href="./out.html">退出</a>&nbsp;&nbsp;
					<a href="order.html">我的订单</a>
					</span>
				</div>
				<div class="headright fl">
					<div class="gonggao fl">
						<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站公告</a>
					</div>
					<div class="weixin fl">
						<a href="javascript:void(0);" class="vweixinbox"><img src="{{ url('/Home/image/w1.jpg') }}" alt=""></span></a>
						<div class="sao">
							<img src="{{url('/Home/image/weixin.png')}}" alt="">
						</div>
					</div>
					<div class="sinna fl">
						<a href="javascript:void(0);"><img src="{{url('/Home/image/w2.jpg')}}" alt=""></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- 头部欢迎注册登录结束 -->
		<!-- 头部搜索模块开始 -->
		<div class="search">
			<div class="searchl"></div>
			<div class="searchr">
				<div class="up">
						<input type="text" class="searchTxt" name="searchTxt" placeholder="搜“衬衫”，体验与众不同">
						<input type="button" class="searchBtn sousuoBtn btn" id="btnHeaderSearch">
						<div class="shopingcat">
							<p>
								<a href="#">购物车(<span>0</span>)</a>
							</p>
							<div class="tiao"></div>
							<div class="shopinglist">
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
								<p>没有任何商品购买</p>
							</div>
						</div>
						
				</div>
				<div class="ub">
					<p>热门搜索
						<a href="#">熊本熊</a>
						<a href="#">卫衣</a>
						<a href="#">免烫衬衫</a>
						<a href="#">C9</a>
						<a href="#">牛津纺外套</a>
						<a href="#">针织衫</a>
						<a href="#">袜品</a>
					</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>	
		<!-- 头部搜索模块结束 -->
		<!-- 头部菜单结束 -->
		<style>
			#listr_fr
			{
				width:1100px;
				position: absolute;
				margin-left:15%;
			}
		</style>
		<div class="list wc" id="header">
			<div class="listl fl">
				<a href="#"><img src="{{url('/Home/image/logo18546.png')}}" alt=""></a>
			</div>
			@verbatim
			<div class="listr fr" id="listr_fr">
				<ul>
					<li id="lione"><a href="#">{{message.li1}}</a></li>
					<li><a href="#">{{message.li2}}</a>
						<div>
							<a href="">{{message.li3}}</a>
							<a href="">{{message.li4}}</a>
							<a href="">{{message.li5}}</a>
							<a href="">{{message.li6}}</a>
						</div>
					</li>
					<li><a href="#">{{message.li7}}</a>
						<div>
							<a href="">{{message.li8}}</a>
							<a href="">{{message.li9}}</a>
							<a href="">{{message.li10}}</a>
							<a href="">{{message.li11}}</a>
						</div>
					</li>
					<li><a href="#">{{message.li0}}</a></li>
					<li><a href="#">{{message.li12}}</a></li>
					<li><a href="#">{{message.li13}}</a></li>
					<li><a href="#">{{message.li14}}</a></li>
					<li><a href="#">{{message.li15}}</a></li>
					<li><a href="#">{{message.li16}}</a></li>
					<li><a href="#">{{message.li17}}</a>
						<div>
							<a href="">{{message.li19}}</a>
							<a href="">{{message.li20}}</a>
							<a href="">{{message.li21}}</a>
							<a href="">{{message.li22}}</a>
						</div>
					</li>
					
					<div class="clear"></div>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		@endverbatim
		<!-- 头部菜单结束 -->
	</div>
	<!-- 头部结束 -->
	<!-- 首页内容开始 -->
	<div class="lunbo wc">
		<!-- <marquee behavior="alternate" direction="left" truespeed scrolldelay="5"> -->
		<div class="nei">
		<ul>
			<li><a href=""><img src="{{url('/Home/image/sjg.jpg')}}" alt=""></a></li>
			<li><a href=""><img src="{{url('/Home/image/sjg.jpg')}}" alt=""></a></li>
			<li><a href=""><img src="{{url('/Home/image/sjg.jpg')}}" alt=""></a></li>
			<li><a href=""><img src="{{url('/Home/image/sjg.jpg')}}" alt=""></a></li>
		</ul>
		</div>
		<!-- </marquee> -->
	</div>
	<div class="add wc"><a href="#"><img src="{{url('/Home/image/czt.jpg')}}" alt=""></a></div>
	<div class="wc"><img src="{{url('/Home/image/123_01.jpg')}}" alt=""></div> 
	<!-- ######################################商品渲染##################################### -->	
	<div class="ngs wc col-md-12" id="panelBody" style="height:400px;" >
			<div id="shop" class="col-md-3">
				<div class="thumbnail">
					<a href="#">
						<img src="/Home/image/6375344-1j201710181702562128.jpg" alt="暂无商品信息" title="购买">
					</a>
				<div class="caption">	
					<p><span style="color:orange;">商品详情</span></p>
					<p><i>￥125</i><a href="#">点击 查看</a></p>
				</div>
			</div>
			</div>
			<div id="shop" class="col-md-3">
				<div class="thumbnail">
					<a href="#">
						<img src="/Home/image/6375344-1j201710181702562128.jpg" alt="暂无商品信息" title="购买">
					</a>
				<div class="caption">	
					<p><span style="color:orange;">商品详情</span></p>
					<p><i>￥125</i><a href="#">点击 查看</a></p>
				</div>
			</div>
			</div>
			<div id="shop" class="col-md-3">
				<div class="thumbnail">
					<a href="#">
						<img src="/Home/image/6375344-1j201710181702562128.jpg" alt="暂无商品信息" title="购买">
					</a>
				<div class="caption">	
					<p><span style="color:orange;">商品详情</span></p>
					<p><i>￥125</i><a href="#">点击 查看</a></p>
				</div>
			</div>
			</div>
			<div id="shop" class="col-md-3">
				<div class="thumbnail">
					<a href="#">
						<img src="/Home/image/6375344-1j201710181702562128.jpg" alt="暂无商品信息" title="购买">
					</a>
				<div class="caption">	
					<p><span style="color:orange;">商品详情</span></p>
					<p><i>￥125</i><a href="#">点击 查看</a></p>
				</div>
			</div>
			</div>
			<div id="load"style="text-align: center; width:100%"></div>
	</div>
		
	<!-- #######################################分割线##################################### -->
	
	<div class="pic_type wc" style="margin-top:1024px"></div>
	<!-- #######################################分割线##################################### -->
	<div class="wc"  style="height:32px;background: #fff;border:1px solid red;">
		<p id="stop_show" style="text-align: center;font-size:20px;">12312</p>
	</div>
	<!-- 首页内容结束 -->
	<!-- 关于我们开始 -->
	<div class="aboutare">
		<div class="about">
			<ul>
				<li>
					<div>
						<p class="p1"><img src="{{url('/Home/image/onlinecustomer.png')}}" alt="客服"></p>
						<p class="p2"> 7X9小时在线客服</p>
					</div>
				</li>
				<li>
					<p class="p3"><img src="{{url('/Home/image/seven.png')}}" alt=""></p>
					<p class="p4">7天内退换货</p>
					<p class="p4">购物满199元免邮费</p>
				</li>
				<li>
					<p class="p5"><img src="{{url('/Home/image/2014_8_29_16_39_33_7709.jpg')}}" alt=""></p>
					<p class="p6">扫码下载凡客客户端</p>
				</li>
				<div class="clear"></div>
			</ul>
			
		</div>
		<div >
			@verbatim
				<div class="links" id="links">
					<ul v-for="Info in link_ul">
						<li><a href="">{{ Info }}</a></li>
					</ul>
				</div>
			@endverbatim
		</div>
	</div>
	<div style="clear:both;"></div>
	<!-- 关于我们结束 -->
	<!-- frend-link start-->
	<div class="youlian wc">
		<div class="youlian_main" id="youlian_main">
		<p class="fl">友情链接:</p>
		@verbatim
		<ul class="fl" v-for="v in li">
			<li><a href="">{{ v }}</a></li>
			<div style="clear:both;"></div>
		</ul>
		@endverbatim
		<div style="clear:both;"></div>
		</div>
	</div>
	<!-- frend  link  end-->
	<hr width="100%" size="1" color="black" style="margin-top:25px;">
	<!-- 脚步开始 -->
	<div class="foot">
		<div class="footBottomTab">
			<p> Copyright 2018 - 2018 vancl.com All Rights Reserved 京ICP证100557号   京公网安备11011502002400号 出版物经营许可证新出发京批字第直110138号</p>
			<p>凡客诚品（北京）科技有限公司</p>
		</div>
		<div class="frend">
			<div class="main">
				<a href="" class="tu1"></a>
				<a href="" class="tu2"></a>
				<a href="" class="tu3"></a>
				<a href="" class="tu4"></a>
				<a href="" class="tu5"></a>
			</div>	
		</div>
	</div>
	<!-- 脚步结束 -->
</body>
</html>
</body>
<script>
	//导航栏渲染
	let listr_fr=new Vue({
		el:"#listr_fr",
		data:
		{
			message:
			{
				li1:'首页',
					li2:'衬衫',
				li3:'订制',
				li4:'免烫',
				li5:'高支',
				li6:'休闲',
					li7:'外套',
				li8:'西服',
				li9:'夹克',
				li10:'大衣',
				li11:'羽绒服',
					li0:'羽绒服',
					li12:'卫衣',
					li13:'针织衫',
					li14:'裤装',
					li15:'鞋',	
					li16:'私人定制',
					li17:'家具配饰',
				li19:'西服',
				li20:'夹克',	
				li21:'大衣',
				li22:'羽绒服'
			}
		}
	});
	//信息栏
	let links=new Vue({
		el:'#links',
		data:
		{
			link_ul:
			{
				one:'关于凡客',
				two:'新手指南',
				three:'配送时间范围',
				four:'售后服务',
				five:'支付方式',
				six:'帮助中心'
			}
		}
	});
	
	//友情链接
	let youlian_main=new Vue({
		el:"#youlian_main",
		data:
		{
			li:
			{
				li0:'前程无忧',
				li1:'前程无忧1',
				li2:'前程无忧2',
				li3:'前程无忧3',
				li4:'前程无忧4',
				li5:'前程无忧5',
				li6:'前程无忧6',
				li7:'更多'
			}	
		}
	});
</script>

<script>
		//商品无限加载
	window.onscroll=function()
	{
		//获取网页的高度
		let height=document.documentElement.scrollHeight;
		//获取滚动条的当前位置
		let scrollTop=document.documentElement.scrollTop;
		//获取当前可见的区域高度
		let canUseScreen=screen.availHeight;
		let nowHeight=document.querySelector('#panelBody');
		let divStyle= nowHeight.getAttribute('style');
		//截取div的高度，转换成Number
		let nowHeights=Number(divStyle.substr(7,3));
		//触发加载高度
		let touchHeight=(scrollTop+600+canUseScreen)+nowHeights;
		console.log(touchHeight,height);
		//触发返回内容
		if(touchHeight > height)
		{
			if(touchHeight<3400)
			{	
				onload();
			}
			if(touchHeight>3100)
			{
				return  document.getElementById('stop_show').innerText="到底了";
			}
		}
		function onload(){
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
						document.getElementById('load').innerHTML= document.getElementById('load').innerHTML + aj.responseText;
					}
				}
				aj.open('GET','',true);
				aj.setRequestHeader('x-requested-with', 'XMLHttpRequest');
				aj.send();
			}
		
	}
	
</script>
</html>