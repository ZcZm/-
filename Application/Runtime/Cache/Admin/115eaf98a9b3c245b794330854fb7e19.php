<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员管理老师</title>
    <link rel="stylesheet" href="/grade2/Public/css/manager_tealist.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="/grade2/index.php/Admin/index/logout">退出登录</a></div>
        <div class="link"><a href="<?php echo U('/Admin/Manager/index');?>">返回</a></div>
    </div>
    <div class="B"></div>


    <table cellspacing="0" class="table">
        <tr>
            <td class="title">工号</td>
            <td class="title">姓名</td>
            <td class="title">班级</td>
            <td class="title">性别</td>
            <td class="title" colspan="2">操作</td>
        </tr>

        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                <td class="td"><?php echo ($v["teano"]); ?></td>
                <td class="td"><?php echo ($v["teaname"]); ?></td>
                <td class="td"><?php echo ($v["classname"]); ?></td>
                <td class="td"><?php echo ($v["sex"]); ?></td>
                <form method="post" action="/grade2/index.php/Admin/Manager/teaedit/teano/<?php echo ($v["teano"]); ?>">
                    <td class="td2">
                        <input type="hidden" name="TeaNo" value="<?php echo ($vo["TeaNo"]); ?>" class="button"/>
                        <input type="submit" value="编辑" class="button"/>
                    </td>
                </form>

                <td class="td2"><a href="/grade2/index.php/Admin/Manager/deleteTeacher/teano/<?php echo ($v["teano"]); ?>" onclick="return confirm('确定删除?')">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

</body>
</html>