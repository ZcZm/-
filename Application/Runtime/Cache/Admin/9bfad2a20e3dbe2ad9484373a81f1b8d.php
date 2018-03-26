<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程选课详情</title>
    <link rel="stylesheet" href="/Grade_Serching_System/Public/css/teacher_courseListDetail.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Index/logout">退出登录</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Teacher/coulist.html">返回</a></div>
    </div>
    <div class="B"></div>


    <table cellspacing="0" class="table">
        <tr>
            <td class="title">学号</td>
            <td class="title">姓名</td>
            <td class="title">班级编号</td>
            <td class="title">班级名称</td>
            <td class="title">性别</td>
        </tr>

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td class="td"><?php echo ($vo["stuno"]); ?></td>
            <td class="td"><?php echo ($vo["stuname"]); ?></td>
            <td class="td"><?php echo ($vo["classno"]); ?></td>
            <td class="td"><?php echo ($vo["classname"]); ?></td>
            <td class="td"><?php echo ($vo["sex"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>


</body>

</html>