<?php namespace Common\Model;

use Hdphp\Model\Model;
// 用户模型
class Admin extends Model{
    // 指定用户表
    protected $table = "admin";

    //自动验证
    protected $validate=array(
        array('account','checkaccount','用户名或者密码错误',3,3),
    );



    //以下是自定义的验证规则
    //$field 字段名
    //$value 字段值
    //$params 参数比如 maxlen:10 10就是参数
    //$data 所有表单数据
    public function checkaccount($field, $value, $params, $data=null)
    {
    	$data=$this->where("account='{$_POST['account']}'")->find();
        if($data){
        	if($data['password']!=md5($_POST['password'])){
        		return false;
        	}
            $_SESSION["aid"]=$data["aid"];
            $_SESSION["admin_account"]=$data["account"];
            return true;
        }else{
            return false;
        }
    }


    //自定义store
    public function store(){
     //调用框架的create方法，触发自动验证
        if($this->create()){
	    	$data=$this->where("account='{$_POST['account']}'")->find();
            $ip=$_SERVER['REMOTE_ADDR'];
            $time=time();
            $this->where("aid='{$data['aid']}'")->save(array('logintime'=>$time,'loginip'=>$ip));
            return true;
        }else{
            return false;
        }
    }



}
