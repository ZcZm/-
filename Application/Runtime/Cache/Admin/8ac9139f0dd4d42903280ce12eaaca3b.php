<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生首页</title>
    <link rel="stylesheet" href="/Grade_Serching_System/Public/css/student_index.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Student/chooseCourse.html">进入选课系统</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Student/courseList.html">已选课程管理</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/change/index">修改密码</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Index/logout">退出登录</a></div>
    </div>
    <div class="B"></div>

    <div class="title">学生基本信息</div>
    <table cellspacing="0" class="table">
        <tr>
            <td class="td1">学号</td>
            <td class="td2"><?php echo ($data["stuno"]); ?></td>
            <td class="td1">姓名</td>
            <td class="td2"><?php echo ($data["stuname"]); ?></td>
        </tr>
        <tr>
            <td class="td1">专业/班级 编号</td>
            <td class="td2"><?php echo ($data["classno"]); ?></td>
            <td class="td1">专业/班级 名称</td>
            <td class="td2"><?php echo ($data["classname"]); ?></td>
        </tr>
        <tr>
            <td class="td1">性别</td>
            <td class="td2"><?php echo ($data["sex"]); ?></td>
            <td class="td1"></td>
            <td class="td2"></td>
        </tr>
    </table>
    <form method="post" action="/Grade_Serching_System/index.php/Admin/Student/stuedit">
        <div class="submit">
            <!-- <input type="hidden" name="StuNo" value="<?php echo (session('StuNo')); ?>" class="button"/> -->
            <input type="submit" value="编辑" class="button"/>
        </div>
    </form>
</body>
</html>