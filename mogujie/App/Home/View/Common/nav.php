			
			<?php     	
		        $c=new \Common\Model\Cate;
				$navigat=$c->where("pid=0")->orderBy('sort','ASC')->limit(6)->get();

			  ?>

			<div class="nav_frame">
				<div class="navigation">
					<span class="sp_title">全部商品</span>
					<ul>
						{{foreach from="$navigat" value="$v"}}
						<li><a {{if value="$v['cid'] eq Q('get.cid',0,'intval')"}} style="color:#FF4466;" {{endif}} href="{{U('List/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a></li>
						{{endforeach}}
					</ul>
				</div>
			</div>