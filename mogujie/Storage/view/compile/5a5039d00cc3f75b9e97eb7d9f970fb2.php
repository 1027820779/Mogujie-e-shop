			
			<?php     	
		        $c=new \Common\Model\Cate;
				$navigat=$c->where("pid=0")->orderBy('sort','ASC')->limit(6)->get();

			  ?>

			<div class="nav_frame">
				<div class="navigation">
					<span class="sp_title">全部商品</span>
					<ul>
						<?php foreach ($navigat as $v){?>
						<li><a <?php if($v['cid']==Q('get.cid',0,'intval')){?>
                 style="color:#FF4466;" 
               <?php }?> href="<?php echo U('List/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>