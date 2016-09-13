<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台分类控制器
class BrandController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Brand;
	}

	// 商品列表
	public function index(){
        if(IS_POST){
            if(!$this->model->brandCate()) View::error($this->model->getError());
            go(U('Brand/index'));
        }
		$this->brandData=$this->model->orderBy('bsort','ASC')->get();
		View::make();
	}

	// 添加商品
	public function add(){
		if(IS_POST){
			if(!$this->model->store()) View::error($this->model->getError());
			View::success("添加成功",U('index'));
		}
		View::make();
	}

	// 删除商品
	public function del(){
		$bid=Q('get.bid',0,'intval');
		if(!$this->model->where("bid=$bid")->delete()){
			View::error("删除失败");
		}
		View::success("删除成功");
	}

	// 编辑商品
	public function edit(){
		if(IS_POST){
			// 文章添加
			if(!$this->model->edit()) View::error($this->model->getError());
			View::success("添加成功",U('index'));
		}
		//获得旧内容
		$bid=Q('get.bid',0,'intval');
		$this->oldData=$this->model->where("bid=$bid")->find();
		View::make();
	}



}