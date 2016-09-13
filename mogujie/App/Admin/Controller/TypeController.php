<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台分类控制器
class TypeController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Type;
	}

    // 类型列表
    public function index(){
        $total=$this->model->count();
        $this->page=Page::row(10)->make($total);
        $this->type=$this->model->limit(Page::limit())->get();
        $this->total=$total;
        View::make();
    }

    // 添加类型
    public function add(){
        if(IS_POST){
            if(!$this->model->addType()) View::error($this->model->getError());
            View::success("添加类型成功",U('index'));            
        }
        View::make();
    }

    // 编辑
    public function edit(){
        if(IS_POST){
            if(!$this->model->editType()) View::error($this->model->getError());
            View::success("修改类型成功",U('index'));         
        }
        $tid=Q('get.tid',0,'intval');
        $this->type=$this->model->where("tid='{$tid}'")->find();
        View::make();
    }

    // 删除
    public function delete(){
       if(!$this->model->deleteType()) View::error($this->model->getError());
        View::success("删除类型成功",U('index'));     
    }

    // 属性列表
    public function attr_type(){
        $tid=Q('get.tid',0,'intval');
        $attr_type=new \Common\Model\AttrType;
        $tname=$this->model->where("tid='{$tid}'")->pluck('tname');
        $this->attr=$attr_type->where("type_tid='{$tid}'")->get();
        View::with('tname',$tname);
        View::with('tid',$tid);
        View::make();
    }

    // 添加属性
    public function attr_type_add(){
        $tid=Q('get.tid',0,'intval');
        if(IS_POST){
            // p($_POST);

            $attr=new \Common\Model\AttrType;
            if(!$attr->addAttr()) View::error($attr->getError());
            View::success("添加成功",U('index'));       
        }
        View::with('tid',$tid);
        View::make();
    }

    // 删除属性
    public function attrDelete(){
        $attr=new \Common\Model\AttrType;
       if(!$attr->deleteAttr()) View::error($attr->getError());
        View::success("删除分类成功",U('index'));     
    }

    // 属性编辑
     public function attr_type_edit(){
        $attr=new \Common\Model\AttrType;
        if(IS_POST){
            // p($_POST);
            if(!$attr->editAttr()) View::error($attr->getError());
            View::success("修改分类成功",U('index'));         
        }
        $atid=Q('get.atid',0,'intval');
        $this->attr=$attr->where("atid='{$atid}'")->find();
        View::with('atid',$atid);
        View::make();
    }
    


}