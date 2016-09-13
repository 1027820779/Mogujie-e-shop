<?php namespace Home\Controller;

	use Hdphp\Controller\Controller;

	// 用户控制器
	class LoginController extends Controller{

        private $model;
		// 构造函数
		public function __init(){
            $this->model=new \Home\Model\User;

		}

		 // 登录
		public function index(){
            if(IS_POST){
                if(!$this->model->chenckLogin()) View::error($this->model->getError());
                // 如果从注册页面进来的话不能发挥到注册页，找到从哪个页面进来注册页面的，就返回那个页面
		        if(isset($_SESSION['reg_url'])){
		        		$u=$_SESSION['reg_lasturl'];
        	            unset($_SESSION['reg_url']);
                        unset($_SESSION['reg_lasturl']);
			           	go($u);
		        }else{
	        		// 如果存在上一个路径，就返回上一个页面
		            if($_SESSION['urlshang']==''){
		            	go(U('Index/index'));
		            }else{
			           	go($_SESSION['urlshang']);
		            }
		        }

            }
	        //可以得到上一页的地址(用来登录后又返回原网页)
        	$_SESSION['urlshang']=$_SERVER['HTTP_REFERER'];
			View::make();
		}

		// 注册
		public function register(){
			if(IS_POST){
                if(!$this->model->store()) View::error($this->model->getError());
                View::success('注册成功','index');
			}
	        //不把自己的url把存在session(用来登录后又返回原网页)
	        //可以得到上一页的地址(用来登录后又返回原网页)

        	$_SESSION['reg_lasturl']=$_SERVER['HTTP_REFERER'];
        	$_SESSION['reg_url']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			View::make();
		}

        //退出
        public function out(){
            unset($_SESSION['uid']);
            unset($_SESSION['uname']);
            // 从当前页面退出又到当前页面
            if($_SESSION['goUrl']==''){
            	go(U('Index/index'));
            }else{
	           	go($_SESSION['goUrl']);
            }

        }

        // 验证码
		public function code(){
			Code::num(1)->make();
		}


	}



 ?>