<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/ucenter.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/changePass.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				// 点击编辑，编辑个人信息
				$(".submit").click(function(){
					var password=$("input[name='password']").val();
					var newpassword=$("input[name='newpassword']").val();
					var verifypassword=$("input[name='verifypassword']").val();
					var uid=$("input[name='uid']").val();
					if(password==""){
						alert("请输入原密码");
						return false;
					}
					if(newpassword==""){
						alert("请输入新密码");
						return false;
					}
					if(!/^[a-zA-Z0-9!"\#$%&'()*+,-./:;<=>?@\[\\\]^_`\{\|\}\~]{6,16}$/.test(newpassword)){
						alert("密码是数字，字母，下划组成的长度6位到15位");
						return false;
					}
					if($("input[name='newpassword']").val().length<6){
						alert("密码不能少于六位");
						return false;
					}
					if(verifypassword=="" || newpassword!=verifypassword){
						alert("两次密码不一样");
						return false;
					}
		            //判断密码是否正确
		            $.ajax({
		                type:"post",
		                url:"index.php?c=Ucenter&a=ajaxchangePass",
		                data:{uid:uid,password:password,newpassword:newpassword,verifypassword:verifypassword},
		                //dataType:"json",
		                success:function(result){
			                switch (result) {
			                    case ("buyi"):
			                    	alert("原密码密码不正确");
			                        break;
			                    case ("putti"):
			                    	alert("修改密码成功");
			                    	location.href="index.php?m=Home&c=Login&a=index";
			                        break;
			                    default:
			                }

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
					<div class="search_frame">
						<div class="search_inner_box">
							<div class="selectbox">
								<span>搜索品 <i class="icon-angle-down"></i></span>
								<ul>
									<li><a href="">商品</a></li>
									<li><a href="">店铺</a></li>
								</ul>
							</div>
							<form action="">
								<input class="search_content" type="text" placeholder="超级显胖保暖打底裤" />
								<input type="submit" value="" class="search_btn" />
								<i class="icon-search"></i>
							</form>
						</div>
						<div class="hot_words">
							<a href="">毛呢外套</a>
							<a href="">毛衣</a>
							<a href="">棉服</a>
							<a href="">冬季连衣裙</a>
							<a href="">羽绒服</a>
							<a href="">打底衫</a>
							<a href="">斜挎包</a>
							<a href="">短靴</a>
							<a href="">雪地靴</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<!--导航栏，二级菜单-->
		<div class="body">
			<div class="box_frame">
				<div class="left_box">
					<div class="u_a_box">
						<a href="<?php echo U('changeAwatar')?>">
							<?php if(empty($udata['awatar'])){?>
                
								<img src="./Public/Home/img/awatar1.jpg"  alt="">
							<?php }else{?>
								<img  src="<?php echo $udata['awatar']?>"/>
							
               <?php }?>
						</a>
						<p><?php echo $_SESSION['account']?></p>
						<div class="vv">
							<span>
								<i class="vf">v</i>
								<i class='vn'>2</i>
							</span>
						</div>
					</div>
					<ul>
						<li><a href="<?php echo U('index')?>">基本信息</a></li>
						<li><a href="<?php echo U('changeAwatar')?>">修改头像</a></li>
						<li  class="selected"><a href="<?php echo U('changePass')?>">修改密码</a></li>
						<li><a href="<?php echo U('myOrder')?>">我的宝贝</a></li>
						<li><a href="<?php echo U('myAddress')?>">我的地址</a></li>
					</ul>
					<div class="qcode">
						<img src="./Public/Home/img/qcode.png" alt="">
					</div>
				</div>
				<div class="right_box">
					<h4 class="menu_title">修改密码</h4>
					<div class="change_password_frame">
							<ul class="inputss">
								<li><input  name="password" type="password"  placeholder="请输入原密码"></li>
								<li><input  name="newpassword" type="password"  placeholder="请输入新密码"></li>
								<li><input  name="verifypassword" type="password"  placeholder="请确认新密码"></li>
								<input type="hidden" name="uid" value="<?php echo $udata['uid']?>">
								<li class="lastf"><a href="javascript:;" class="submit">保存</a></li>
							</ul>
						

					</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    		<div class="footer">	
			<div class="footer_frame">
				<div class="footer_oz">
				<div class="footer_wrap">
					<div class="foot_info">
						<a href=""></a>
						<div class="info_text">
							<p>营业执照注册号：330106000129004</p>
							<p>增值电信业务经营许可证：浙B2-20110349</p>
							<p>ICP备案号：浙ICP备10044327号-3</p>
							<p>©2016 Mogujie.com 杭州卷瓜网络有限公司</p>
						</div>
					</div>
					<div class="foot_link">
						<dl class="link_company">
							<dt>公司</dt>
							<dd><a href="">关于我们</a></dd>
							<dd><a href="">招聘信息</a></dd>
							<dd><a href="">联系我们</a></dd>
						</dl>
						<dl class="link_company">
							<dt>消费者</dt>
							<dd><a href="">帮助中心</a></dd>
							<dd><a href="">意见反馈</a></dd>
							<dd><a href="">手机版下载</a></dd>
						</dl>
						<dl class="link_company">
							<dt>商家</dt>
							<dd><a href="">免费开店</a></dd>
							<dd><a href="">商家社区</a></dd>
							<dd><a href="">商家入驻</a></dd>
							<dd><a href="">管理后台</a></dd>
						</dl>
						<dl class="link_safe">
							<dt>权威认证</dt>
							<dd>
								<a class="pc" href=""></a>
								<a class="pa" href=""></a>
								<a class="fol" href=""></a>
							</dd>
						</dl>
					</div>
				</div>
				
				<div class="footer_links">
					<ul>
						<li>友情链接:</li>
						<li><a href="">淘粉吧</a></li>
						<li><a href="">蘑菇街团购网</a></li>
						<li><a href="">蘑菇街女装</a></li>
						<li><a href="">蘑菇街男装</a></li>
						<li><a href="">蘑菇街鞋子</a></li>
						<li><a href="">蘑菇街包包</a></li>
						<li><a href="">蘑菇街家居</a></li>
						<li><a href="">家具网</a></li>
						<li><a href="">时尚品牌网</a></li>
						<li><a href="">装修</a></li>
						<li><a href="">蘑菇街母婴</a></li>
						<li><a href="">衣联网</a></li>
						<li><a href="">播视网视频</a></li>
					</ul>
				</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
