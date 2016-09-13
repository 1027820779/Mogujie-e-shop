<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   订单控制器
class UserController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\User;
	}


	// 用户列表
	public function index(){
        $total=$this->model->count();
        $this->page=Page::row(10)->make($total);
        $this->user=$this->model->orderBy('uid','DESC')->limit(Page::limit())->get();
        $this->total=$total;
		View::make();
	}

	// 锁定用户
	public function addLock(){
        $uid=Q('get.uid',0,'intval');
        // 把订单状态改成已发货状态
        $data=array(
        	'uid'=>$uid,
        	"lock"=>1
        );
        $this->model->save($data);
        go(U('User/index'));   
	}

	// 解除锁定用户
	public function removeLock(){
        $uid=Q('get.uid',0,'intval');
        // 把订单状态改成已发货状态
        $data=array(
        	'uid'=>$uid,
        	"lock"=>0
        );
        $this->model->save($data);
        go(U('User/index'));   
	}


}