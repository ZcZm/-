<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教师首页</title>
    <link rel="stylesheet" href="/Grade_Serching_System/Public/css/teacher_index.css" />
</head>

<body class="all">

	<div class="A">
		<div class="link"><a href="/Grade_Serching_System/index.php/Admin/Teacher/add.html">添加课程</a></div>
		<div class="link"><a href="/Grade_Serching_System/index.php/Admin/Teacher/coulist.html/">管理课程</a></div>
		<div class="link"><a href="/Grade_Serching_System/index.php/Admin/change/index">修改密码</a></div>
		<div class="link"><a href="/Grade_Serching_System/index.php/Admin/Index/logout">退出登录</a></div>
	</div>
	<div class="B"></div>
	<div class="title">教师基本信息</div>
	<table cellspacing="0" class="table">
		<tr>
			<td class="td1">工号</td>
			<td class="td2"><?php echo ($data["teano"]); ?></td>
			<td class="td1">姓名</td>
			<td class="td2"><?php echo ($data["teaname"]); ?></td>
		</tr>
		<tr>
			<td class="td1">班级编号</td>
			<td class="td2"><?php echo ($data["classno"]); ?></td>
			<td class="td1">班级名称</td>
			<td class="td2"><?php echo ($data["classname"]); ?></td>
		</tr>
		<tr>
			<td class="td1">初始密码</td>
			<td class="td2"><?php echo ($data["pwd"]); ?></td>
			<td class="td1">性别</td>
			<td class="td2"><?php echo ($data["sex"]); ?></td>
		</tr>
		<tr>
			<td class="td1">简介</td>
			<td class="td2" colspan="3"><?php echo ($data["introduction"]); ?></td>
		</tr>
	</table>
	<form method="post" action="/Grade_Serching_System/index.php/Admin/Teacher/teaedit/">
		<div class="submit">
			<input type="submit" value="编辑" class="button"/>
		</div>
	</form>
</body>
</html>