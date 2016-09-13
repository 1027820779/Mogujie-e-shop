<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>确认订单</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/confirmorders.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
		$(function(){

		});
		</script>
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
								<li><a href="">个人中心</a></li>
								<li><a href="http://localhost/houdun/mogujie/index.php?m=Home&c=Login&a=out">退出</a></li>
							</ul>							
						</li>
                        						<li class="s1 has-line"><a class="menu_name" href=""><i class="icon-list"></i>我的订单</a></li>
						<li class="s1 has-line shoping-car">
							<a class="menu_name" href=""><i class="icon-shopping-cart"></i>购物车</a>
							<div class="shoping_list">
								<ul>
									<!--购物车列表-->
									                
																		<li>
										<a class="shop_img" href="http://localhost/houdun/mogujie/index.php?m=Home&c=Content&a=index&gid=52"><img src="Upload/Content/16/01/60011453707381.jpg" width="40" height="40" alt="" /></a>
										<a class="shoping_name" href="http://localhost/houdun/mogujie/index.php?m=Home&c=Content&a=index&gid=52">嘻哈哈风裤子</a>
										<span class="shoping_price">¥100</span>
										<span class="shoping_info">颜色：蓝 尺码：34</span>
									</li>
																		
               
																		
								</ul>
								                
								<div class="subbox">
									<a class="caring" href="http://localhost/houdun/mogujie/index.php?m=Home&c=Cart&a=index">查看购物车</a>
								</div>
								
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
					<a href="index.html" class="logo_link"></a>
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
					<!--选择地址-->
					<div class="add_adress">
						<p class="sele_ad_title">选择收货地址</p>
						<div class="addres_frame">
							<dl class="add_selects">
								<dt>省：</dt>
								<dd>
									<i>*</i>
									<select class="province" name="" id="">
										<option value="" selected="selected">北京</option>
										<option value="">上海</option>
										<option value="">深圳</option>
										<option value="">杭州</option>
										<option value="">武汉</option>
										<option value="">济南</option>
										<option value="">青岛</option>
									</select>
									<label class="dt" for="">市：</label>
									<select class="city" name="" id="">
										<option value="" selected="selected">北京</option>
									</select>
									<label class="dt" for="">区：</label>
									<select class="area" name="" id="">
										<option value="" selected="selected">朝阳区</option>
										<option value="">海淀区</option>
									</select>			
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>邮政编码：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="" id="" value="" />
								</dd>
							</dl>	
							<dl class="add_selects">
								<dt>街道地址：</dt>
								<dd>
									<i>*</i>	
									<textarea name="" rows="3" cols="30"></textarea>
									<span class="fonts">请填写街道地址，最少5个字，最多不能超过100个字</span>
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>收货人姓名：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="" id="" value="" />
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>手机：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="" id="" value="" />
								</dd>
							</dl>
							<dl class="add_selects">
								<dd>
									<a href="javascript:;" class="confirm_addres">确认地址</a>
									<a href="javascript:;" class="cancel">取消</a>
								</dd>
							</dl>							
						</div>
					</div>
					<ul style="display:block;" class="cartslide">
						<li><span>确认商品信息</span></li>
					</ul>
					<div style="display:block;" class="cart_nobtm">
						<div class="cart_page_wrap">
							<table class="cart_table">
								<tr>
									<th class="th_2">商品</th>
									<th class="th_3">商品信息</th>
									<th class="th_4">单价(元)</th>
									<th class="th_5">数量</th>
									<th class="th_6">合计(元)</th>
								</tr>
								
								<tr>
									<td class="cart_table_goods_wrap">
										<a class="cart_goods_img" href=""><img width="78" height="78" src="img/goods_con_pc.jpg" alt="" /></a>
										<a class="cart_goods_ti" href="">保暖毛领男士修身棉衣</a>
									</td>
									<td class="cart_info_size">
										<p>颜色：蓝黑色</p>
										<p>尺码：XL</p>
									</td>
									<td class="cart_alcenter">
										<p class="cart_new_price">118.30</p>
									</td>
									<td class="all_sun">
											<input type="text" value="1" />
									</td>
									<td class="true_price">
										<p>118.30</p>
									</td>
								</tr>

								
							</table>
						</div>
					</div>
					<div style="display:none;" class="cart_empty">
						<i class="icon-shopping-cart"></i>
						<h5>您的购物车还是空的，赶快去挑选商品吧！</h5>
						<ul>
							<li>去看看大家都喜欢的<a href="">潮流单品</a></li>
							<li>去看看正在折扣中的优品<a href="">团购</a></li>
						</ul>
					</div>
					<div style="display:block;" class="cartpaybar">
						<div class="cartpay_vmbox">
							<a href="<?php echo U('Cart/index')?>">返回购物车</a>
						</div>
						<a class="sub_btn" href="paymoney.html" style="background:#FDA629;">确认并付款<i class="icon-angle-right"></i></a>
						<span class="all_pay_price">¥ <?php echo $all_m?></span>
						<div class="cart_all_money_info">
							共有 <span><?php echo $nums?></span> 件商品，总计：
						</div>
					</div>
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
