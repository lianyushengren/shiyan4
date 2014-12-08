<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$User = M();	//设置空实例
		$list = $User->query("SELECT w.id, w.name, d.p_name, c.c_name FROM test_worker AS w, test_department AS d, test_com AS c
								WHERE w.com_id = c.id AND w.depart_id = d.id");	//进行跨表查询，得到员工的部门和公司信息
		
		$method = M('method');	//设置表method的实例
		$method_list = $method->select();	//获得查询方法的信息
		
		/**
		分页输出部分
		*/
		
		$this->assign('method_list', $method_list);	//进行赋值
		$this->assign('list', $list);	//进行赋值
		$this->searchurl = U('Search/index');
		$this->display();	//把变量输出到视图中
		//print_r($list);		
    }
}