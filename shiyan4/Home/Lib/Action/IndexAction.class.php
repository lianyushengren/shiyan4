<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action
{
    public function index()
    {
    	// 设置空实例
		$User = M();
		// 进行跨表查询，得到员工的部门和公司信息
		$list = $User->query(
			"SELECT w.id, w.name, d.p_name, c.c_name 
			FROM test_worker AS w, test_department AS d, test_com AS c
			WHERE w.com_id = c.id AND w.depart_id = d.id"
		);
		
		// 设置表com的实例
		$com = M('com');
		// 获得查询方法的信息
		$c = $com->field("id,c_name")->select();

		// 设置表department的实例
		$department = M('department');
		// 获得查询信息
		$p = $department->field("id,p_name")->select();
		
		// 分页输出部分
		$this->assign('c', $c);
		$this->assign('p', $p);
		$this->assign('list', $list);
		$this->searchurl = U('Search/index');
		// 把变量输出到视图中
		$this->display();			
    }
}