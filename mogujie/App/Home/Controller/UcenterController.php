<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//个人中心
class UcenterController extends Controller{

	private $model;
	//构造函数
	public function __init()
	{
        $this->model=new \Home\Model\User;
	}

	// 个人中心首页
	public function index(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();

        // 提交过来的个人信息数据信息
        if(IS_POST){
        	// 
        	if(empty($_POST['account'])){
        		go(U('index'));
        	}else{
	        	$this->model->save($_POST);
	        	$_SESSION['account']=$_POST['account'];
        		go(U('index'));
        	}

        }
        
		View::make();
	}

	// 改变头像
	public function changeAwatar(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();
		View::make();
	}

	// 处理异步提交过来的数据
	public function change(){
        $uid=$_SESSION['uid'];
		$src=$_POST['src'];
		$arr=array(
			"awatar"=>$src
		);
		$this->model->where("uid='{$uid}'")->save($arr);
		echo true;
	}

	// 修改密码
	public function changePass(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();

		View::make();
	}

	// 修改密码操作
	public function ajaxchangePass(){
		$uid=$_POST['uid'];
		$password=$_POST['password'];
		$newpassword=$_POST['newpassword'];
		$verifypassword=$_POST['verifypassword'];

        $oldpassword=$this->model->where("uid='{$uid}'")->pluck("password");
        if($oldpassword!=md5($password)){
        	echo "buyi";
        	return false;
        }
		$arr=array(
			"password"=>md5($newpassword)
		);
		$this->model->where("uid='{$uid}'")->save($arr);
    	echo "putti";
        unset($_SESSION['uid']);
        unset($_SESSION['uname']);
    	return false;
	}

	// 我的宝贝(收藏)
	public function myOrder(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();

        		// 实例化订单表
		$morder=new \Common\Model\Morder;
		$this->morder0=$morder->where("order_type='{0}'")->count();

        $collect=new \Home\Model\Collect;
        $this->collect_count=$collect->count();
        $this->col_data=$collect->join("goods","gid","=","goods_gid")->where("user_uid='{$uid}'")->orderBy('coid','DESC')->get();
		View::make();
	}

	// 删除收藏宝贝
	public function delCollect(){
		$coid=Q('get.coid');
		$collect=new \Home\Model\Collect;
		$collect->where("coid='{$coid}'")->delete();
		go(U('Ucenter/myOrder'));
	}

	// 我的宝贝(待付款)
	public function myOrder0(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();

        $collect=new \Home\Model\Collect;
        $this->collect_count=$collect->count();

		// 实例化订单表
		$morder=new \Common\Model\Morder;
		$this->morder0=$morder->where("order_type='{0}'")->count();
		$this->m_data0=$morder->where("order_type='{0}'")->get();

		View::make();
	}

	// 删除待付款
	public function delnotpay(){
		$oid=Q('get.oid');
		$morder=new \Common\Model\Morder;
		$morder->where("oid='{$oid}'")->delete();
		$morder_list=new \Common\Model\Morder_list;
		$morder_list->where("morder_oid='{$oid}'")->delete();
		go(U('Ucenter/myOrder0'));
	}

	// 查看待付款的商品列表
	public function showmor(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();

        $collect=new \Home\Model\Collect;
        $this->collect_count=$collect->count();

		// 实例化订单表
		$morder=new \Common\Model\Morder;
		$this->morder0=$morder->where("order_type='{0}'")->count();
		$oid=Q('get.oid');
		$this->m_data0=$morder->where("oid='{$oid}'")->find();
		$morder_list=new \Common\Model\Morder_list;
		$this->morderlist_data=$morder_list->where("morder_oid='{$oid}'")->join('goods','gid','=','goods_gid')->get();


		// p($morderlist_data);
		View::make();

	}

	// 删除待付款商品列表里面的商品
	public function delmlnt(){
		$olid=Q('get.olid');
		$morder_list=new \Common\Model\Morder_list;
		$morder_oid=$morder_list->where("olid='{$olid}'")->pluck('morder_oid');
		$total_price=$morder_list->where("olid='{$olid}'")->pluck('total_price');
		$morder_list->where("olid='{$olid}'")->delete();
		$morder=new \Common\Model\Morder;
		if($morder_list->where("morder_oid='{$morder_oid}'")->get()){
			$all_price=$morder->where("oid='{$morder_oid}'")->pluck("all_price");
			$ii=$all_price-$total_price;
			$arr=array(
				"all_price"=>$ii
			);
			$morder->where("oid='{$morder_oid}'")->save($arr);
			go(U('Ucenter/showmor',array("oid"=>$morder_oid)));
		}else{
			$morder->where("oid='{$morder_oid}'")->delete();
			go(U('Ucenter/myOrder0'));
		}



	}

	// 我的地址
	public function myAddress(){
        // 判断是否等登录
        if(!isset($_SESSION['uid'])){
            go(U('Index/index'));
        }
        $uid=$_SESSION['uid'];
        $this->udata=$this->model->where("uid='{$uid}'")->find();
		// 实例化地址表
        $address=new \Home\Model\Address;
        $this->address_data=$address->get();

		View::make();
	}

	


}