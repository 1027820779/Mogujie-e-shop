<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//列表控制器
class ListController extends Controller{

	private $model;
	//构造函数
	public function __init()
	{
        $this->model=new \Common\Model\Goods;
	}

	// 列表页
	public function index(){
		// 保存页面当前路径
		$_SESSION['goUrl'] = __URL__;

        //可以得到上一页的地址(用来登录后又返回原网页)
        $_SESSION['urlshang']=$_SERVER['HTTP_REFERER'];

        $cid=Q('get.cid',0,'intval');
        $cate=new \Common\Model\Cate;
        // // 列表图(如果有子类也要下显示子类)
        $goods=$this->model->where("category_cid='{$cid}'")->get();
        // 获得子类的id
        $check=$cate->where("pid='{$cid}'")->lists('cid');
        // 判断是不是有子类
        if(!empty($check)){
        	// 把数字形式变成字符串形式
	        $childs=implode(',',$cate->where("pid='{$cid}'")->lists('cid'));
	        // 从商品表获得属于子类的商品
	        $c_goods=$this->model->where("category_cid in (".$childs.") ")->get();
	        // 压倒属于父类的商品数据里
	        foreach ($c_goods as $k => $v) {
		        $goods[]=$v;
	        }
        }
        // 分配
        $this->goods=$goods;
        // 分类名称
        $this->cate_name=$cate->where("cid='{$cid}'")->pluck('cname');
		View::make();
	}

}