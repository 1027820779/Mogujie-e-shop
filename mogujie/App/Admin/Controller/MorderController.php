<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   订单控制器
class MorderController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Morder;
	}

	// 订单
	public function index(){
		// 分配订单数据
        $total=$this->model->count();
        $this->page=Page::row(10)->make($total);
        $this->morder=$this->model->orderBy('create_time','DESC')->limit(Page::limit())->get();
		$this->total=$total;
		View::make();
	}

	// 确认发货
	public function send(){
        $oid=Q('get.oid',0,'intval');
        // 把订单状态改成已发货状态
        $data=array(
        	'oid'=>$oid,
        	"order_type"=>2
        );
        $this->model->save($data);
        go(U('Morder/index'));   
	}

	// 查看订单列表
	public function seeOrder(){
		$oid=Q('get.oid',0,'intval');
        $this->order_num=Q('get.order_num',0,'');
        $this->translate=$this->model->where("oid='{$oid}'")->pluck("translate");
		$morder_list=new \Common\Model\Morder_list;
		$this->mdata=$morder_list->where("morder_oid='{$oid}'")->join('goods','gid','=','goods_gid')->get();
		// p($mdata);
		View::make();
	}








}