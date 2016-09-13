<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/list.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
	</head>
	<body>
		<!--头部-->
	{{include file="VIEW_PATH/Common/header.php"}}
			
		</div>
		<!--筛选懒，列表-->
		<div class="body">
			<div class="body_frame">
			<!-- 导航条 -->
				{{include file="VIEW_PATH/Common/nav.php"}}
				
				<div class="tab_pic">
					<img src="./Public/Home/img/tab_pic.jpg" width="1200" alt="" />
				</div>
				<div class="common_goods_box">
					<h3 class="sub_title">{{$cate_name}}</h3>
					<form action="">
						<div class="sp_filter">
							<div class="filter_left">
								<div class="sort_container">
									<a class="slc_a" href="">综合</a>
									<a href="">销量</a>
									<a href="">最新</a>
								</div>
								<div class="price_sort">
									<div class="text">
										<span>￥</span>
										<input type="text" />
									</div>
									<span class="divid">-</span>
									<div class="text">
										<span>￥</span>
										<input type="text" />										
									</div>
									<a class="sbt" href="">确定</a>
								</div>
								<ul class="price_choice">
									<li><a href="">91-119</a></li>
									<li><a href="">119-168</a></li>
									<li><a href="">168-299</a></li>
								</ul>
							</div>
							<div class="filter_right">
									<span class="ver_line"></span>
									<a href="">
										<input type="checkbox" name="" id="new" />
										<label for="new">新品</label>
									</a>
									<a href="">
										<input type="checkbox" name="" id="reltake" />
										<label for="reltake">实拍</label>
									</a>
							</div>
						</div>
					</form>
				<!--列表-->
				<div class="goods_wall">
					
					{{foreach from="$goods" value="$v"}}
					<div class="goods_content">
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['list_pic']}}" alt="" /></a>
						<p><a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a></p>
						<div class="goods_info">
							<b><i>￥</i>{{$v['goods_price']}}</b>
							<span class="fav_num"><i class="icon-heart"></i> {{$v['click']}}</span>
						</div>
					</div>
					{{endforeach}}	
		
				</div>
			</div>
				<div class="pagination">
					<a class="c" href="">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<a href="">4</a>
					<a href="">5</a>
					<i class="hulvo">...</i>
					<a href="">100</a>
					<a href="">下一页 <i class="icon-angle-right"></i></a>
				</div>
			</div>
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
