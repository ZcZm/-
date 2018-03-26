<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑信息</title>
    <link rel="stylesheet" href="/Grade_Serching_System/Public/css/student_stuedit.css" />
</head>

<body class="all">
    <div class="A">
        <div class="link"><a href="<?php echo U('Index/logout');?>">退出登录</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/Student/index.html">返回</a></div>
        <div class="link"><a href="/Grade_Serching_System/index.php/Admin/change/index">修改密码</a></div>
    </div>
    <div class="B"></div>

    <form method="post" action="/Grade_Serching_System/index.php/Admin/Student/stuedit_edit">
        <div class="title">编辑信息</div>
        <table cellspacing="0" class="table">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                <td class="td1">学号</td>
                <td class="td2"><input type="text" name="StuNo" value="<?php echo ($data["stuno"]); ?>" disabled="disabled"></td>
                <td class="td1">姓名</td>
                <td class="td2"><input type="text" name="StuName" value="<?php echo ($data["stuname"]); ?>" disabled="disabled"></td>
            </tr>
            <tr>
                <td class="td1">专业/班级 编号</td>
                <td class="td2"><input type="text" name="ClassNo" value="<?php echo ($data["classno"]); ?>" disabled="disabled"></td>
                <td class="td1">专业/班级 名称</td>
                <td class="td2"><input type="text" name="ClassName" value="<?php echo ($data["classname"]); ?>" disabled="disabled"></td>
            </tr>
            <tr> 
                <td class="td1">性别</td>
                <td class="td2"><input type="text" name="Sex" value="<?php echo ($data["sex"]); ?>" disabled="disabled"></td>
                <td class="td1">初始密码</td>
                <td class="td2"><input type="text" name="Pwd" value="<?php echo ($data["pwd"]); ?>"></td>
               
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

        <div class="submit">
            <input type="submit" name="Submit" value="提交" class="button">
        </div>
    </form>

</body>
</html>