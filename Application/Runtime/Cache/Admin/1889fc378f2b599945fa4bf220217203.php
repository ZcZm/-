<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑管理员信息</title>
    <link rel="stylesheet" href="/grade2/Public /css/manager_manedit.css" />
</head>

<body class="all">
<div class="A"> 
    <div class="link"><a href="/grade2/index.php/Admin/index/logout">退出登录</a></div>
    <div class="link"><a href="<?php echo U('Admin/Manager/index');?>">返回</a></div>
    <div class="link"><a href="/grade2/index.php/Admin/change/index">修改密码</a></div>  
</div>
<div class="B"></div>

<form method="post" action="/grade2/index.php/Admin/Manager/maneditm/manno/<?php echo ($data["manno"]); ?>">
    <div class="title">编辑管理员信息</div>
    <table cellspacing="0" class="table">
        <tr>
            <td class="td1">工号</td>
            <td class="td2"><input type="text" name="ManNo" value="<?php echo ($data["manno"]); ?>"></td>
            <td class="td1">姓名</td>
            <td class="td2"><input type="text" name="ManName" value="<?php echo ($data[""]); ?>manname"></td>
        </tr>
        <tr>
            <td class="td1">初始密码</td>
            <td class="td2"><input type="text" name="Pwd" value="<?php echo ($data["pwd"]); ?>"></td>
            <td class="td1"></td>
            <td class="td2"></td>
        </tr>
    </table>

    <div class="submit">
        <input type="submit" name="Submit" value="提交" class="button">
    </div>
</form>

</body>
</html>