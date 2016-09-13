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

					<ul {{if value="!empty($cartg)"}} style="display:block;" {{else}} style="display:none;"  {{endif}} class="cartslide">
						<li><a href="javascript:;">全部商品 (<span>{{$nums}}</span>)</a></li>
					</ul>
					<div {{if value="!empty($cartg)"}} style="display:block;" {{else}} style="display:none;"  {{endif}} class="cart_nobtm">
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
								
							{{foreach from="$cartg" key="$k" value="$v"}}
								<tr>
									<td class="cart_table_goods_wrap">
										<a class="cart_goods_img" href="{{U('Content/index',array('gid'=>$v['id']))}}"><img width="78" height="78" src="{{$v['imgs']}}" alt="" /></a>
										<a class="cart_goods_ti" href="{{U('Content/index',array('gid'=>$v['id']))}}">{{$v['name']}}</a>
									</td>
									<td class="cart_info_size">
										<p>颜色：{{$v['options']['color']}}</p>
										<p>尺码：{{$v['options']['size']}}</p>
									</td>
									<td class="cart_alcenter">
										<p class="cart_old_price">{{$v['oldprice']}}</p>
										<p class="cart_new_price">{{$v['price']}}</p>
										<p class="cart_info">促销7.0折</p>
									</td>
									<td class="all_sun">
										<div class="num_adder">
											<input type="hidden" class="stock" value="{{$v['s_num']}}">
											<span class="minus"><i class="icon-minus"></i></span>
											<input class="san" type="text" disabled="disabled" value="{{$v['num']}}" />
											<span class="plus"><i class="icon-plus"></i></span>
											<input type="hidden" class="id" value="{{$k}}">
										</div>
									</td>
									<td class="true_price">
										<p>{{$v['total']}}</p>
									</td>
									<td class="delete_a">
										<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('Cart/delCart',array('key'=>$k))}}';">删除</a>
									</td>
								</tr>
								{{endforeach}}


							</table>
						</div>
					</div>
					<div {{if value="empty($cartg)"}} style="display:block;" {{else}} style="display:none;"  {{endif}} class="cart_empty">
						<i class="icon-shopping-cart"></i>
						<h5>您的购物车还是空的，赶快去挑选商品吧！</h5>
						<ul>
							<li>去看看大家都喜欢的<a href="index.php">潮流单品</a></li>
							<li>去看看正在折扣中的优品<a href="index.php">团购</a></li>
						</ul>
					</div>
					<div {{if value="!empty($cartg)"}} style="display:block;" {{else}} style="display:none;"  {{endif}} class="cartpaybar">
						<div class="cartpay_vmbox">
							<a href="javascript:if(confirm('确认全清空吗吗?')) location.href='{{U('Cart/delAll')}}';">全部清空</a>
						</div>
						<a class="sub_btn" href="javascript:;" {{if value="isset($_SESSION['uid'])"}} login="true" style="background:#ff4466;" {{else}} style="background:#d8d8d8;" login="false" {{endif}}>去结算<i class="icon-angle-right"></i></a>
						<span class="all_pay_price">¥ <span>{{$all_m}}</span></span>
						<div class="cart_all_money_info">
							共有 <span>{{$nums}}</span> 件商品，总计：
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		{{include file="VIEW_PATH/Common/cart_footer.php"}}
		
		
	</body>
</html>
