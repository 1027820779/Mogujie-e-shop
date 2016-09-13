<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   商品控制器
class GoodsController extends CommonController{

    // 商品模型
    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Goods;
	}	

	// 首页
	public function index(){
        $total=$this->model->count();
        $this->page=Page::row(10)->make($total);
        $this->gooddata=$this->model->orderBy('gid','DESC')->limit(Page::limit())->get();
        $this->total=$total;
		View::make();
	}

	// 添加
	public function add(){
        if(IS_POST){
            // p($_POST);
             // $this->model->addGoods();
            if(!$this->model->addGoods()) View::error($this->model->getError());
            View::success("添加商品成功",U('index'));            
        }

		// 分类
        $cate=new \Common\Model\Cate;
        $allCate=$cate->get();
        $this->cateData=Data::tree($allCate,'cname','cid');

        // 品牌
        $brand=new \Common\Model\Brand;
        $this->brandData=$brand->get();
		View::make();
	}

    // 删除
    public function delete(){
        if(!$this->model->deleteGoods()) View::error($this->model->getError());
        View::success("删除商品成功",U('index'));        
    }

    //uploadify异步上传
    public function upload()
    {
        $file = Upload::path('Upload/Content/' . date('y/m'))->make();
        if (empty($file)) {
            $this->ajax(Upload::getError());
        } else {
            /** $file内部就是以下这个数组
                $file = array(
                    0 => array(
                    'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
                    'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
                    'image' => 1
                ),
            );**/
            //上传成功，把上传好的信息返给js
            $data = $file[0];
            echo json_encode($data);exit;
        }
    }


	// 处理ajax
	public function getTypeAttr(){
		$tid = Q('post.id',0,'intval');
		$data = Db::table('attr_type')->where("type_tid={$tid}")->get();
		foreach ($data as $k => $v) {
			$data[$k]['tavalue'] = explode(',', $v['atvalue']);
		}
		echo json_encode($data);exit;
		
	}

    // 编辑商品
    public function edit(){
        // 处理提交过来的数据
        if(IS_POST){
            // p($_POST);
            // $this->model->editGoods();
            if(!$this->model->editGoods()) View::error($this->model->getError());
            View::success("修改货品成功",U('index'));    
        }

        $gid = Q('get.gid',0,'intval');
        $this->gid=$gid;
        $tid = Q('get.tid',0,'intval');
        $this->tid=$tid;
        // 所属分类
        $cate=new \Common\Model\Cate;
        $allCate=$cate->get();
        $this->cateData=Data::tree($allCate,'cname','cid');

        // 所属品牌
        $brand=new \Common\Model\Brand;
        $this->brandData=$brand->get();

        // 分配数据
        $this->goods_all=$this->model->where("gid='{$gid}'")->find();

        // 商品详情
        $con=new \Common\Model\Goods_con;
        $con_data=$con->where("goods_gid='{$gid}'")->find();
        $con_data['m_pics']=explode(',',$con_data['m_pics']);
        $this->con_data=$con_data;
        // p($con_data);

        // 列出显示属性，规格
        $goodsType=new \Common\Model\Goods_type;
        $attrs = $goodsType->join('attr_type','atid','=','attr_type_atid')->where("goods_gid={$gid}")->get();
        foreach ($attrs as $k => $v) {
          $val = explode(',', $v['atvalue']);
          $id = $v['gtid'];
          $attrs[$k]['attrvalue'] = $val;
        }
        $this->data=$attrs;
        // p($attrs);


        View::make();
    }



    // 货品列表
    public function lists(){
        // 处理提交过来的数据
        if(IS_POST){
            if(!$this->model->addLists()) View::error($this->model->getError());
            View::success("添加货品成功",U('index'));    
        }
        $gid = Q('get.gid',0,'intval');
        $this->gid=$gid;
        $tid = Q('get.tid',0,'intval');
        $this->tid=$tid;
        // 把规格信息压倒一个数组上
        $attr_type = new \Common\Model\AttrType;
        $goods_type = new \Common\Model\Goods_type;
        $data=$attr_type->where("type_tid={$tid} AND attr_cate=1")->get();
        foreach ($data as $k => $v) {
            $data[$k]['select']=$goods_type->where("goods_gid='{$gid}' AND attr_type_atid='{$v['atid']}'")->get();
        }
        $this->data=$data;
        // 分配数据
        $lists = new \Common\Model\lists;
        $lists_d=$lists->where("goods_gid='{$gid}'")->get();
        foreach ($lists_d as $k => $v) {
            $lists_d[$k]['ids']=$goods_type->where("gtid IN (".$v['ids'].")")->lists('g_type_value');
        }
        $this->lists_d=$lists_d;
        View::make();
    }

    // 修改货品表
    public function edit_lists(){
        // 处理post提交过来的数据
        if(IS_POST){
            if(!$this->model->edLists()) View::error($this->model->getError());
            View::success("修改货品成功",U('index'));    
        }
        $lid = Q('get.lid',0,'intval');
        $this->lid=$lid;
        $gid = Q('get.gid',0,'intval');
        $this->gid=$gid;
        $tid = Q('get.tid',0,'intval');
        // 把规格信息压倒一个数组上
        // 规格分配
        $attr_type = new \Common\Model\AttrType;
        $goods_type = new \Common\Model\Goods_type;
        $data=$attr_type->where("type_tid={$tid} AND attr_cate=1")->get();
        foreach ($data as $k => $v) {
            $data[$k]['select']=$goods_type->where("goods_gid='{$gid}' AND attr_type_atid='{$v['atid']}'")->get();
        }
        $this->data=$data;
        p($data);
        // 分配旧数据
        $lists = new \Common\Model\lists;
        $list_data=$lists->where("lid='{$lid}'")->get();
        $list_data[0]['ids']=explode(',',$list_data[0]['ids']);
        $this->list_data=$list_data;
        View::make();
    }

    // 删除货品表
    public function deleteList(){
        if(!$this->model->deleteList()) View::error($this->model->getError());
        View::success("删除货品成功",U('index'));   
    }






}