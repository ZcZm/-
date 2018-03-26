<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑学生信息</title>
    <link rel="stylesheet" href="/grade2/Public/css/manager_teaedit.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="<?php echo U('Index/logout');?>">退出登录</a></div>
        <div class="link"><a href="<?php echo U('Manager/tealist');?>">返回</a></div>
    </div>
    <div class="B"></div>

    <form method="post" action="/grade2/index.php/Admin/Manager/teaeditm/teano/<?php echo ($data["teano"]); ?>">
        <div class="title">编辑老师信息</div>
        <table cellspacing="0" class="table">
            <tr>
                <td class="td1">工号</td>
                <td class="td2"><input type="text" name="TeaNo" value="<?php echo ($data["teano"]); ?>"></td>
                <td class="td1">姓名</td>
                <td class="td2"><input type="text" name="TeaName" value="<?php echo ($data["teaname"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">班级编号</td>
                <td class="td2"><input type="text" name="ClassNo" value="<?php echo ($data["classno"]); ?>"></td>
                <td class="td1">班级名称</td>
                <td class="td2"><input type="text" name="ClassName" value="<?php echo ($data["classname"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">初始密码</td>
                <td class="td2"><input type="text" name="Pwd" value="<?php echo ($data["pwd"]); ?>"></td>
                <td class="td1">性别</td>
                <td class="td2"><input type="text" name="Sex" value="<?php echo ($data["sex"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">简介</td>
                <td class="td2" colspan="3"><input type="text" name="Introduction" value="<?php echo ($data["introduction"]); ?>" class="input"></td>
            </tr>
        </table>

        <div class="submit">
            <input type="submit" name="Submit" value="提交" class="button">
        </div>
    </form>

</body>
</html>