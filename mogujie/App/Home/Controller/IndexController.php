<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台首页控制器
class IndexController extends Controller{

	private $model;
	//构造函数
	public function __init()
	{
        $this->model=new \Common\Model\Cate;
	}
	
    //前台首页控制器
    public function index(){
        // 保存页面当前路径
        $_SESSION['goUrl'] = __URL__;
        //可以得到上一页的地址(用来登录后又返回原网页)
        $_SESSION['urlshang']='';

    	// 显示分类
    	$this->navigat=$this->model->where("pid=0")->orderBy('sort','ASC')->limit(6)->get();
    	$menu=$this->model->orderBy('sort','ASC')->get();
    	// 重组
    	$this->menu=Data::channelLevel($menu, $pid = 0, $html = "&nbsp;", $fieldPri = 'cid', $fieldPid = 'pid', $level = 1);
 
   		View::make();
    }



}
