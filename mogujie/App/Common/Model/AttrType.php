<?php namespace Common\Model;

use Hdphp\Model\Model;

class AttrType extends Model{
    // 指定用户表
    protected $table = "attr_type";

    // 自动验证
    protected $validate=array(
    	array('atname','required','属性名不能为空',3,3),
        array('atvalue','required','属性值不能为空',3,3)
    );

    // 添加类型
    public function addAttr(){
    	if($this->create()){
    		return $this->add();
    	}else{
    		return false;
    	}
    }

    // 编辑类型
   public function editAttr(){
       	if($this->create()){
       		return $this->save();
       	}else{
       		return false;
       	}
   }

   // 删除属性
   public function deleteAttr(){
       	$atid=Q('get.atid',0,'intval');
       	if($atid==''){
       		$this->error="删除失败";
       		return false;
       	}else{
       		$this->where("atid='{$atid}'")->delete();
       		return true;
       	}
   }



}