<?php namespace Home\Model;

use Hdphp\Model\Model;

class User extends Model{
	// 指定用户表
	protected $table="user";

    //自动验证
    protected $validate=array(
        array('account','required','用户名称不能为空',3,3),
        array('account','unique',"用户名已存在",3,3),
        array('password','required','密码不能为空',3,3),
        array('passwordc',"required",'请确认密码',3,3),
        array('password','confirm:passwordc',"两次密码不一致",3,3),
        array('code', 'checkCode', '验证码错误', 3, 3)
    );

    //自动完成
    protected $auto=array(
        array("password","md5","function",3,1)
    );

    //注册
    public function store(){
     //调用框架的create方法，触发自动验证
        if($this->create()){
            return $this->add();
        }else{
            return false;
        }
    }

    // 登录
    public function chenckLogin(){
        if(empty($_POST['account']) || empty($_POST['password'])){
            $this->error="验证码或密码不正确";
            return false;
        }else{
            $datas=$this->where("account='{$_POST['account']}'")->find();
                if($datas){
                    if($datas['password']==md5($_POST['password'])){
                        $_SESSION["uid"]=$datas["uid"];
                        $_SESSION["account"]=$datas["account"];
                        return true;
                    }else{
                        $this->error="验证码或密码不正确";
                        return false;
                    }
                }else{
                    $this->error="验证码或密码不正确";
                    return false;
                }
        }
    }

    //以下是自定义的验证规则
    //$field 字段名
    //$value 字段值
    //$params 参数比如 maxlen:10 10就是参数
    //$data 所有表单数据
    public function checkCode($field, $value, $params, $data=null)
    {
        if(strtolower($_POST['code'])==strtolower($_SESSION['code'])){
            return true;
        }else{
            return false;
        }
    }





}
 ?>