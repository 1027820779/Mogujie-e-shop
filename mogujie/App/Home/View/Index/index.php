<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<style type="text/css">
			.primary_nav_list li:last-child{
				border: none;
			}
		</style>
	</head>
	<body>
		<!--头部-->
	{{include file="VIEW_PATH/Common/header.php"}}
		<!--导航栏，二级菜单-->
		<div class="body">
			<!--导航条-->
	{{include file="VIEW_PATH/Common/nav.php"}}
			<!--轮播图，二级菜单-->
			
			<div class="erji_lunbo_frame">
				<div class="erji_lunbo">
					<!--左边二级菜单-->
					<div class="erji_menu">
						<ul class="primary_nav_list">
						
						{{foreach from="$menu" value="$v"}}
							<li>
								<dl>
									<dt class="tag_word"><a target="_blank" href="{{U('List/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a></dt>
									<dd class="tags"><span>
										<a target="_blank" class="hot" href="">冬季热卖</a>
										<ins></ins>
										<a target="_blank" href="">棉衣</a>
										<ins></ins>
										<a target="_blank" href="">必备内搭</a>
									</span></dd>
								</dl>
								<div class="nav_more">
									{{foreach from="$v['_data']" value="$vv"}}
									<div class="nav_more_warp">
										<dt><a href="{{U('List/index',array('cid'=>$vv['cid']))}}">{{$vv['cname']}}</a></dt>
										<dd>
											<a href="">新款外套</a>
											<a href="">羽绒服</a>
											<a class="hot" href="">毛呢外套</a>
											<a href="">毛衣</a>
											<a href="">羽绒服</a>
											<a href="">毛呢外套</a>
											<a href="">毛衣</a>
											<a href="">羽绒服</a>
											<a href="">毛呢外套</a>
											<a href="">毛衣</a>
											<a href="">羽绒服</a>
											<a href="">毛呢外套</a>
											<a href="">毛衣</a>
										</dd>
									</div>
									{{endforeach}}
									
									
									<div class="nav_more_pic">
										<a href=""><img src="./Public/Home/img/nav_more.jpg" alt="" /></a>
									</div>
								</div>
							</li>
							{{endforeach}}					
						</ul>
					</div>
					<!--中间轮播图和右边图片-->
					<div class="primary_main">
						<!--首屏广告-->
						<div class="primary_main_banner">
							<div class="slider_content_box">
								<div class="slider_banners">
									<a href=""><img src="./Public/Home/img/silder_pic.jpg" alt="" /></a>
									<!--<a href=""><img src="./Public/Home/img/silder_pic.jpg" alt="" /></a>-->
								</div>
								<div class="controller_btn">
									<a href="javascript:;" class="pre"><i class="icon-angle-left"></i></a>	
									<a href="javascript:;"" class="next"><i class="icon-angle-right"></i></a>
								</div>
								<div class="slider_dot_box">
									<ul>
										<li class="active_pic"></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
								</div>
							</div>
						</div>
						<!--首屏产品-->
						<div class="primary_main_sale">
							<ul>
								<li><a href=""><img src="./Public/Home/img/main_sale2.jpg" alt="" /></a></li>
								<li class="last_li"><a href=""><img src="./Public/Home/img/main_sale1.png" alt="" /></a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
			<!--特殊产品，抢购产品-->
			<div class="special_con_frame">
				<div class="special_con">
					
					<div class="special_coll">
						<a href="">
							<img src="./Public/Home/img/special_pic1.jpg" alt="" />
							<span class="timer_title">限时抢购</span>
							<span class="show_timer">
								<span class="m">01</span>
								<span class="d_d">:</span>
								<span class="m">12</span>
								<span class="d_d">:</span>
								<span class="m">23</span>
							</span>
							<span class="specila_price">
								39元
							</span>
						</a>
						
					</div>
					<div class="coll_middle">
						<div class="mid_b"><a href=""><img src="./Public/Home/img/coll_b.jpg" alt="" /></a></div>
						<div class="mid_l"><a href=""><img src="./Public/Home/img/coll_l.png" alt="" /></a></div>
					</div>
					<div class="coll_right">
						<a href=""><img src="./Public/Home/img/cool_t.jpg" alt="" /></a>
						<a class="mid_b" href=""><img src="./Public/Home/img/coll_bot.jpg" alt="" /></a>
					</div>
				</div>
			</div>
			
			<!--品牌馆-->
			<div class="floor_frame">
				<div class="floor_mark">
					<div class="h_title">
						<div class="title_l_s"></div>
						<h3 style="background: url(./Public/Home/img/mark.png);"></h3>
						<div class="title_r_s"></div>
					</div>
					<div class="ntpl_con">
						<div class="ntpl_conl">
							<a class="add_up" href=""><img src="./Public/Home/img/mark_big.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_1.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_2.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_3.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_4.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_5.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_6.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_7.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_8.jpg" alt="" /></a>
						</div>
						<div class="ntpl_conr">
							<div class="long_pic"><a href="">
								<img src="./Public/Home/img/long_pic.jpg" alt="" />
							</a></div>
							<div class="coll_goods">
								
								<a href=""><img src="./Public/home/img/cool_good1.jpg" alt="" /><span>棉服外套</span></a>
								<a href=""><img src="./Public/home/img/cool_good2.jpg" alt="" /><span>内搭卫衣</span></a>
								<a href=""><img src="./Public/home/img/cool_good3.jpg" alt="" /><span>毛衣针织</span></a>
								<a href=""><img src="./Public/home/img/cool_good4.jpg" alt="" /><span>心机包包</span></a>
								<a href=""><img src="./Public/home/img/cool_good5.jpg" alt="" /><span>个性潮鞋</span></a>
								<a href=""><img src="./Public/home/img/cool_good6.jpg" alt="" /><span>大牌美妆</span></a>
							</div>./Public/home/
						</div>
					</div>
				</div>
			</div>

			<!--品牌馆-->
			<div class="floor_frame">
				<div class="floor_mark">
					<div class="h_title">
						<div class="title_l_s"></div>
						<h3 style="background: url(./Public/Home/img/mark2.png);"></h3>
						<div class="title_r_s"></div>
					</div>
					<div class="ntpl_con">
						<div class="ntpl_conl">
							<a class="add_up" href=""><img src="./Public/Home/img/mark_big1.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_1.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_2.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_3.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_4.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_5.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_6.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_7.jpg" alt="" /></a>
							<a href=""><img src="./Public/Home/img/mark_8.jpg" alt="" /></a>
						</div>
						<div class="ntpl_conr">
							<div class="long_pic"><a href="">
								<img src="./Public/Home/img/long_pic2.jpg" alt="" />
							</a></div>
							<div class="coll_goods">
								
								<a href=""><img src="./Public/Home/img/cool_goodd1.jpg" alt="" /><span>棉服外套</span></a>
								<a href=""><img src="./Public/Home/img/cool_goodd2.jpg" alt="" /><span>内搭卫衣</span></a>
								<a href=""><img src="./Public/Home/img/cool_goodd3.gif" alt="" /><span>毛衣针织</span></a>
								<a href=""><img src="./Public/Home/img/cool_goodd4.jpg" alt="" /><span>心机包包</span></a>
								<a href=""><img src="./Public/Home/img/cool_goodd5.jpg" alt="" /><span>个性潮鞋</span></a>
								<a href=""><img src="./Public/Home/img/cool_goodd6.jpg" alt="" /><span>大牌美妆</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			

	<!--------->
			
			
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
