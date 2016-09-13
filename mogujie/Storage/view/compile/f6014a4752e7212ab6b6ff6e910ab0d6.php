			

		<?php 
		// 从sess中获取数据
			$cartg=Cart::getGoods(); 
			// p($cartg);
	    	$go=new \Common\Model\Goods;
	    	// 检查ses中是否有数据，如果没有就不走下面
    		if(!empty($cartg)){
				foreach ($cartg as $k => $v) {
					$cartg[$k]['imgs']=$go->where("gid='{$v["id"]}'")->pluck('list_pic');
					// p($go->where("gid='{$v["id"]}'")->pluck('list_pic'));
				}
			}
			// p($cartg);
		?>
			<div class="header_top_frame">
				<div class="header_top">
					<a class="home_link" href="index.php">
						<i class="icon-home"></i>蘑菇街首页</a>
					<ul class="top_menu">
                        <?php if(isset($_SESSION['uid'])){?>
                
						<li class="s1 icon-b login_user">
							<a class="menu_name cus" href=""><?php echo $_SESSION['account']?><i class="icon-angle-down"></i></a>
							<ul>
								<li><a href="<?php echo U('Ucenter/index')?>">个人中心</a></li>
								<li><a href="<?php echo U('Login/out')?>">退出</a></li>
							</ul>							
						</li>
                        <?php }else{?>
						<li class="s1 no-icon"><a class="menu_name" href="<?php echo U('Login/register')?>">注册</a></li>
						<li class="s1 no-icon"><a class="menu_name" href="<?php echo U('Login/index')?>">登录</a></li>
                        
               <?php }?>
						<li class="s1 has-line"><a class="menu_name" href=""><i class="icon-list"></i>我的订单</a></li>
						<li class="s1 has-line shoping-car">
							<a class="menu_name" href=""><i class="icon-shopping-cart"></i>购物车</a>
							<div class="shoping_list">
								<ul>
									<!--购物车列表-->
									<?php if(!empty($cartg)){?>
                
									<?php foreach ($cartg as $v){?>
									<li>
										<a class="shop_img" href="<?php echo U('Content/index',array('gid'=>$v['id']))?>"><img src="<?php echo $v['imgs']?>" width="40" height="40" alt="" /></a>
										<a class="shoping_name" href="<?php echo U('Content/index',array('gid'=>$v['id']))?>"><?php echo $v['name']?></a>
										<span class="shoping_price">¥<?php echo $v['price']?></span>
										<span class="shoping_info">颜色：<?php echo $v['options']['color']?> 尺码：<?php echo $v['options']['size']?></span>
									</li>
									<?php }?>
									
               <?php }?>

									<?php if(empty($cartg)){?>
                
									<li class="nogood">
									亲购物车里没有货啊~·
									</li>
									
               <?php }?>
									
								</ul>
								<?php if(!empty($cartg)){?>
                
								<div class="subbox">
									<a class="caring" href="<?php echo U('Cart/index')?>">查看购物车</a>
								</div>
								
               <?php }?>
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