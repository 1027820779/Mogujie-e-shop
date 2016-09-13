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
	{{include file="VIEW_PATH/Common/header.php"}}

		<!--导航栏，二级菜单-->
		<div class="body">
			<div class="box_frame">
				<div class="left_box">
					<div class="u_a_box">
						<a href="{{U('changeAwatar')}}">
							{{if value="empty($udata['awatar'])"}}
								<img src="./Public/Home/img/awatar1.jpg"  alt="">
							{{else}}
								<img  src="{{$udata['awatar']}}"/>
							{{endif}}
						</a>
						<p>{{$_SESSION['account']}}</p>
						<div class="vv">
							<span>
								<i class="vf">v</i>
								<i class='vn'>2</i>
							</span>
						</div>
					</div>
					<ul>
						<li><a href="{{U('index')}}">基本信息</a></li>
						<li><a href="{{U('changeAwatar')}}">修改头像</a></li>
						<li  class="selected"><a href="{{U('changePass')}}">修改密码</a></li>
						<li><a href="{{U('myOrder')}}">我的宝贝</a></li>
						<li><a href="{{U('myAddress')}}">我的地址</a></li>
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
								<input type="hidden" name="uid" value="{{$udata['uid']}}">
								<li class="lastf"><a href="javascript:;" class="submit">保存</a></li>
							</ul>
						

					</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
