<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台分类控制器
class CateController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Cate;
	}

    // 分类列表
    public function index(){
        if(IS_POST){
            if(!$this->model->sortCate()) View::error($this->model->getError());
            go(U('Cate/index'));
        }
        $cate=$this->model->join('type','tid','=','type_tid')->orderBy('sort','ASC')->get();
        $this->cateData=Data::tree($cate,'cname','cid');
        View::make();
    }

    // 添加分类
    public function add(){
        if(IS_POST){
            if(!$this->model->addCate()) View::error($this->model->getError());
            View::success("添加分类成功",U('index'));   
        }
        // 分类
        $data=$this->model->get();
        $this->dataCate=Data::tree($data,'cname','cid');
        // 类型
        $type=new \Common\Model\Type;
        $this->typeData=$type->get();
        View::make();
    }

    // 添加子类
    public function addSon(){
        if(IS_POST){
            if(!$this->model->addSonCate()) View::error($this->model->getError());
            View::success("添加子类成功",U('index'));  
        }
        $cid=Q('get.cid',0,'intval');
        $this->parent=$this->model->join('type','tid','=','type_tid')->where("cid={$cid}")->find();
        // $type=new \Admin\Model\Type;
        // $this->typeData=$type->get();
        View::make();
    }

    // 编辑分类
    public function edit(){
        if(IS_POST){
            if(!$this->model->editCate()) View::error($this->model->getError());
            View::success("修改成功",U('index'));
        }
        // 原数据
        $cid=Q('get.cid',0,'intval');
        $this->cid=$cid;
        $this->cate=$this->model->where("cid={$cid}")->find();
        // 分类(不带子类)
        $this->cateData=$this->model->getNoChild($cid);
        // 类型
        $type=new \Common\Model\Type;
        $this->typeData=$type->get();        
        View::make();
    }

    // 删除分类
    public function del(){
        $cid=Q('get.cid',0,'intval');
        // 1.获得要删除的分类的pid
        // pluck获得指定的字段值
        $pid=$this->model->where("cid={$cid}")->pluck("pid");
        // 2.让子集上移一位，就爱hi把子集类的pid变成要删除分类的pid
        $this->model->where("pid={$cid}")->save(array('pid'=>$pid));
        // 3.删除对应的分类
        $this->model->where("cid=$cid")->delete();
        View::success("删除成功");
    }

    


}