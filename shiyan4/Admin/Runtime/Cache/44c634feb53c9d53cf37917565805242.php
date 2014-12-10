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
			<img src="__ROOT__/Public/images/_html_01.gif" width="217" height="65" alt=""></td>
		<td colspan="2">
			<img src="__ROOT__/Public/images/_html_02.gif" width="743" height="65" border="0" usemap="#Map" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="__ROOT__/Public/images/_html_03.gif" width="960" height="26" alt=""></td>
	</tr>
	<tr>
		<td width="138" height="425" background="__ROOT__/Public/images/_html_08.jpg" align="center" valign="top">
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
		<td rowspan="4" width="24" height="425" background="__ROOT__/Public/images/_html_05.gif">
		</td>
		<td colspan="2" rowspan="4" width="759" height="425"
			align="center" valign="top">
			<?php echo ($_GET['type_link']); ?>
			<?php switch($$Think["get"]["type_link"]): case "data": ?>xiexei<?php break;?>
			<?php case "file": break;?>
			<?php default: switch($_GET['handle']): case "insert": ?><form name="form1" method="post" action="__URL__/common?type_link=data&handle=insert">
<table width="750" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="2" align="center">数据添加</td>
  </tr>
  <tr>
    <td width="178" align="right">类别选择</td>
    <td width="559" align="left" >
     <select name="middleid" id="middleid" >
       <option selected="selected">请选择</option>
      <?php if(is_array($data2)): foreach($data2 as $key=>$result2): ?><option value="<?php echo ($result2["id"]); ?>"><?php echo ($result2["ChineseName"]); ?></option><?php endforeach; endif; ?>
    </select>
     <select name="elementaryid" id="elementaryid" >
       <option selected="selected">请选择</option>
      <?php if(is_array($data3)): foreach($data3 as $key=>$result3): ?><option value="<?php echo ($result3["id"]); ?>"><?php echo ($result3["ChineseName"]); ?></option><?php endforeach; endif; ?>
    </select>
     <select name="smallid" id="smallid" >
     <option selected="selected">请选择</option>
     <?php if(is_array($data4)): foreach($data4 as $key=>$result4): ?><option value="<?php echo ($result4["id"]); ?>"><?php echo ($result4["ChineseName"]); ?></option><?php endforeach; endif; ?>
    </select>*请选择其中一项类别
	</td>
  </tr>
  <tr>
    <td align="right">名称</td>
    <td align="left"><input name="title" type="text" id="title" size="40"></td>
  </tr>
   <tr>
    <td align="right">链接地址</td>
    <td align="left"><input name="href" type="text" id="href" size="40"></td>
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
          <td>名称</td>
          <td>链接地址</td>
          <td>所属类别</td>
          <td>操作</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$result): ?><tr>
          <td><?php echo ($result["id"]); ?></td>
          <td><?php echo ($result["title"]); ?></td>
          <td><?php echo ($result["href"]); ?></td>
          <td>
          <?php if(($result["middleid"] != 0 ) and ($result["elementaryid"] != 0) and ($result["smallid"] != 0 )): ?>中级类别/初级类别/子类别
		  <?php elseif(($result["middleid"] != 0 ) and ($result["elementaryid"] != 0)): ?>
		          中级类别/初级类别
		  <?php elseif(($result["elementaryid"] != 0) and ($result["smallid"] != 0)): ?>
		         初级类别/子类别
		  <?php elseif(($result["middleid"] != 0 ) and ($result["smallid"] != 0)): ?>
		          中级类别/子类别    
		  <?php elseif($result["middleid"] != 0 ): ?>
		          中级类别
		 <?php elseif($result["elementaryid"] != 0 ): ?>
		          初级类别
		  <?php else: ?>
		          子类别<?php endif; ?>
          </td>
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
          <td>名称</td>
          <td>链接地址</td>
          <td>所属类别</td>
          <td>操作</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$result): ?><tr>
          <td><?php echo ($result["id"]); ?></td>
          <td><?php echo ($result["title"]); ?></td>
          <td><?php echo ($result["href"]); ?></td>
          <td>
          <?php if(($result["middleid"] != 0 ) and ($result["elementaryid"] != 0) and ($result["smallid"] != 0 )): ?>中级类别/初级类别/子类别
		  <?php elseif(($result["middleid"] != 0 ) and ($result["elementaryid"] != 0)): ?>
		          中级类别/初级类别
		  <?php elseif($result["middleid"] != 0 ): ?>
		          中级类别
		  
		  <?php else: ?>
		          子类别<?php endif; ?>
          </td>
          <td><a href="__URL__/deletedata?type_link=data&handle=admin&link_id=<?php echo ($result["id"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; ?>
        <tr>
          <td colspan="5"><?php echo ($page); ?></td>
        </tr>
      </table><?php endswitch; endswitch;?>
			

		</td>
</body>
</html>