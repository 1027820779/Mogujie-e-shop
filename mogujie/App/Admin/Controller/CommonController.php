<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;


//   后台登录控制器
class CommonController extends Controller{
	// 构造函数，是框架自定义的
	// 不会覆盖父级的构造函数
	public function __init(){
		$this->auth();
	}


	// 验证是否登录
	public function auth(){
		// 判断用户是否登录
		if(!isset($_SESSION['aid']) || !isset($_SESSION['admin_account'])){
			// 跳转到登录页面，让用户登录
			go(U('Login/index'));
		}
	}
}

?>