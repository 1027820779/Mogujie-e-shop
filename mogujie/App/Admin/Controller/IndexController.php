<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台首页控制器
class IndexController extends CommonController{

	public function __init(){
		parent::__init();
	}

    // 后台首页
    public function index(){
        View::make();
    }
    // 欢迎页
    public function welcome(){
    	View::make();
    }

    // 修改密码
    public function changePwd(){
        View::make();
    }
}