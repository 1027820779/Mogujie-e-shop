<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//   后台rbac(权限)控制器
class RbacController extends CommonController{

    private $model;
	public function __init(){
		parent::__init();
        $this->model=new \Common\Model\Admin;
	}

	// 用户列表
	public function user(){

		View::make();
	}

	// 角色列表
	public function role(){
		$role=new \Common\Model\Role;
		$this->role=$role->get();
		View::make();
	}

	// 添加角色
	public function addRole(){
		if(IS_POST){
			$role=new \Common\Model\Role;
            if(!$role->addRole()) View::error($role->getError());
            View::success("添加角色成功",U('role'));      
		}
		View::make();
	}

	// 节点列表
	public function node(){
		View::make();
	}


}
