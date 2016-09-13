<?php namespace Common\Model;

use Hdphp\Model\Model;

class Goods extends Model{
    // 指定用户表
    protected $table = "goods";

	// 自动完成
	protected $auto=array(
		array("send_time","time","function",3,3),
		array('admin_aid','admin_aid','method',3,3),
		array('type_tid','type_tid','method',3,3),
	);    

	// 自动处理用户id
	public function admin_aid(){
		return $_SESSION['aid'];
	}

	// 自动处理类型id
	public function type_tid(){
		$cate=new \Common\Model\Cate;
		return $cate->where("cid='{$_POST['category_cid']}'")->pluck('type_tid');
	}

    // 添加商品
    public function addGoods(){
    	if($this->create()){
    		// 主表添加
    		if(!$goods_gid=$this->add()){
	    		$this->error="添加失败1";
	    		return false;
    		}
    		$pic_str=implode(',',$_POST['pics']);
    		// 分表添加
    		$con=array(
    			'l_pics'=>$pic_str,
    			'm_pics'=>$pic_str,
    			'b_pics'=>$pic_str,
    			'goods_content'=>$_POST['goods_content'],
    			'goods_service'=>$_POST['goods_service'],
    			'goods_gid'=>$goods_gid
			);
			$Goods_con=new \Common\Model\Goods_con;
			if(!$Goods_con->add($con)){
	    		$this->error="添加失败2";
	    		return false;
			}
			// 添加商品属性,规格
			// 属性
			$Goods_type = new \Common\Model\Goods_type;
			//1.把属性添加到商品属性表里面去
			$attr = Q('post.attr',array());
			foreach ($attr as $k => $v) {
				if($v[0]==""){
					break;
				}
				$attrData=array(
					'attr_type_atid'=>$k,
					'g_type_value'=>$v[0],
					'goods_gid'=>$goods_gid,
				);
				if(!$Goods_type->add($attrData)){
		    		$this->error="添加失败3";
		    		return false;
				}
			}
			//2.处理属性值 把规格添加到商品属性表
			$spec=Q('post.spec',array());
			foreach ($spec as $k => $v){
				if($v['value'][0]==""){
					break;
				}
				for ($i = 0; $i < count($v['value']); ++$i){
					$mdata = array(
						'g_type_value' => $v['value'][$i],
						'g_other_price' => (int) $v['price'][$i],
						'attr_type_atid'=> $k,
						'goods_gid'=>$goods_gid,
						);
						if(!$Goods_type->add($mdata)){
				    		$this->error="添加失败4";
				    		return false;
						}	
				}
			}

    		return true;

    	}else{
    		$this->error="添加失败00";
    		return false;
    	}
    }

    // 编辑商品
    public function editGoods(){
    	// 商品表添加
    	$post=Q("post.",array());
    	// 商品表所需要的字段名
    	$colmun=array('gid','gname','gnumber','unit','mark_price','goods_price','stock_num','list_pic','click','brand_bid','category_cid','type_tid');
    	$new=array();
    	foreach ($post as $k => $v) {
    		if(in_array($k, $colmun)){
    			$new[$k]=$v;
    		}
    	}
    	if(!$this->save($new)){
    		$this->error="编辑失败1";
    		return false;
    	}
    	// 商品详情表
		$Goods_con=new \Common\Model\Goods_con;
		$pic_str=implode(',',$post['pics']);
		$gcid=$Goods_con->where("goods_gid='{$post["gid"]}'")->pluck("gcid");
		$con=array(
			'gcid'=>$gcid,
			'l_pics'=>$pic_str,
			'm_pics'=>$pic_str,
			'b_pics'=>$pic_str,
			'goods_content'=>$_POST['goods_content'],
			'goods_service'=>$_POST['goods_service'],
			'goods_gid'=>$post['gid']
		);
		if(!$Goods_con->save($con)){
    		$this->error="编辑失败2";
    		return false;
		}
		// 商品属性表
		// 属性
		$Goods_type = new \Common\Model\Goods_type;
		//1.把属性添加到商品属性表里面去
		$attr = Q('post.attr',array());
		foreach ($attr as $k => $v) {
			$attrData=array(
				'attr_type_atid'=>$v['attr_type_atid'],
				'g_type_value'=>$v[0],
				'goods_gid'=>$post['gid'],
				'gtid'=>$k
			);
			if(!$Goods_type->save($attrData)){
	    		$this->error="编辑失败3";
	    		return false;
			}
		}
		//2.把规格添加到商品属性表里面去
		$spec = Q('post.spec',array());
		foreach ($spec as $k => $v) {
			$specData=array(
				'attr_type_atid'=>$v['attr_type_atid'],
				'g_type_value'=>$v[0],
				'goods_gid'=>$post['gid'],
				'g_other_price'=>$v['g_other_price'],
				'gtid'=>$k
			);
			if(!$Goods_type->save($specData)){
	    		$this->error="编辑失败4";
	    		return false;
			}
		}

		return true;

    	// p($spec);
    }

    // 删除商品
    public function deleteGoods(){
        $gid = Q('get.gid',0,'intval');
        // 主表中删除
		if(!$this->where("gid='{$gid}'")->delete()){
    		$this->error="删除失败1";
    		return false;
		}
       // 附表中删除
		$Goods_con=new \Common\Model\Goods_con;
		if(!$Goods_con->where("goods_gid='{$gid}'")->delete()){
    		$this->error="删除失败2";
    		return false;
		}
		// 商品属性表中删除
		$Goods_type = new \Common\Model\Goods_type;
		if(!$Goods_type->where("goods_gid='{$gid}'")->delete()){
    		$this->error="删除失败3";
    		return false;
		}
		return true;
    }

    // 添加货品
    public function addLists(){
		$ids=implode(',',$_POST['ids']);
		// 分表添加
		$con=array(
			'goods_number'=>$_POST['goods_number'],
			'stocks'=>$_POST['stocks'],
			'goods_gid'=>$_POST['goods_gid'],
			'ids'=>$ids
		);
		$Lists_con=new \Common\Model\Lists;
		if(!$Lists_con->add($con)){
    		$this->error="添加失败1";
    		return false;
		}
		return true;
    }

    // 删除货品列表
    public function deleteList(){
        $lid = Q('get.lid',0,'intval');
        $lists = new \Common\Model\lists;
        if(!$lists->where("lid='{$lid}'")->delete()){
    		$this->error="删除货品失败";
    		return false;	
        }
		return true;
    }

    // 修改货品列表
    public function edLists(){
    	$_POST['ids']=implode(',',$_POST['ids']);
        $lists = new \Common\Model\lists;
    	if(!$lists->save($_POST)){
    		$this->error="修改货品失败";
    		return false;	
    	}
    	return true;
    }


}