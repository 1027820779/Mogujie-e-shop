<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>登录_蘑菇街</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/login.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
        <!-- 输入验证js -->
        <link rel="stylesheet" type="text/css" href="./Public/Home/js/validate/mzyValidate.css"/>
        <script src="./Public/Home/js/validate/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="./Public/Home/js/validate/mzyValidate.js" type="text/javascript" charset="utf-8"></script>
        <!-- 自定义错误提示样式 -->
        <style type="text/css">
            .lg_form .error_input{
                border-color:#ff5783;
            }
            .focused{
                border-color: #ccc;
            }
            }
        </style>
        <script type="text/javascript">
            $(function(){
                $('.focus input').focus(function(){
                    $(this).attr("class","focused");
                });
            })
        </script>
    </head>
	<body>
		<!--头部-->
				<div class="header">
			<!--登录-->
			<div class="header_top_frame">
				<div class="header_top">
					<div class="logo">
						<a href="index.php">
							<img src="./Public/Home/img/logo_link.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--导航栏，二级菜单-->
		<div class="body">
			
			<!--导航条-->
			<div class="login_box_frame">
				<div class="login_box">
					<div class="lg_banner">
						<a href=""><img src="./Public/Home/img/lg_banner.jpg" alt="" /></a>
					</div>
					<div class="lg_lfet">
                        <form method="post" action="" onsubmit="return mzy_validate(this,'','error_input')">
						<div class="lg_mod_tab">
							<div class="fl_mod"><a href="">普通登录</a></div>
						</div>
						<div class="error_tip"><span>-</span>登录名或密码错误</div>
						<div class="lg_form">
								<div class="mod_box">
									<div class="lg_name  focus">
										<input type="text" name="account" placeholder="昵称/邮箱/手机号" rule="required" msg="请输入用户名" />
									</div>
									<div class="lg_password  focus">
										<input type="password" name="password" placeholder="密码" rule="required" msg="请输入密码" />
									</div>
								</div>
						</div>
						<div class="lg_remenber">
							<label for="">
								<input  type="checkbox" name="" id="check" checked="checked" />
								<span> 2周内自动登录</span>
							</label>
							<a href="">忘记密码?</a>
						</div>
						<div class="lg_login_btn">
							<input type="submit" name="" id="" value="登录" />
						</div>
						<div class="lg_reg">
							<a href="<?php echo U('Login/register')?>">新用户注册</a>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</div>

		<!--footer-->
				<div class="footer">	
			<div class="footer_frame">
				<div class="footer_oz">
				<div class="footer_wrap">
					<div class="foot_link">
						<dl class="link_company l_fe">
							<dt>新手帮助</dt>
							<dd><a href="">如何购买</a></dd>
							<dd><a href="">支付教程</a></dd>
							<dd><a href="">优惠券使用</a></dd>
							<dd><a href="">常见问题</a></dd>
						</dl>
						<dl class="link_company">
							<dt>权益保障</dt>
							<dd><a href="">全国包邮</a></dd>
							<dd><a href="">7天无理由退货</a></dd>
							<dd><a href="">退货运费补贴</a></dd>
							<dd><a href="">72小时发货</a></dd>
						</dl>
						<dl class="link_company">
							<dt>商家</dt>
							<dd><a href="">免费开店</a></dd>
							<dd><a href="">商家社区</a></dd>
							<dd><a href="">商家入驻</a></dd>
							<dd><a href="">管理后台</a></dd>
						</dl>
						<dl class="link_safe">
							<dt>蘑菇街移动客户端</dt>
							<a class="" href=""></a>
						</dl>
					</div>
				</div>
				
				<div class="footer_links">©Copyright 2010-2016 蘑菇街 Mogujie.com (增值电信业务经营许可证：浙B2-20110349)</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
