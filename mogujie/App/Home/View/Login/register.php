<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>注册_蘑菇街</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/register.css" />
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
		{{include file="VIEW_PATH/Common/user_header.php"}}
		<!--导航栏，二级菜单-->
		<div class="body">
			
			<!--导航条-->
			<div class="login_box_frame">
				<div class="login_box">
					<div class="lg_banner">
						<a href=""><img src="./Public/Home/img/lg_banner.jpg" alt="" /></a>
					</div>
					<div class="lg_lfet">
						<div class="lg_mod_tab">
							<div class="fl_mod"><a href="">新用户注册</a></div>
						</div>
						<div class="error_tip"><span>-</span>请输入正确手机号</div>
                        <form method="post" action="" onsubmit="return mzy_validate(this,'','error_input')">
						<div class="lg_form">
								<div class="mod_box">
									<div class="reg_name focus">
										<input type="text" name="account" placeholder="用户名" rule="required|minlen:6" msg="用户名不能为空|用户名不能少于6位" />
									</div>
									<div class="reg_password focus">
										<input type="password" name="password" rule="required|minlen:6" msg="密码不能为空|密码不能少于6为" placeholder="密码" />
									</div>
									<div class="reg_re_password focus">
										<input type="password" name="passwordc" rule="" mag="请确认密码|两次密码不相同" validate="0" placeholder="确认密码" />
									</div>
									<div class="validate_code focus">
										<input type="text" name="code" rule="required" msg="验证码不能为空" placeholder="验证码" />
										<img src="{{U('Login/code')}}" onclick='this.src="{{U('Login/code')}}&ty="+Math.random()' />
									</div>
								</div>
						</div>
						<div class="reg_login_btn">
							<input type="submit" name="" id="" value="注册" />

						</div>
                        </form>
						<div class="reg_agree">
							<label for="">
								<input type="checkbox" name="" id="check" checked="checked" />
								<span> 我已阅读并且同意<a href="">《蘑菇街网络服务使用协议》</a></span>
							</label>
						</div>
						<div class="reg_log">
							<a href="{{U('Login/index')}}">已有账号</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--footer-->
		{{include file="VIEW_PATH/Common/user_footer.php"}}
		
		
	</body>
</html>
