<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑老师信息</title>
    <link rel="stylesheet" href="/Grade_Serching_System/Public/css/manager_teaedit.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link" align="right"><a href="/Grade_Serching_System/index.php/Admin/Index/logout">退出登录</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Teacher/index.html">返回</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/change/index">修改密码</a></div>
    </div>
    <div class="B"></div>

    <form method="post" action="/Grade_Serching_System/index.php/Admin/Teacher/teaedit_edit/">
        <div class="title">编辑老师信息</div>
        <table cellspacing="0" class="table">
            <tr>
                <td class="td1">工号</td>                
                <td class="td2"><div name="TeaNo"><?php echo ($data["teano"]); ?></div></td>
                <td class="td1">姓名</td>
                <td class="td2">
                    <span name="TeaName"><?php echo ($data["teaname"]); ?></span>
                </td>
                    <!-- <input type="text" name="TeaName" value="<?php echo ($data["teaname"]); ?>" readonly="readonly"></td> -->
            </tr>
            <tr>
                <td class="td1">班级编号</td>
                <td class="td2">
                    <span name="ClassNo"><?php echo ($data["classno"]); ?></span>
                </td>
                    <!-- <input type="text" name="ClassNo" value="<?php echo ($data["classno"]); ?>" readonly="readonly"></td> -->
                <td class="td1">班级名称</td>
                <td class="td2">
                    <span name="ClassName"><?php echo ($data["classname"]); ?></span>
                    <!-- <input type="text" name="ClassName" value="<?php echo ($data["classname"]); ?>" readonly="readonly"></td> -->
                </td>
            </tr>
            <tr>
                <td class="td1">性别</td>
                <td class="td2">
                    <span name="Sex"><?php echo ($data["sex"]); ?></span>
                    <!-- <input type="text" name="Sex" value="<?php echo ($data["sex"]); ?>" disabled="disabled"></td> -->
                </td>
                <td class="td1"></td>
                <td class="td2"></td>
            </tr>
            <tr>
                <td class="td1">简介</td>
                
                <td class="td2" colspan="3">
                    <input type="text" name="Introduction" value="<?php echo ($data["introduction"]); ?>" class="input"></td>
                    <!-- <span name="Introduction"><?php echo ($data["introduction"]); ?></span></td> -->
            </tr>
        </volist>
        </table>

        <div class="submit">
            <input type="submit" name="Submit" value="提交" class="button">
        </div>
    </form>

</body>
</html>