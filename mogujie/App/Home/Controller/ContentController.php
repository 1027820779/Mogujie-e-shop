<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//内容页控制器
class ContentController extends Controller{

	private $model;
	//构造函数
	public function __init()
	{
        $this->model=new \Common\Model\Goods;
	}

	// 内容页
	public function index(){
        // 保存页面当前路径
        $_SESSION['goUrl'] = __URL__;

        //可以得到上一页的地址(用来登录后又返回原网页)
        $_SESSION['urlshang']=$_SERVER['HTTP_REFERER'];

        $gid=Q('get.gid',0,'intval');

        //每次访问点击数增加+1
		$this->model->where("gid={$gid}")->increment('click',1); 

        // 基本信息
        $this->goods=$this->model->where("gid='{$gid}'")->find();
       // p($this->model->where("gid='{$gid}'")->find());
        // 商品详情
        $goods_con=new \Common\Model\Goods_con;
        $goods_conn=$goods_con->where("goods_gid='{$gid}'")->find();
        $this->goods_con=$goods_conn;

        // 小图册
        $this->l_pics=explode(',',$goods_conn['m_pics']);
        // 图层图数
        $this->pic_count=count(explode(',',$goods_conn['m_pics']));

        // 规格
        $goods_type=new \Common\Model\Goods_type;
        $attr=$goods_type->join('attr_type','attr_type_atid','=','atid')
                ->where("goods_gid='{$gid}' AND attr_cate=1")->get();
        $this->attr=$attr;

        // 看了又看(随便获取五个不重复的商品)
        $g_ids=$this->model->get();
        $arr=array();
        foreach ($g_ids as $k => $v) {
        	array_push($arr,$v['gid']);
        }
        $ids=[];
        if(count($arr)>=5){
            $length=5;
        }else{
            $length=count($arr);
        }
        for($i=0;$i<$length;$i++){
        	$ran=floor(rand(0,count($arr)-1));
        	$ids[]=$arr[$ran];
        	array_splice($arr,$ran,1);
        }
        $this->moudule=$this->model->where("gid in (".implode(',',$ids).")")->get();

        // 判断商品是否收藏
        $collect=new \Home\Model\Collect;
        if(isset($_SESSION['uid'])){
            $uid=$_SESSION['uid'];
            if($collect->where("goods_gid='{$gid}' and user_uid='{$uid}'")->get()){
                $this->collect=1;
            }else{
                $this->collect=0;
            }
        }



        // 热门推荐(按照点击数最多的)
       $this->go=$this->model->orderBy('click','DESC')->limit(3)->get();
       // unset($_SESSION['goods']['515568b8']);
       // p($_SESSION);
		View::make();
	}

    // 加入购物车
    public function addCart(){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $num=$_POST["num"];
        $price=$_POST["price"];
        $color=$_POST["color"];
        $size=$_POST["size"];
        $data = array(
            'id'        => $id, // 商品 ID 
            'name'      =>$name,// 商品名称 
            'num'       => $num, // 商品数量 
            'price'     => $price, // 商品价格 
            'options' => array(// 其他参数如价格、颜色、可以为数组或字符串 
                'color'     => $color, 
                'size'  => $size 
            )
        ); 
        // 添加到购物车 
        Cart::add($data);
        echo json_encode(true);
       
    }

    // 收藏
    public function addCollect(){
        $goods_gid=$_POST["gid"];
        $user_uid=$_SESSION['uid'];
        $collect=new \Home\Model\Collect;
        if(!$collect->where("goods_gid='{$goods_gid}' and user_uid='{$user_uid}'")->get()){
            $data=array(
                'user_uid'=>$user_uid,
                'goods_gid'=>$goods_gid
            );
            $collect->add($data);
            echo "ok";
        }else{
            echo "no";
        }
    }


}
	