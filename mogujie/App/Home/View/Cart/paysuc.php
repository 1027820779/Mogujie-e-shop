<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街收银台</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/paysuc.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
        <script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
	</head>
	<body>
		<!--头部-->
		<div class="header">
			<!--购物车，登录，注册-->
			{{include file="VIEW_PATH/Common/top_header.php"}}
			<!--logo,搜索-->
			<div class="header_middle_frame">
				<div class="header_middle">
					<a href="index.php" class="logo_link"></a>
					<div class="proces_bar">
						<div class="steps">
							<div class="md_proces_sd"></div>
							<i class="md_proces_m1">1<span>购物车</span></i>
							<i class="md_proces_m2">2<span>确认订单</span></i>
							<i class="md_proces_m3">3<span>支付</span></i>
							<i class="md_proces_m4"><i class="icon-ok"></i><span>完成</span></i>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!--购物车里面产品列表-->
		<div class="body">
			<div class="body_frame">
				<div class="g_wrap">
					<ul style="display:block;" class="cartslide">
						<li>
							<span class="iconok">
								<span class="suc"><i class="icon-ok"></i></span>付款成功，您的订单号为
								<span class="alert_suc">
								<span class='shi'>{{$ddh}}</span>
							<span class="for_pay">
								<span>交易总额</span>
								<span class="real_mon">¥ {{$all_price}}</span>
							</span>
						</li>
					</ul>
					<p class="pp">
						<span><i class='icon-ok'></i></span>
					</p>
					<p class="o_link">
						<a style="padding-right: 50px" href=""><i class='icon-user-md'></i>个人中心</a>
						<a style="padding-left: 50px" href="index.php"><i class='icon-shopping-cart'></i>继续购物</a>
					</p>
				</div>
			</div>
		</div>
		<!--footer-->
		{{include file="VIEW_PATH/Common/cart_footer.php"}}
		
		
	</body>
</html>
