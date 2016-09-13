<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街收银台</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/paymoney.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
        <script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>

		<script type="text/javascript">
			$(function(){

				// 订单取消到时函数
				function time_run(){
					var h=parseInt($('.shi').html());
					var m=parseInt($('.fen').html());
					var s=parseInt($('.miao').html());
					s--;
					if(s==-1){
						m--;
						$('.fen').html(m);
						$('.miao').html(59);
						s=59;
					}

					if(s<10){
						s='0'+s;
					}
					$('.miao').html(s);

				}
				// 订单取消到时启动器
			    var time_timer=setInterval(time_run,1000);

			    // 选择付款方式
			    $(".se_payfang").click(function(){
			    	$(this).css({borderColor:"#FF4466"}).siblings("li").css({borderColor:"#ececec"});
			    	$(".paypaswsword").animate({marginRight:'20px'}).attr("select",'true');
			    });

			    // 判断是否选择支付方式，填支付密码
			    $(".sub_btn").click(function(){
			    	if($(".paypaswsword").attr("select")=="false"){
			    		alert("请选择付款方式");
			    		return;
			    	}
			    	if($(".paypaswsword").val()==''){
			    		alert("请输入支付密码");
			    		return;
			    	}
					// 订单号
					var ddh=$("input[name='ddh']").val();
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Cart&a=paysuccess",
                        data:{ddh:ddh},
                        dataType:"json",
                        success:function(re){
                        	location.href="index.php?m=home&c=cart&a=paysuc&ddh="+re;
                        }
                    });
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
					<ul style="display:block;" class="cartslide">
						<li>
							<span class="iconok">
								<span class="suc"><i class="icon-ok"></i></span>订单提交成功，请您于
								<span class="alert_suc">
								<span class='shi'>23</span>时<span class='fen'>59</span>分<span class='miao'>59</span>秒</span>内完成支付 
								<span class="by_calcel">(逾期订单将被取消)</span></span>
							<span class="for_pay">
								<span>应付金额：</span>
								<span class="real_mon">¥ {{$all_price}}</span>
							</span>
						</li>
					</ul>
					<div style="display:block;" class="cart_nobtm">
						<div class="cart_page_wrap">
							<table class="cart_table">
								<tr>
									<th class="th_2">支付方式
										<span>支持微信支付、支付宝、银联支付等多种支付方式</span>
									</th>
								</tr>
								<tr>
									<th class="pay_link">
										<ul>
											<li class="se_payfang"><img  src="./Public/Home/img/pay_link1.jpg" alt="" /></li>
											<li class="se_payfang"><img src="./Public/Home/img/pay_link2.jpg" alt="" /></li>
											<li class="se_payfang"><img src="./Public/Home/img/pay_link3.png" alt="" /></li>
										</ul>
										<input type="text" name="paypaswsword" class="paypaswsword" select="false" placeholder='请输入支付密码~'>
									</th>
								</tr>
							</table>
						</div>
					</div>

					<div  style="display:block;" class="cartpaybar">
					<input type="hidden" name="ddh" value="{{$ddh}}">
						<a class="sub_btn" href="javascript:;" style="background:#ff4466;" >确认付款</a>
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		{{include file="VIEW_PATH/Common/cart_footer.php"}}
		
		
	</body>
</html>
