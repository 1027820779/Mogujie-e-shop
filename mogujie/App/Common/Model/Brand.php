<?php namespace Common\Model;

use Hdphp\Model\Model;

class Brand extends Model{
    // 指定用户表
    protected $table = "brand";


    // 自动验证
	protected $validate=array(
		array("bname","required","名称不能为空",3,3),
	);

	// 自动完成
	protected $auto=array(
		array("logo","logo","method",3,3)
	);

	// 添加品牌
	public function store(){

		if(!$this->create()) return false;
		if($error=Upload::getError()){
			// 给当前模型压入错误
			$this->error=$error;
			return false;
		}
		$aid=$this->add();
		return true;
	}

	// 编辑品牌
	public function edit(){
		// 一.触发两张表的自动验证
		if(!$this->create()) return false;
		// 如果上传失败
		if($error=Upload::getError()){
			// 给当前模型压入错误
			$this->error=$error;
			return false;
		}

		// 二，修改
		$this->save();
		return true;

	}	

	// 上传图,缩略图
	public function logo(){
		// 如果有文件上传
		// p($_FILES);
		// 如果编辑的时候，只显示图片的时候，没有file类型的表单，所以不存在$_FILES['thumb']
		if(isset($_FILES['logo']) && $_FILES['logo']['error'] != 4){
			$files=Upload::type('jpg,png,gif')->size(200000)->make();
			// 如果上传成功，返回对应的地址
			if($files){
				// p($files);exit;
				// 处理缩略图的文件名
				$newPath=str_replace('.'. $files[0]["ext"],"_thumb.".$files[0]["ext"],$files[0]['path']);
				// 缩略，返回缩略图的地址
				$thumbPath=Image::thumb($files[0]['path'],$newPath,88,31,2);
				// 存到数据库
				return $thumbPath;
			}
		}
		// 编辑的时候：如果有隐藏域$_POST['thumb']）的时候，那么就是返回旧地址
		if($thumb=Q('post.logo')){
			return $thumb;
		}
		// 如果用户没有上传，则返回空字符串存入数据
		return '';
		// if(file_exists('./b/zuoye.php')){
		// unlink('./b/zuoye.php');
	}	

    // 排序品牌
    public function brandCate(){
        $data=$_POST;
        if(!empty($_POST)){
            foreach ($data as $k => $v) {
                $this->save(array('bid'=>$k,'bsort'=>$v));
            }
            return true;
        }else{
            $this->error="排序失败";
            return false;
        }
    }




}