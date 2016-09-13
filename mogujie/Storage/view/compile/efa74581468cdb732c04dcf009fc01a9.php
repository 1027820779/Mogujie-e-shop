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
		<script type="text/javascript" src="./Public/Home/area.js"></script>
		<script type="text/javascript">
			$(function(){
				//初始化方法
				area.init('area');
				//修改的时候默认被选中效果
				area.selected('新疆','乌鲁木齐','天山区');

				// 添加收货地址
				$(".confirm_addres").click(function(){
					// 组合地址
					var pca=$("select[name='province']").val()+$("select[name='city']").val()+$("select[name='area']").val();
					// 邮政编码
					var postcode=$("input[name='postcode']").val();
					if(postcode==""){
						alert("邮政编码不能为空");
						return;
					}
					// 街道地址
					var street=$("textarea[name='street']").val();
					if(street.length<5){
						alert("街道地址最少5个字");
						return;
					}
					// 收货人姓名
					var receipt_name=$("input[name='receipt_name']").val();
					if(receipt_name==""){
						alert("收货人名称不能为空");
						return;
					}
					// 手机
					var phone_num=$("input[name='phone_num']").val();
					if(phone_num==""){
						alert("手机号不能为空");
						return;
					}

					// 用ajax提交
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Cart&a=addAdr",
                        data:{pca:pca,postcode:postcode,street:street,receipt_name:receipt_name,phone_num:phone_num},
                        dataType:"json",
                        success:function(re){
                        	$('.addres_frame').css({display:"none"});
                    		window.location.reload();
                        }
                    });
				});

				// 当点击添加显示添加地址框
				$('.add_add').click(function(){
					$('.addres_frame').css({display:"block"});
				});

				// 点击取消按钮
				$(".cancel").click(function(){
					$('.addres_frame').css({display:"none"});
				});

				// 选择地址
				$(".select_add li a").click(function(){
					$(this).css({backgroundPosition:"0 0"});
					$(this).parent('li').siblings('li').find('a').css({backgroundPosition:"-240px 0"});
					$("input[name='add_id']").val($(this).find('input').val());
				});

				// 确认并付款
				$(".sub_btn").click(function(){
					// 地址id
					var add_id=$("input[name='add_id']").val();
					if(add_id==''){
						alert("请选择地址");
						return;
					}
					// 备注
					var description=$("input[name='description']").val();
					// 用ajax提交
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Cart&a=addOrder",
                        data:{add_id:add_id,description:description},
                        dataType:"json",
                        success:function(re){
                        	location.href="index.php?m=home&c=cart&a=paymoney&ddh="+re;
                        }
                    });

				});



			})
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

						<!-- 地址卡 -->
						<div style="display:block" class="cart_address_wrap">
							<ul class="select_add">
							<?php foreach ($adds as $v){?>
								<li>
									<a>
										<input type="hidden" value="<?php echo $v['adid']?>">
										<h5><?php echo $v['receipt_name']?></h5>
										<p class="a_street"><?php echo $v['street_add']?></p>
										<p class="a_s_info"><?php echo $v['pca']?> <?php echo $v['postcode']?></p>
										<p><?php echo $v['phone_number']?></p>
										<i class='edit_b'>编辑</i>
									</a>
								</li>
							<?php }?>
							<input name="add_id" type="hidden" value="">
							</ul>
						</div>

						<p class="addd_d">
							<span class='add_add'><i class='icon-plus-sign-alt'></i> 添加新地址</span>
						</p>

						<div style="display:none"  class="addres_frame">
							<dl class="add_selects">
								<dt>地址：</dt>
								<dd>
									<i>*</i>
									<select class="province" name="province" id="area1"></select>&nbsp;
									<select class="city" name="city" id="area2"></select>&nbsp;
									<select class="area" name="area" id="area3"></select>			
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>邮政编码：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="postcode" id="" value="" />
								</dd>
							</dl>	
							<dl class="add_selects">
								<dt>街道地址：</dt>
								<dd>
									<i>*</i>	
									<textarea name="street" rows="3" cols="30"></textarea>
									<span class="fonts">请填写街道地址，最少5个字，最多不能超过100个字</span>
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>收货人姓名：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="receipt_name" id="" value="" />
								</dd>
							</dl>
							<dl class="add_selects">
								<dt>手机：</dt>
								<dd>
									<i>*</i>	
									<input type="text" name="phone_num" id="" value="" />
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
										<p class="cart_new_price"><?php echo $v['price']?></p>
									</td>
									<td class="all_sun">
										<input type="text" disabled="disabled" value="<?php echo $v['num']?>" />
									</td>
									<td class="true_price">
										<p><?php echo $v['total']?></p>
									</td>
								</tr>
								<?php }?>
								
							</table>
							<!-- 备注 -->
							<p class="description">备注:&nbsp; <input name="description" type="text" placeholder="补充填写其他信息，如有快递不到也请留言备注"/></p>
						</div>
					</div>
					<div style="display:block;" class="cartpaybar">
						<div class="cartpay_vmbox">
							<a href="<?php echo U('Cart/index')?>">返回购物车</a>
						</div>
						<a class="sub_btn" href="javascript:;" style="background:#FDA629;">确认并付款<i class="icon-angle-right"></i></a>
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
