<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台登录控制器
class LoginController extends Controller{

    private $model;
    // 构造函数
    public function __init(){
        $this->model=new \Common\Model\Admin;

    }

    // 登录
    public function index(){
        if(IS_POST){
            if(!$this->model->store()) View::error($this->model->getError());
            go(U('Index/index'));
        }
        View::make();
    }


    //退出
    public function out(){
        unset($_SESSION['aid']);
        unset($_SESSION['admin_account']);
        go(U('Login/index'));
    }




}
?>