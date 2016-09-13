<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/ucenter.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/basic_info.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				// 点击编辑，编辑个人信息
				$(".edit_b").click(function(){
					$(this).css({display:"none"});
					$(".lastf input").css({display:"block"});
					$(".inputss").find("input").removeAttr("disabled");
					$(".inputss").find("textarea").removeAttr("disabled");
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
						<li class="selected"><a href="{{U('index')}}">基本信息</a></li>
						<li><a href="{{U('changeAwatar')}}">修改头像</a></li>
						<li><a href="{{U('changePass')}}">修改密码</a></li>
						<li><a href="{{U('myOrder')}}">我的宝贝</a></li>
						<li><a href="{{U('myAddress')}}">我的地址</a></li>
					</ul>
					<div class="qcode">
						<img src="./Public/Home/img/qcode.png" alt="">
					</div>
				</div>
				<div class="right_box">
					<h4 class="menu_title">基本信息</h4>
					<div class="basic_info_frame">
						<form method="post" action="{{U('Ucenter/index')}}">
							<ul class="inputss">
								<li><input disabled="false" name="account" type="text" value="{{$_SESSION['account']}}" placeholder="请填写账户名"></li>
								<li><input disabled="false" name="uname" type="text" value="{{$udata['uname']}}" placeholder="请填写真是姓名"></li>
								<li><input disabled="false" name="email" type="text" value="{{$udata['email']}}" placeholder="请填写邮箱"></li>
								<li><input disabled="false" name="phone"  type="text" value="{{$udata['phone']}}" placeholder="请填写手机号"></li>
								<li><input disabled="false" name="fixphone" type="text" value="{{$udata['fixphone']}}" placeholder="请填写固定电话号"></li>
								<li>
									<textarea disabled="false" name="about" id=""  placeholder="请填写个人简介">{{$udata['about']}}</textarea>
								</li>
								<input type="hidden" name="uid" value="{{$udata['uid']}}">
								<li class="lastf"><input class="submit" style="display:none;" type="submit" value="保存"></li>
								<a class="edit_b" href="javascript:;"><i class="icon-edit"></i>编辑</a>
							</ul>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
