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
	<li>
	  <select name="modelid">
	  	<?php if(is_array($method_list)): foreach($method_list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo (str_replace('查找','',$vo["method"])); ?></option><?php endforeach; endif; ?>
	   </select>
	</li>
	<li>
	  <input name="keyword" type="text" id="keyword"  value="<?php if(empty($keyword)): ?>请输入关键词<?php else: echo ($keyword); endif; ?>" onFocus="if(this.value=='请输入关键词'){this.value='';}" onBlur="if(this.value==''){this.value='请输入关键词';}" />
	</li>
	<li>
	  <input type="submit" value="查询" class="btn_green"/></li>
	</ul>
    </form>
	</div>
</div>
<div class="right f_r">
	<h3 class="nybt"><span>搜索结果</span></h3>
	<div class="xbox wzzw ">	
	<div class="search_title">关键词： <span class="red"><?php echo ($keyword); ?></span></div>
	
	<ul >
	<?php if(empty($list)): ?><div>对不起，暂时没有员工的信息！</div>
	<?php else: ?>	
	<?php if(is_array($list)): foreach($list as $key=>$v): ?><li><span><?php echo ($v["id"]); ?></span><span><?php echo ($v["name"]); ?></span><span><?php echo ($v["p_name"]); ?></span><span><?php echo ($v["c_com"]); ?></span></li><?php endforeach; endif; endif; ?>
	
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