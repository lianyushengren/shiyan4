<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
   
	public function index(){
		$this->searchurl = U('Index/login');
		$this->verifyurl = U('Index/verif');
		$this->display();
	}


	//登录验证
	public function login(){

		if (!IS_POST)  halt('页面不存在');

		$username = I('username','','trim');
		$password = I('password','');
		$verify = I('code','','md5');
	
		if ($_SESSION['verify'] != $verify) {
			$this->error('验证码不正确');
		}


		if ($username == '' || $password == '') {
			$this->error('账号或密码不能为空');
		}

		$user = M('admin')->where(array('name' => $username))->find();

		if (!$user || ($user['password'] != $password)) {
			$this->error('账号或密码错误');
		}

		
		

		//保存Session
		session(C('USER_AUTH_KEY'), $user['id']);
		session('yang_adm_username', $user['name']);
		

		//超级管理员
		if (9 == $user['usertype']) {
			session(C('ADMIN_AUTH_KEY'),true);
		}

		import('ORG.Util.RBAC');
		RBAC::saveAccessList();//静态方法，读取权限放到session


		//跳转
		$this->redirect('/Manage/');
		


	}


	//退出
	public function logout() {

		session_unset();
		session_destroy();
		$this->redirect('/Index/index');
	}



	//登录验证码
	public function verify(){

		//导入ThinkPHP扩展类库
		//文件位置：./ThinkPHP/Extend/Library/ORG/Util/Image.class.php
		import('ORG.Util.Image');//导入验证码Image类库
		return Image::buildImageVerify(4, 1);//直接调用类静态方法
	}

	//js 用户名
	public function checkusername() {
		$username = I('username','','trim');
		$id = I('id', 0,'intval');
		if (empty($username)) {
			exit(0);
		}
		$user = M('admin')->where(array('username' => $username, 'id' => array('neq' , $id)))->find();
		if ($user) {
			echo 1;
		}else {
			echo 0;
		}
	}
	//js email
	public function checkemail() {
		$email = I('email','','trim');
		$id = I('id', 0,'intval');

		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			exit(-1);
		}

		$user = M('admin')->where(array('email' => $email, 'id' => array('neq' , $id)))->find();
		if ($user) {
			echo 1;
		}else {
			echo 0;
		}
	}
	//js密码
	public function checkpassword() {
		$username = I('username','','trim');		
		$password = I('password','');
		if (empty($username) || $password == '') {
			exit(0);
		}
		$user = M('admin')->where(array('username' => $username))->find();
		if ($user && $user['password'] == get_password($password, $user['encrypt'])) {
			echo 1;
		}else {
			echo 0;
		}
	}

	//js验证码
	public function checkcode() {
		$verify = I('code','','md5');
	
		if ($_SESSION['verify'] == $verify) {
			echo 1;
		}else {
			echo 0;
		}
	}



	//RBAC

	//js 角色名
	public function checkRoleName() {
		$name = I('name','','trim');
		$id = I('id', 0,'intval');
		if (empty($name)) {
			exit(0);
		}
		$data = M('role')->where(array('name' => $name, 'id' => array('neq' , $id)))->find();
		if ($data) {
			echo 1;
		}else {
			echo 0;
		}
	}

	//js 节点名//debug
	public function checkNodeName() {
		$name = I('name','','trim');
		$id = I('id', 0,'intval');
		if (empty($name)) {
			exit(0);
		}
		$data = M('node')->where(array('name' => $name, 'id' => array('neq' , $id)))->find();
		if ($data) {
			echo 1;
		}else {
			echo 0;
		}
	}
    
}