<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理</title>
<link href="__ROOT__/Public/Css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table id="__01" width="960" height="541" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3">
			<img src="__ROOT__/Public/IMAGES/_HTML_01.GIF" width="217" height="65" alt=""></td>
		<td colspan="2">
			<img src="__ROOT__/Public/IMAGES/_HTML_02.GIF" width="743" height="65" border="0" usemap="#Map" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="__ROOT__/Public/IMAGES/_HTML_03.GIF" width="960" height="26" alt=""></td>
	</tr>
	<tr>
		<td width="138" height="425" background="__ROOT__/Public/IMAGES/_HTML_08.JPG" align="center" valign="top">
        <table width="135" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td width="10">&nbsp;</td>
		    <td width="120" height="25" align="center"><a href="__URL__/adminIndex?type_link=data&handle=insert">数据添加</a></td>
		    <td width="5"></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td width="120" height="25" align="center"><a href="__URL__/adminIndex?type_link=data&handle=admin">数据管理</a></td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td width="120" height="25" align="center">&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td>&nbsp;</td>
		    <td width="120" height="25" align="center"><a href="__URL__/logout">退出</a></td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td width="120" height="25" align="center">&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>

	    </table>
        </td>
		<td rowspan="4" width="24" height="425" background="__ROOT__/Public/IMAGES/_HTML_05.GIF">
		</td>
		<td colspan="2" rowspan="4" width="759" height="425"
			align="center" valign="top">
			
			<?php switch($$Think["get"]["type_link"]): default: switch($_GET['handle']): case "insert": ?><form name="form1" method="post" action="__URL__/common?type_link=data&handle=insert">
<table width="750" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2" align="center">数据添加</td>
  </tr>
  <tr>
    <td width="178" align="right">类别选择</td>
    <td width="559" align="left" >
     <select name="c_name" id="c_name" >
       <option selected="selected">请选择公司名</option>
      <?php if(is_array($data2)): foreach($data2 as $key=>$result2): ?><option value="<?php echo ($result2["Id"]); ?>"><?php echo ($result2["c_name"]); ?></option><?php endforeach; endif; ?>
    </select>
     <select name="p_name" id="p_name" >
       <option selected="selected">请选择部门名</option>
      <?php if(is_array($data3)): foreach($data3 as $key=>$result3): ?><option value="<?php echo ($result3["id"]); ?>"><?php echo ($result3["p_name"]); ?></option><?php endforeach; endif; ?>
    </select>
     *请选择其中一项类别
	</td>
  </tr>
  <tr>
    <td align="right">员工名称</td>
    <td align="left"><input name="name" type="text" id="name" size="40"></td>
  </tr>
   <tr>
    <td align="right">自我描述</td>
    <td align="left"><input name="des" type="text" id="des" size="40"></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="提交">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="button2" id="button2" value="重置"></td>
  </tr>
</table>
</form><?php break;?>
	<?php case "admin": ?><table width="750" border="1" cellspacing="1" cellpadding="1">
        <tr>
          <td>ID</td>
          <td>公司名称</td>
          <td>部门名称</td>
          <td>员工姓名</td>
          <td>操作</td>
        </tr>
		
        <?php if(is_array($list)): foreach($list as $key=>$result): ?><tr>
          <td><?php echo ($result["id"]); ?></td>
          <td><?php echo ($result["c_name"]); ?></td>
          <td><?php echo ($result["p_name"]); ?></td>
          <td><?php echo ($result["name"]); ?></td>
          <td><a href="__URL__/deletedata?type_link=data&handle=admin&link_id=<?php echo ($result["id"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; ?>
        <tr>
          <td colspan="5"><?php echo ($page); ?></td>
        </tr>
      </table><?php break;?>
	<?php default: ?>
    	  <table width="750" border="1" cellspacing="1" cellpadding="1">
        <tr>
          <td>ID</td>
          <td>公司名称</td>
          <td>部门名称</td>
          <td>员工姓名</td>
          <td>操作</td>
        </tr>
		
        <?php if(is_array($list)): foreach($list as $key=>$result): ?><tr>
          <td><?php echo ($result["id"]); ?></td>
          <td><?php echo ($result["c_name"]); ?></td>
          <td><?php echo ($result["p_name"]); ?></td>
          <td><?php echo ($result["name"]); ?></td>
          <td><a href="__URL__/deletedata?type_link=data&handle=admin&link_id=<?php echo ($result["id"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; ?>
        <tr>
          <td colspan="5"><?php echo ($page); ?></td>
        </tr>
      </table><?php endswitch; endswitch;?>
			

		</td>
</body>
</html>