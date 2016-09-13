<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/content.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<!-- 放大镜 -->
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<style type="text/css">
			#kuai{
				width:200px;
				height: 300px;
				background: white;
				opacity: 0.5; 
				position: absolute;
				left: 0px;top: 0px;
				display: none;
			}
			/*遮罩*/
			#cover{
				width: 400px;
				height: 600px;
				position: absolute;
				left: 0px;top: 0px;
			}
			/*右侧的大元素*/
			#right{
				width: 400px;
				height: 600px;
				float: left;
				margin-left: 20px;
				overflow: hidden;
				position: absolute;
				display: none;
			    top: 0px;
			    left: 400px;
			    z-index: 9999;
			}
			#right img{
				position: absolute;
				left: 0px;
				top: 0px;
				width: 800px;
				height: 1200px;
			}
			#type_se{
			    border: 2px solid #666;
    			margin: -1px 9px 4px -1px;
			}
		</style>
		<script type="text/javascript">
			window.onload=function(){
			// 1.抓取元素
			var  left = document.getElementById('left');
			var  right = document.getElementById('right');
			var  kuai = document.getElementById('kuai');
			var  img = document.getElementById('img');
		    var  cover = document.getElementById('cover');
			// 2.绑定事件
			cover.onmousemove=function(e){
				// 右侧区域和小块显示
		        kuai.style.display = "block";
		        right.style.display = "block";
				// 获得兼容模式的事件对象
				var ev = window.event || e;
				// 获得鼠标在事件源内移动的坐标
				var l = ev.offsetX || ev.layerX;
				var t = ev.offsetY || ev.layerY;
				// document.title = l +"|"+ t;
		        // 计算出色块的位置
		        var k_l = l - 100;
		        var k_t = t - 100;
		        // 临界点判断
		        if(k_l<=0){
		        	k_l = 0;
		        }
		        if(k_l>=200){
		        	k_l = 200;
		        }
		        if(k_t<=0){
		        	k_t=0;
		        }
		        if (k_t>=300){
		        	k_t=300;
		        };
		        // 计算出大图片的位置  反向二倍的关系
		        var img_l = k_l * -2;
		        var img_t = k_t * -2;
		        // 把位置数据赋值给色块
		        kuai.style.left = k_l + "px";
		        kuai.style.top = k_t + "px";
		        // 把数据值赋给大图片
		        img.style.left = img_l + "px";
		        img.style.top = img_t + "px";

			} 
			//3.鼠标移出消失
			left.onmouseout=function(){
		        kuai.style.display = "none";
		        right.style.display = "none";
			}

			// 切换展示图
			$('.my_list').mouseover(function(event) {
				$(this).attr('class','see').siblings('li').removeClass('see');
				var imgPath = $(this).find('img').attr('src');
				$('#img').attr('src',imgPath);
				$('#left').css({background:"url("+imgPath+")",backgroundSize: "400px 600px"});
			});

			// 选择商品规格(颜色，尺码)
			$('.com_d ol li').click(function(event){
				// 规格
				var unit=$(this).html();
				$(this).attr('id','type_se').siblings('li').removeAttr('id');
				$(this).siblings('input').val(unit);
				// // 用ajax改变价格
				// $.ajax(function(){
					
				// })
			});

			// 商品数量
			// 减一个
			$('.minus').click(function(){
				var san=$('.san').val();
				if(san>1){
					san--;
					$('.san').val(san);
				}
			});
			// 加一个
			$('.plus').click(function(){
				var san=$('.san').val();
				var all_san=parseInt($('.all_san').html());
				if(all_san>san){
					san++;
					$('.san').val(san);
				}
			});

			// 加入购物车
			$(".to_car").click(function(){
				var id=$("input[name='id']").val();
				var name=$("input[name='name']").val();
				var num=$("input[name='num']").val();
				var price=$("input[name='price']").val();
				var color=$("input[name='color']").val();
				var size=$("input[name='size']").val();

				if(color==''){
					alert("请选择颜色");
					return;
				}
				if(size==''){
					alert("请选择尺码");
					return;
				}
				if(id!='' && name!=''  && num!=''  && price!=''  && color!=''  && size!=''){
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Content&a=addCart",
                        data:{id:id,name:name,num:num,price:price,color:color,size:size},
                        dataType:"json",
                        success:function(re){
                            if(re){
                            	var r=confirm("成功的添加到了购物车，去付款吗亲？");
        						if(r==true){
									// 调到登录页面
									location.href="index.php?c=Cart&a=index";
								}else{
                            		window.location.reload();
								}

                            }else{
                                alert("no");
                            }
                        }
                    });
				}

			});

            //收藏
            $(".svaeas").click(function(){
				var login=$(this).attr('login');
				var gid=$(this).attr('gid');
				// 判断是否登录
				if(login=="com"){
					// 把数据提交到收藏表
                    $.ajax({
                        type:"post",
                        url:"index.php?c=Content&a=addCollect",
                        data:{gid:gid},
                        // dataType:"json",
                        success:function(re){
                            if(re=="ok"){
                            	alert("收藏成功了");
                            	$(".svaeas span").html("已收藏");
                            }else{
                                alert("已经收藏了呀亲~");
                            }
                        }
                    });
				}else{
					var r=confirm("你还没有登录，你要登录吗");
					if(r==true){
						// 调到登录页面
						location.href="index.php?c=Login&a=index";
					}else{
						// alert("");
					}
				}
            });


		}
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
		<!--导航栏，二级菜单-->
		<div class="body">
			
			</div>
			<!--商品详情，颜色，大小-->
			<div class="shop_detail_frame">
				<div class="shop_pic">
					<img src="./Public/Home/img/neirong_top.png" width="1200" alt="" />
				</div>
				
				<div class="shop_detail">
						<div class="goods_info_box">
							
							<div class="goods_img">
								<div class="big_img" id="left" style="background-image: url(<?php echo $goods['list_pic']?>);">
									<div id="kuai"></div>
									<div id="cover"></div>
								</div>
								<div class="small_img">
									<div class="box">
										<div class="list">
											<ul>
											<?php foreach ($l_pics as $v){?>
												<!-- <li class="see"><img src="./Public/Home/img/small_img_list1.jpg" alt="" /><i></i></li> -->
												<li class="my_list"><img src="<?php echo $v?>" alt="" /><i></i></li>
												<?php }?>
											</ul>

										</div>
										<a class="left_btn" href="javascript:;"><i class="icon-angle-left"></i></a>
										<a <?php if($pic_count < 8){?>
                 style="display:none;" 
               <?php }?> class="right_btn" href="javascript:;"><i class="icon-angle-right"></i></a>
									</div>
								</div>
								<div id="right">
									<img id="img" src="<?php echo $goods['list_pic']?>" alt="" />
								</div>
							</div>
							<!--产品信息选择大小-->
							<div class="select_info">
								<h1><span><?php echo $goods['gname']?></span></h1>
								<input type="hidden" name="name" value="<?php echo $goods['gname']?>"/>
								<input type="hidden" name="id" value="<?php echo $goods['gid']?>"/>
								<div class="goods_price_box">
									<dl>
										<dt>原价：</dt>
										<dd class="old_price">
											<span>¥</span>
											<span><?php echo $goods['mark_price']?></span>
										</dd>
									</dl>
									<dl>
										<dt>现价：</dt>
										<dd class="price_now">
											<span class="normal_p_now">¥</span>
											<span class="normal_p_now"><?php echo $goods['goods_price']?></span>
											<input type="hidden" name="price" value="<?php echo $goods['goods_price']?>"/>
											<span class="m_info">
												<span>评价：<span class="num">10</span></span>
												<span>累计销量：<span class="num">185</span></span>
											</span>
											
										</dd>
									</dl>
								</div>
								<div class="goods_sku">
									<div class="content">
