<?php
// 本类由系统自动生成，仅供测试用途
class SearchAction extends Action {
    public function index(){
		$modelid = I('modelid', 0,'intval');	
		$keyword = I('keyword', '', 'htmlspecialchars,trim');	//关键字
		
		if($keyword == '请输入关键词') $keyword = '';
		$list = "";
		if(!empty($modelid) and !empty($keyword)){
			
			switch($modelid){
				case 1:
					$list = M()->query("SELECT w.id, w.name, d.p_name, c.c_name FROM test_worker AS w, test_department AS d, test_com AS c
								WHERE w.com_id = c.id AND w.depart_id = d.id AND c.c_name LIKE '%$keyword%'");
					break;
				case 2:
					$list = M()->query("SELECT w.id, w.name, d.p_name, c.c_name FROM test_worker AS w, test_department AS d, test_com AS c
								WHERE w.com_id = c.id AND w.depart_id = d.id AND d.p_name LIKE '%$keyword%'");
					break;
				case 3:
					$list = M()->query("SELECT w.id, w.name, d.p_name, c.c_name FROM test_worker AS w, test_department AS d, test_com AS c
								WHERE w.com_id = c.id AND w.depart_id = d.id AND w.name LIKE '%$keyword%'");
					break;
				default:
					$list = '';
					break;
			}
		}
		
		$method = M('method');	//设置表method的实例
		$method_list = $method->select();	//获得查询方法的信息
		
		$this->assign('method_list', $method_list);	//进行赋值
		$this->assign('list', $list);	//进行赋值
		$this->modelid = $modelid;
		$this->keyword = $keyword;
		$this->searchurl = U('Search/index');
		$this->display();	//把变量输出到视图中
    }
}
