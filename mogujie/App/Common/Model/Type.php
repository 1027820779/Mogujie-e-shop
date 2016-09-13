<?php namespace Common\Model;

use Hdphp\Model\Model;

class Type extends Model{
    // 指定用户表
    protected $table = "type";

    // 自动验证
    protected $validate=array(
    	array('tname','required','类型不能为空',3,3)
    );

    // 添加类型
    public function addType(){
    	if($this->create()){
    		return $this->add();
    	}else{
    		return false;
    	}
    }

    // 编辑类型
    public function editType(){
    	if($this->create()){
    		return $this->save();
    	}else{
    		return false;
    	}
    }

    // 删除类型
    public function deleteType(){
    	$tid=Q('get.tid',0,'intval');
    	if($tid==''){
    		$this->error="删除失败";
    		return false;
    	}else{
    		$this->where("tid='{$tid}'")->delete();
    		return true;
    	}
    }



}