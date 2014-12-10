<?php

class ManageAction extends Action
{
	// 默认后台登录页面
	public function index()
	{
		if (ManageAction::checkEnv()) {
			import("ORG.Util.Page");
			$worker = M('worker');
			// 统计数据库中的记录数
			$count = $worker->count();
			// 实例化分页类
			$Page = new Page($count,8);
			// 获取分页超级链接
			$show = $Page->show();
			// 执行分页查询
			$list = $worker->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->query(
				"SELECT w.id, w.name, d.p_name, c.c_name 
				FROM test_worker AS w, test_department AS d, test_com AS c 
				WHERE w.com_id = c.id AND w.depart_id = d.id"
			);
			// 将分页查询结果赋给模板变量
			$this->assign('list', $list);
			// 将获取的分页超级链接赋给模板变量
			$this->assign('page', $show);
        	$this->display();
    	}
    }
    
    // 数据的处理方法
	public function common()
	{
		// 实例化模型				
		$worker = M('worker');
		// 判断是否是添加操作			
		if ($_GET['handle'] == 'insert') {
			// 判断用户的权限
			if (ManageAction::checkEnv()) {
				// 实例化公司名
				$com  = M('com');
				// 执行查询操作
				$data2 = $com->select();
				// 将查询结果赋给模板变量
				$this->assign('data2', $data2);
				$department =M('department');
				$data3=$department->select();
				$this->assign('data3',$data3);
				
				// 判断提交按钮是否被设置
				if (isset($_POST['button'])) {
					// 获取表单提交的数据	
					$data['com_id']=$_POST['c_name'];			
					$data['depart_id']=$_POST['p_name'];
					$data['name']=$_POST['name'];
					$data['description']=$_POST['des'];

					// 执行数据的添加操作
					$data = $worker->data($data)->add();
					if ($data != false) {
						$this->assign('hint', '数据添加成功！');
						$this->assign('url', 'adminIndex?type_link=data&handle=admin');
						$this->display('information');
					} else {
						$this->assign('hint', '添加失败！');
						$this->assign('url', 'adminIndex?type_link=data&handle=insert');
						$this->display('information');
					}
				}
			}
		} else {
			import("ORG.Util.Page");
			// 统计数据库中的记录数
			$count=$worker->count();
			// 实例化分页类
			$Page=new Page($count, 8);
			// 获取分页超级链接
			$show= $Page->show();
			// 执行分页查询
			$list = $worker->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->query(
				"SELECT w.id, w.name, d.p_name, c.c_name 
				FROM test_worker AS w, test_department AS d, test_com AS c 
				WHERE w.com_id = c.id AND w.depart_id = d.id"
			);
			// 将分页查询结果赋给模板变量
			$this->assign('list', $list);
			// 将获取的分页超级链接赋给模板变量
			$this->assign('page', $show);
		}
	}

	// 后台管理系统主页
	public function adminIndex()
	{
		// 判断是否具有访问权限		
		if (ManageAction::checkEnv()) {
			// 根据超级链接传递的变量值输出对应的内容
			switch($_GET['type_link']){
				case "data":
					ManageAction::common();
					break;
				default:
					ManageAction::common();
			}
			//指定模板页
			$this->display('index');
		}
	}
	
	// 删除数据方法
	function deletedata()
	{
		// 判断是否具有删除权限
		if (ManageAction::checkEnv()) {
			// 获取超级链接传递的ID值
			$cl=urldecode($_GET['link_id']);
			// 实例化模型类
			$new=M('common');
			// 执行删除语句
			$new=$new->execute("delete from test_worker where id in (". $cl .")");
			if($new!=false){
				$this->assign('hint', '数据删除成功！');
				$this->assign('url', 'adminIndex?type_link=data&handle=admin');
				$this->display('information');
			}else{
				$this->assign('hint', '出现未知错误！');
				$this->assign('url', 'adminIndex?type_link=data&handle=admin');
				$this->display('information');
			}
		}
	}
	
	// 退出登录
	public function logout(){
		if(ManageAction::checkEnv()){
			session('[destroy]');
			$this->assign('hint', '管理员退出');
			$this->assign('url', '__ROOT__/admin.php');
			$this->display('information');
		}
    }

    /** 验证用户是否合法
    * @ruturn $login
    */
    public function checkEnv(){
    	//判断用户名和密码是否正确
		if(session(C('USER_AUTH_KEY')) != "Yes"){
			$this->assign('hint', '您不是权限用户');
			$this->assign('url', '__ROOT__/admin.php');
			$this->display('information');
			$login=false;
		}else{
			$login=true;
		}
		// 返回判断结果
		return $login;
    }
}