<!-- 										<dl class="style">
											<dt class="com_t">颜色：</dt>
											<dd class="com_d">
												<ol>
													<li class="pics se">
														<img src="./Public/Home/img/small_img_list3.jpg" alt="" />
														<b></b>
													</li>
													<li class="pics">
														<img src="./Public/Home/img/small_img_list3.jpg" alt="" />
														<b></b>
													</li>
												</ol>
											</dd>
										</dl> -->
										<dl class="size">
											<dt class="com_t">颜色：</dt>
											<dd class="com_d yanse">
												<ol>
													<?php foreach ($attr as $v){?>
													<?php if($v['atname']=='颜色'){?>
                
													<li><?php echo $v['g_type_value']?></li>
													
               <?php }?>
													<?php }?>
													<input type="hidden" name="color" value=""/>
												</ol>
											</dd>
										</dl>
										<dl class="size">
											<dt class="com_t">尺码：</dt>
											<dd class="com_d chima">
												<ol>
													<?php foreach ($attr as $v){?>
													<?php if($v['atname']=='尺码'){?>
                
													<li><?php echo $v['g_type_value']?></li>
													
               <?php }?>
													<?php }?>
													<input type="hidden" name="size" value=""/>
												</ol>
											</dd>
										</dl>

										<dl class="goods_num">
											<dt>数量：</dt>
											<dd>
												<div class="num_adder">
													<span class="minus"><i class="icon-minus"></i></span>
													<input name="num" disabled="disabled" class="san" type="text" value="1" />
													<span class="plus"><i class="icon-plus"></i></span>
												</div>
												<div class="ku_all">库存<span class="all_san"><?php echo $goods['stock_num']?></span><?php echo $goods['unit']?></div>
											</dd>
										</dl>
									</div>
									<div class="goods_buy">
										<a class="buy_now" href="javascript:;">立刻购买</a>
										<a  class="to_car" href="javascript:;">加入购物车</a>
									</div>
									<div class="goods_social">
										<div class="ra"><i class="icon-heart"></i><span><?php echo $goods['click']?></span></div>
										<div <?php if(isset($_SESSION['uid'])){?>
                login="com"
               <?php }?> gid="<?php echo $goods['gid']?>" class="ra svaeas">
                                        <i class="icon-plus"></i><span><?php if(isset($_SESSION['uid'])){?>
                <?php if($collect==1){?>
                已收藏<?php }else{?>收藏
               <?php }?><?php }else{?>收藏
               <?php }?></span>
                                    </div>
										<div class="report"><a href="">举报</a></div>
									</div>
									<div class="goods_service">
										<div class="service_titlw">服务承诺：</div>
										<ul>
											<li><a href=""><img src="./Public/Home/img/ser1.png" alt="" /><span>全国包邮</span></a></li>
											<li><a href=""><img src="./Public/Home/img/ser2.png" alt="" /><span>7天无理由退货</span></a></li>
											<li><a href=""><img src="./Public/Home/img/ser3.png" alt="" /><span>72小时发货</span></a></li>
											<li><a href=""><img src="./Public/Home/img/ser4.png" alt="" /><span>退货补运费</span></a></li>
										</ul>
									</div>
									<div class="pay_methods">
										<div class="pay_title">支付方式：</div>
										<div class="method_list"></div>
									</div>
								</div>
								
							</div>
							<div class="good_goods">
								<p class="good_title">
									<s></s>
									<span>热卖推荐</span>
								</p>
								<div class="good_list">
									<ul>
									<?php foreach ($go as $v){?>
										<li>
											<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img width="120" height="180" src="<?php echo $v['list_pic']?>" alt="" /></a><span>￥<?php echo $v['goods_price']?></span>
										</li>
									<?php }?>
									</ul>
								</div>
							</div>
							
						</div>
				</div>
			</div>
			<!--商品详情,看了又看-->
			<div class="detail_content_frame">
				<div class="detail_content">
					<div class="left_detail_content">
						<div class="module_report">
							<h3 class="module_title">看了又看</h3>
							<ul>
								
							<?php foreach ($moudule as $v){?>
								<li>
									<a class="mo_pic" href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['list_pic']?>" alt="" /></a>
									<a class="mo_ti" href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
									<div class="module_info">
										<div class="module_price">
											<em>¥</em>
											<span><?php echo $v['goods_price']?></span>
										</div>
										<div class="module_fav">
											<i class="icon-heart"></i>
											<span><?php echo $v['click']?></span>
										</div>
									</div>									
								</li>
								<?php }?>

							</ul>
						</div>
					</div>
					<!--产品具体情况-->
					<div class="module_tabpanel">
						<div class="tabbar_box">
							<div class="tabbar_title">商品详情</div>
						</div>
						<div class="tab_content">
						<?php echo $goods_con['goods_content']?>
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
