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
	
		<div class="header">
			<!--购物车，登录，注册-->
						

					<div class="header_top_frame">
				<div class="header_top">
					<a class="home_link" href="index.php">
						<i class="icon-home"></i>蘑菇街首页</a>
					<ul class="top_menu">
                        						<li class="s1 no-icon"><a class="menu_name" href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Login&a=register">注册</a></li>
						<li class="s1 no-icon"><a class="menu_name" href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=Login&a=index">登录</a></li>
                        
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
			<!--导航条-->
				
			
			<div class="nav_frame">
				<div class="navigation">
					<span class="sp_title">全部商品</span>
					<ul>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=22">风衣</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=29">鞋子</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=13">裤子</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=12">上衣</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=14">西装</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=23">毛衣</a></li>
											</ul>
				</div>
			</div>
			<!--轮播图，二级菜单-->
			
			<div class="erji_lunbo_frame">
				<div class="erji_lunbo">
					<!--左边二级菜单-->
					<div class="erji_menu">
						<ul class="primary_nav_list">
						
						<?php foreach ($menu as $v){?>
							<li>
								<dl>
									<dt class="tag_word"><a target="_blank" href="<?php echo U('List/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a></dt>
									<dd class="tags"><span>
										<a target="_blank" class="hot" href="">冬季热卖</a>
										<ins></ins>
										<a target="_blank" href="">棉衣</a>
										<ins></ins>
										<a target="_blank" href="">必备内搭</a>
									</span></dd>
								</dl>
								<div class="nav_more">
									<?php foreach ($v['_data'] as $vv){?>
									<div class="nav_more_warp">
										<dt><a href="<?php echo U('List/index',array('cid'=>$vv['cid']))?>"><?php echo $vv['cname']?></a></dt>
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
									<?php }?>
									
									
									<div class="nav_more_pic">
										<a href=""><img src="./Public/Home/img/nav_more.jpg" alt="" /></a>
									</div>
								</div>
							</li>
							<?php }?>					
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
