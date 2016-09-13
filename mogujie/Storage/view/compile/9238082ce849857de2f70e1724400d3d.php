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
						

					<div class="header_top_frame">
				<div class="header_top">
					<a class="home_link" href="index.php">
						<i class="icon-home"></i>蘑菇街首页</a>
					<ul class="top_menu">
                                        
						<li class="s1 icon-b login_user">
							<a class="menu_name cus" href="">tarqat<i class="icon-angle-down"></i></a>
							<ul>
								<li><a href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Ucenter&a=index">个人中心</a></li>
								<li><a href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Login&a=out">退出</a></li>
							</ul>							
						</li>
                        						<li class="s1 has-line"><a class="menu_name" href=""><i class="icon-list"></i>我的订单</a></li>
						<li class="s1 has-line shoping-car">
							<a class="menu_name" href=""><i class="icon-shopping-cart"></i>购物车</a>
							<div class="shoping_list">
								<ul>
									<!--购物车列表-->
									
									                
									<li class="nogood">
									亲购物车里没有货啊~·
									</li>
									
               									
								</ul>
															</div>
						</li>
						<li class="s1 icon-b custom-help">
							<a class="menu_name cus" href="">客户服务<i class="icon-angle-down"></i></a>
							<ul>
								<li><a href="">联系合作</a></li>
								<li><a href="">帮助</a></li>
							</ul>
						</li>
						<li class="s1 my-store"><a class="menu_name" href=""><span>小店</span>我的小店</a></li>
					</ul>
				</div>
			</div>
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
								<span class='shi'><?php echo $ddh?></span>
							<span class="for_pay">
								<span>交易总额</span>
								<span class="real_mon">¥ <?php echo $all_price?></span>
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
				<div class="footer">	
			<div class="footer_frame">
				<div class="footer_oz">
					<div class="footer_links">
						<a href="">蘑菇街</a> | <a href="">加入开放平台</a> © 2016 Mogujie.com,All Rights Reserved.
					</div>
					<div class="footer_icons">
					<a class="vs" href=""></a>
					<a class="mc" href=""></a>
					<a class="up" href=""></a>
					<a class="pa" href=""></a>
					<a class="kx" href=""></a>
					<a class="pc" href=""></a>
					</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
