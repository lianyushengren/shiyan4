<?php

// 本类由系统自动生成，仅供测试用途
class SearchAction extends Action
{
    public function index()
    {
    	// 公司名称
		$compant = I('modelid1', 0, 'intval');
		// 部门名称
		$department = I('modelid2', 0, 'intval');
		// 关键字
		$keyword = I('keyword', '', 'htmlspecialchars,trim');
		
		if($keyword == '请输入关键词') $keyword = '';

		$list = "";
		if (!empty($compant) and !empty($department)) {
			$list = M()->query("SELECT w.id, w.name, d.p_name, c.c_name 
				FROM test_worker AS w, test_department AS d, test_com AS c
				WHERE w.com_id = c.id AND w.depart_id = d.id AND w.name LIKE '%$keyword%' 
				AND c.id = $compant AND d.id = $department"
			);
		}
		
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
