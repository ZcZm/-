<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑课程</title>
    <link rel="stylesheet" href="/grade2/Public/css/teacher_edit.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="/grade2/index.php/Admin/Index/logout">退出登录</a></div>
        <div class="link"><a href="/grade2/index.php/Admin/Teacher/coulist.html">返回</a></div>
    </div>
    <div class="B"></div>

    <form method="post" action="/grade2/index.php/Admin/Teacher/edit_edit">
        <div class="title">编辑课程信息</div>
        <table cellspacing="0" class="table">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                <td class="td1">课程编号</td>
                <td class="td2"><input type="text" name="CouNo" value="<?php echo ($v["couno"]); ?>"></td>
                <td class="td1">课程名称</td>
                <td class="td2"><input type="text" name="CouName" value="<?php echo ($v["couname"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">老师工号</td>
                <td class="td2"><input type="text" name="TeaNo" value="<?php echo ($v["teano"]); ?>"></td>
                <td class="td1">老师名字</td>
                <td class="td2"><input type="text" name="TeaName" value="<?php echo ($v["teaname"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">限定人数</td>
                <td class="td2"><input type="text" name="LimitNum" value="<?php echo ($v["limitnum"]); ?>"></td>
                <td class="td1">课程学分</td>
                <td class="td2"><input type="text" name="Credit" value="<?php echo ($v["credit"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">时间</td>
                <td class="td2"><input type="text" name="SchoolTime" value="<?php echo ($v["schooltime"]); ?>"></td>
                <td class="td1">地点</td>
                <td class="td2"><input type="text" name="Location" value="<?php echo ($v["location"]); ?>"></td>
            </tr>
            <tr>
                <td class="td1">课时</td>
                <td class="td2"><input type="text" name="ClassHour" value="<?php echo ($v["classhour"]); ?>"></td>
                <td class="td1">实验课时</td>
                <td class="td2"><input type="text" name="ExpHour" value="<?php echo ($v["exphour"]); ?>"></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>


        <div class="submit">
            <input type="submit" value="提交" name="ok" class="button">
        </div>

    </form>

</body>
</html>