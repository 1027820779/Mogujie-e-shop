<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>我的购物车</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/shoppingcart.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
		$(function(){
			// 商品数量
			// 减一个
			$('.minus').click(function(){
				var san=$(this).siblings('.san').val();
				// 总数
				var all_san=parseInt($(this).siblings('.stock').val());
				// 单个价格
				var p=parseInt($(this).parents('.all_sun').siblings('.cart_alcenter').find('.cart_new_price').html());
				// 小计
				var ap=parseInt($(this).parents('.all_sun').siblings('.true_price').find('p').html());

				if(san>1){
					san--;
					$(this).siblings('.san').val(san);
					// 按照个数算出小计
					$(this).parents('.all_sun').siblings('.true_price').find('p').html(p*san);
				}
			});
			// 加一个
			$('.plus').click(function(){
				var san=$(this).siblings('.san').val();
				// 单个总数
				var all_san=parseInt($(this).siblings('.stock').val());
				// 单个价格
				var p=parseInt($(this).parents('.all_sun').siblings('.cart_alcenter').find('.cart_new_price').html());
				// 小计
				var ap=parseInt($(this).parents('.all_sun').siblings('.true_price').find('p').html());
				// 商品总数
				var tg=$('.cartslide li a span').html();
				// 总价格
				var for_ap=parseInt($('.all_pay_price span').html());
				if(all_san>san){
					san++;
					$(this).siblings('.san').val(san);
					// 总数加起来
					tg++;
					$('.cartslide li a span').html(tg);
					$('.cart_all_money_info span').html(tg);
					// 按照个数算出小计
					$(this).parents('.all_sun').siblings('.true_price').find('p').html(p*san);
					// 合计
					$('.all_pay_price span').html(for_ap+p);

					// 用ajax更新购物车
					var id=$(this).siblings('.id').val();
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Cart&a=updateCart",
                        data:{id:id,num:san},
                        dataType:"json",
                        success:function(re){
                        }
                    });



				}
			});

			// 去付款
			$(".sub_btn").click(function(){
				var login=$(this).attr('login');
				// 判断是否登录
				if(login=="true"){
					// 调到订单页面
					location.href="index.php?c=Cart&a=confirm";
				}else{
					var r=confirm("你还没有登录，你要登录吗");
					if(r==true){
						// 调到登录页面
						location.href="index.php?c=Login&a=index";
					}else{
						// alert("");
					}
				}
			});

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
									                
																		<li>
										<a class="shop_img" href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Content&a=index&gid=81"><img src="Upload/Content/16/02/6091455532039.jpg" width="40" height="40" alt="" /></a>
										<a class="shoping_name" href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Content&a=index&gid=81">春季男生帆布鞋旅行休闲鞋</a>
										<span class="shoping_price">¥300</span>
										<span class="shoping_info">颜色：蓝 尺码：39</span>
									</li>
																		
               
																		
								</ul>
								                
								<div class="subbox">
									<a class="caring" href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Cart&a=index">查看购物车</a>
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

					<ul <?php if(!empty($cartg)){?>
                 style="display:block;" <?php }else{?> style="display:none;"  
               <?php }?> class="cartslide">
						<li><a href="javascript:;">全部商品 (<span><?php echo $nums?></span>)</a></li>
					</ul>
					<div <?php if(!empty($cartg)){?>
                 style="display:block;" <?php }else{?> style="display:none;"  
               <?php }?> class="cart_nobtm">
						<div class="cart_page_wrap">
							<table class="cart_table">
								<tr>
									<th class="th_2">商品</th>
									<th class="th_3">商品信息</th>
									<th class="th_4">单价(元)</th>
									<th class="th_5">数量</th>
									<th class="th_6">小计(元)</th>
									<th class="th_7">操作</th>
								</tr>
								
							<?php foreach ($cartg as $k=>$v){?>
								<tr>
									<td class="cart_table_goods_wrap">
										<a class="cart_goods_img" href="<?php echo U('Content/index',array('gid'=>$v['id']))?>"><img width="78" height="78" src="<?php echo $v['imgs']?>" alt="" /></a>
										<a class="cart_goods_ti" href="<?php echo U('Content/index',array('gid'=>$v['id']))?>"><?php echo $v['name']?></a>
									</td>
									<td class="cart_info_size">
										<p>颜色：<?php echo $v['options']['color']?></p>
										<p>尺码：<?php echo $v['options']['size']?></p>
									</td>
									<td class="cart_alcenter">
										<p class="cart_old_price"><?php echo $v['oldprice']?></p>
										<p class="cart_new_price"><?php echo $v['price']?></p>
										<p class="cart_info">促销7.0折</p>
									</td>
									<td class="all_sun">
										<div class="num_adder">
											<input type="hidden" class="stock" value="<?php echo $v['s_num']?>">
											<span class="minus"><i class="icon-minus"></i></span>
											<input class="san" type="text" disabled="disabled" value="<?php echo $v['num']?>" />
											<span class="plus"><i class="icon-plus"></i></span>
											<input type="hidden" class="id" value="<?php echo $k?>">
										</div>
									</td>
									<td class="true_price">
										<p><?php echo $v['total']?></p>
									</td>
									<td class="delete_a">
										<a href="javascript:if(confirm('确认删除吗?')) location.href='<?php echo U('Cart/delCart',array('key'=>$k))?>';">删除</a>
									</td>
								</tr>
								<?php }?>


							</table>
						</div>
					</div>
					<div <?php if(empty($cartg)){?>
                 style="display:block;" <?php }else{?> style="display:none;"  
               <?php }?> class="cart_empty">
						<i class="icon-shopping-cart"></i>
						<h5>您的购物车还是空的，赶快去挑选商品吧！</h5>
						<ul>
							<li>去看看大家都喜欢的<a href="index.php">潮流单品</a></li>
							<li>去看看正在折扣中的优品<a href="index.php">团购</a></li>
						</ul>
					</div>
					<div <?php if(!empty($cartg)){?>
                 style="display:block;" <?php }else{?> style="display:none;"  
               <?php }?> class="cartpaybar">
						<div class="cartpay_vmbox">
							<a href="javascript:if(confirm('确认全清空吗吗?')) location.href='<?php echo U('Cart/delAll')?>';">全部清空</a>
						</div>
						<a class="sub_btn" href="javascript:;" <?php if(isset($_SESSION['uid'])){?>
                 login="true" style="background:#ff4466;" <?php }else{?> style="background:#d8d8d8;" login="false" 
               <?php }?>>去结算<i class="icon-angle-right"></i></a>
						<span class="all_pay_price">¥ <span><?php echo $all_m?></span></span>
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
