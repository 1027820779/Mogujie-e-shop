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
			
		</div>
		<!--筛选懒，列表-->
		<div class="body">
			<div class="body_frame">
			<!-- 导航条 -->
							
			
			<div class="nav_frame">
				<div class="navigation">
					<span class="sp_title">全部商品</span>
					<ul>
												<li><a                  style="color:#FF4466;" 
                href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=22">风衣</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=29">鞋子</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=13">裤子</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=12">上衣</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=14">西装</a></li>
												<li><a  href="http://localhost/houdun/PersonalProject/project/mogujie/index.php?m=Home&c=List&a=index&cid=23">毛衣</a></li>
											</ul>
				</div>
			</div>
				
				<div class="tab_pic">
					<img src="./Public/Home/img/tab_pic.jpg" width="1200" alt="" />
				</div>
				<div class="common_goods_box">
					<h3 class="sub_title"><?php echo $cate_name?></h3>
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
					
					<?php foreach ($goods as $v){?>
					<div class="goods_content">
						<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['list_pic']?>" alt="" /></a>
						<p><a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a></p>
						<div class="goods_info">
							<b><i>￥</i><?php echo $v['goods_price']?></b>
							<span class="fav_num"><i class="icon-heart"></i> <?php echo $v['click']?></span>
						</div>
					</div>
					<?php }?>	
		
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
