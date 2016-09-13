<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//购物车页控制器
class CartController extends Controller{

	private $model;
	//构造函数
	public function __init()
	{
        $this->model=new \Common\Model\Goods;
	}

	// 购物车首页
	public function index(){
		// p($_SESSION['cart']);
		// 保存页面当前路径
		$_SESSION['goUrl'] = __URL__;

        //可以得到上一页的地址(用来登录后又返回原网页)
        $_SESSION['urlshang']=$_SERVER['HTTP_REFERER'];

		// 从session中得到数据
		$cartg=Cart::getGoods(); 
		// 判断是否空
		if(!empty($cartg)){
			// 重组数组，压上照片
			foreach ($cartg as $k => $v) {
				$cartg[$k]['imgs']=$this->model->where("gid='{$v["id"]}'")->pluck('list_pic');
				$cartg[$k]['oldprice']=$this->model->where("gid='{$v["id"]}'")->pluck('mark_price');
				$cartg[$k]['s_num']=$this->model->where("gid='{$v["id"]}'")->pluck('stock_num');
			}
			// 分配数据
			$this->cartg=$cartg;
			// 分配商品总数
			$this->nums=Cart::getTotalNums(); 
			// 分配商品总价格
			$this->all_m=Cart::getTotalPrice();

		}else{
			// 如果空的话就返回空数组
			$this->cartg=[];
		}

		View::make();
	}

	// 删除购物车中的商品
	public function delCart(){
        $key=Q('get.key',0,'string');
        // p($key);
        unset($_SESSION['cart']['goods'][$key]);
        go('index');
	}

	// 全清空
	public function delAll(){
        unset($_SESSION['cart']);
        go('index');
	}

	// 更新购物车
	public function updateCart(){
        $id=$_POST["id"];
        $num=$_POST["num"];
		$data=array( 
		    'sid'=>$id,// 唯一 sid，添加购物车时自动生成 
		    'num'=>$num
		); 
		Cart::update($data); 
        echo json_encode(true);
	}

	// 添加订单(包含添加收货地址)
	public function confirm(){

		// 保存页面当前路径
		$_SESSION['goUrl'] = __URL__;

        //可以得到上一页的地址(用来登录后又返回原网页)
        $_SESSION['urlshang']=$_SERVER['HTTP_REFERER'];

		// 判断是否等登录
		if(!isset($_SESSION['uid'])){
        	go(U('Index/index'));
		}
		// 判断购物车是否空如果空调到购物车页面
		$cartg=Cart::getGoods(); 
		if(empty($cartg)){
        	go(U('Cart/index'));
		}



		// 从session中得到数据
		$cartg=Cart::getGoods(); 
		// 判断是否空
		if(!empty($cartg)){
			// 重组数组，压上照片
			foreach ($cartg as $k => $v) {
				$cartg[$k]['imgs']=$this->model->where("gid='{$v["id"]}'")->pluck('list_pic');
			}
			// 分配数据
			$this->cartg=$cartg;
			// 分配商品总数
			$this->nums=Cart::getTotalNums(); 
			// 分配商品总价格
			$this->all_m=Cart::getTotalPrice();

		}else{
			// 如果空的话就返回空数组
			$this->cartg=[];
		}

		// 分配地址数据
        $address=new \Home\Model\Address;
        $this->adds=$address->orderBy('adid','DESC')->get();
        // p($address->get())

		View::make();
	}

	// 处理异步提交过来的地址数据
	public function addAdr(){
        $address=new \Home\Model\Address;
        $data=array(
        	'pca'=>$_POST['pca'],
        	'postcode'=>$_POST['postcode'],
        	'street_add'=>$_POST['street'],
        	'receipt_name'=>$_POST['receipt_name'],
        	'phone_number'=>$_POST['phone_num']
        );
        $address->add($data);
        echo json_encode(true);

	}

	// 用异步添加订单数据
	public function addOrder(){
		// 实例化订单表
		$morder=new \Common\Model\Morder;
		// 实例化订单列表
		$morder_list=new \Common\Model\Morder_list;
		// 实例化地址表
        $address=new \Home\Model\Address;
        //  地址id
        $address_adid=$_POST['add_id'];
        // 备注
        $translate=$_POST['description'];
        // 订单号
        $order_num=Cart::getOrderId();
        // 收货人名称
        $username=$address->where("adid='{$address_adid}'")->pluck('receipt_name');
        // 价格总计
        $all_price=Cart::getTotalPrice();

        // 添加订单
        $data=array(
        	'order_num'=>$order_num,
        	'username'=>$username,
        	'all_price'=>$all_price,
        	'create_time'=>time(),
        	'translate'=>$translate,
        	'order_type'=>0,
        	'user_uid'=>intval($_SESSION['uid']),
        	'address_adid'=>intval($address_adid)
        );
        // 添加到订单表
        $morder_oid=$morder->add($data);
        

        // 添加订单列表
     		
        // 从session中得到数据
		$cartg=Cart::getGoods();
		foreach ($cartg as $k => $v) {
			// 重组数据
	        $list_data=array(
	        	'seld_num'=>$v['num'],
	        	'info'=>implode(',',$v['options']),
	        	'total_price'=>$v['total'],
	        	'goods_gid'=>$v['id'],
	        	'morder_oid'=>$morder_oid
	        );
	        // 添加数据
	        $morder_list->add($list_data);

		}

		// 清掉购物车
        unset($_SESSION['cart']);

		echo json_encode($order_num);
	}

	// 付款
	public function paymoney(){
		// 判断是否等登录
		if(!isset($_SESSION['uid'])){
        	go(U('Index/index'));
		}
		
		// 接受订单号
		 $ddh=Q('get.ddh');
 		// 实例化订单表
		$morder=new \Common\Model\Morder;
		// 判断订单号是否存在数据库中，是不是未付款状态
		if($morder->where("order_num='{$ddh}'")->pluck('order_num')=='' || $morder->where("order_num='{$ddh}'")->pluck('order_type')!=0){
        	go(U('Index/index'));
		}





		// 总价
		$this->all_price=$morder->where("order_num='{$ddh}'")->pluck('all_price');
		$this->ddh=$ddh;


		View::make();
	}

	// 换成已付款状态
	public function paysuccess(){
		// 实例化订单表
		$morder=new \Common\Model\Morder;
        //  订单号
        $ddh=$_POST['ddh'];
        // 把类型变成1，表示已付款
        $data=array(
        	'order_type'=>1
        );
        $morder->where("order_num='{$ddh}'")->save($data);
		echo json_encode($ddh);
		exit();
	}

	// 显示已付款
	public function paysuc(){
		// 实例化订单表
		$morder=new \Common\Model\Morder;
		// 接受订单号
	 	$ddh=Q('get.ddh');

		// 判断订单号是否存在数据库中，是不是未付款状态
		if($morder->where("order_num='{$ddh}'")->pluck('order_num')=='' || $morder->where("order_num='{$ddh}'")->pluck('order_type')!=1){
        	go(U('Index/index'));
		}


		// 判断是否等登录
		if(!isset($_SESSION['uid'])){
        	go(U('Index/index'));
		}

		// 总价
		$this->all_price=$morder->where("order_num='{$ddh}'")->pluck('all_price');
	 	$this->ddh=$ddh;

		View::make();
	}



}