<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/ucenter.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/changeAwatar.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				// 点击预览头像图
				$(".awatars_box li").click(function(){
					$(this).find("img").attr("id","selectedimg").parent().siblings("li").children("img").removeAttr("id");
					var src=$(this).find("img").attr("src");
					$(".demo_awatar").attr("src",src);
					$(".check_awatar").css({background:"#ff4466",cursor:"pointer"}).attr("check","true");
				});
				// 用异步改ajax头像
				$(".check_awatar").click(function(){
					if($(this).attr("check")=="false"){
						return false;
					}else{
						var src=$(".demo_awatar").attr("src");
						//用一部改头像地址 
	                  $.ajax({
	                        type:"post",
	                        url:"{{U('Ucenter/change')}}",
	                        data:{src:src},
	                        // dataType:"json",
	                        success:function(re){
	                        	// 表中该数据成功后页面上也改
	                        	$(".aw").attr("src",src);
	                        	$(".check_awatar").attr("check","false").css({background:"#cecece",cursor:"noDrop"});
	                        }
	                    });
					}
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
						<a href="">
							{{if value="empty($udata['awatar'])"}}
								<img src="./Public/Home/img/awatar1.jpg" class="aw" alt="">
							{{else}}
								<img  src="{{$udata['awatar']}}" class="aw"/>
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
						<li class="selected"><a href="{{U('changeAwatar')}}">修改头像</a></li>
						<li><a href="{{U('changePass')}}">修改密码</a></li>
						<li><a href="{{U('myOrder')}}">我的宝贝</a></li>
						<li><a href="{{U('myAddress')}}">我的地址</a></li>
					</ul>
					<div class="qcode">
						<img src="./Public/Home/img/qcode.png" alt="">
					</div>
				</div>
				<div class="right_box">
					<h4 class="menu_title">修改头像</h4>
					<div class="change_awatar_frame">
						<ul class="awatars_box">
							<li><img src="./Public/Home/img/awatar1.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar2.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar3.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar4.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar5.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar6.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar7.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar8.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar9.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar10.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar11.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar12.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar13.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar14.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar15.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar16.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar17.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar18.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar19.jpg" alt=""></li>
							<li><img src="./Public/Home/img/awatar20.jpg" alt=""></li>
						</ul>
						<div class="left_selectd_img">
							<p class="ttt">预览头像</p>
							{{if value="empty($udata['awatar'])"}}
								<img src="./Public/Home/img/awatar1.jpg" class="demo_awatar" alt="">
							{{else}}
								<img  src="{{$udata['awatar']}}" class="demo_awatar"/>
							{{endif}}
							<a href="javascript:;" class="check_awatar">保存</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
