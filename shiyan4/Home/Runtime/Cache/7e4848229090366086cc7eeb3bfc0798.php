<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>人员搜索</title>
<script type="text/javascript" src="__PUBLIC__/default/js/jquery-1.7.2.min.js" ></script>
<link href="__PUBLIC__/default/css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--top -->
<div id="top">


<div class="warp1 mt">
	
</div>
<div class="clear"></div>

</div>

<div class="content">
	<div class="warp1 mt">

<div class="left f_l">
	<h3 class="flbt">搜索中心</h3>
	<div class="xbox">
	<form id="SearchForm" name="SearchForm" method="post" action="<?php echo ($searchurl); ?>">
	<ul class="searchFormDiv">
	<li>公司名：
	  <select name="modelid1">
	  	<option value = "">请选择公司名</option>
	  	<?php if(is_array($c)): foreach($c as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["c_name"]); ?></option><?php endforeach; endif; ?>
	   </select>
	</li>
	<li>部门名：
	  <select name="modelid2">
	  	<option value = "">请选择部门名</option>
	  	<?php if(is_array($p)): foreach($p as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["p_name"]); ?></option><?php endforeach; endif; ?>
	   </select>
	</li>
	<li>需要查找人员的关键字：
	  <input name="keyword" type="text" id="keyword"  value="<?php if(empty($keyword)): ?>请输入关键词<?php else: echo ($keyword); endif; ?>" onFocus="if(this.value=='请输入关键词'){this.value='';}" onBlur="if(this.value==''){this.value='请输入关键词';}" />
	</li>
	<li>
	  <input type="submit" value="查询" class="btn_green"/></li>
	</ul>
    </form>
	</div>
</div>
<div class="right f_r">
	<h3 class="nybt"><span>全部员工信息</span></h3>
	<div class="xbox wzzw ">	
	<div class="search_title">关键词： <span class="red"><?php echo ($keyword); ?></span></div>
	
	<ul >
	<?php if(empty($list)): ?><div>对不起，暂时没有员工的信息！</div>
	<?php else: ?>
	<table>
		<tr>
				<td width = "30px">ID</td>
				<td width = "80px">员工姓名</td>
				<td width = "80px">部门名称</td>
				<td width = "80px">公司名称</td>
		</tr>
	<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["p_name"]); ?></td>
			<td><?php echo ($v["c_name"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</table><?php endif; ?>
	
	</ul>

	<!--分页 -->
	<div class="scott mt"><?php echo ($page); ?>
	<div class="clear"></div>
	</div>
	
	</div>
	</div>
<div class=" clear"></div>
</div>
</div>


</body>
</html>