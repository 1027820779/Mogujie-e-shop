<?php namespace Common\Model;

use Hdphp\Model\Model;

class Cate extends Model{
    // 指定用户表
    protected $table = "category";

    protected $validate=array(
    	array('cname','required','分类不能为空',3,3)
    );

    // 添加分类
    public function addCate(){
    	if($this->create()){
    		return $this->add();
    	}else{
    		return false;
    	}
    }

    //编辑分类
    public function editCate(){
        if(!$this->save($_POST)){
            $this->error="修改失败";
            return false;
        }
        return true;
    }

    // 添加子类
    public function addSonCate(){
    	if($this->create()){
    		return $this->add();
    	}else{
    		return false;
    	}
    }

    // 处理分类(过滤子类)
    public function getNoChild($cid){
    	// 所有子类cid
    	$cids=$this->getSon($this->get(),$cid);
        $cids[]=$cid;
        $data=$this->where("cid NOT IN(".implode(',', $cids).")")->get();
        $data=Data::tree($data,'cname');
        return $data;

    }

    public function getSon($data,$cid){
    	$temp=array();
    	foreach($data as $v){
    		if($v['pid']==$cid){
    			$temp[]=$v['cid'];
    			$temp=array_merge($temp,$this->getSon($data,$v['cid']));

    		}
    	}
    	return $temp;
    }


    // 排序分类
    public function sortCate(){
        $data=$_POST;
        if(!empty($_POST)){
            foreach ($data as $k => $v) {
                $this->save(array('cid'=>$k,'sort'=>$v));
            }
            return true;
        }else{
            $this->error="排序失败";
            return false;
        }
    }





}

?>