<?php
namespace Admin\Controller;
use Think\Controller;
class ChangeController extends CommonController
{
	//修改密码页面
    public function index()
    {
    	$info=$_SESSION['userinfo'];
        //dump($info);die;
        $id = $_SESSION['userinfo']['id'];
        $usertype = $_SESSION['userinfo']['status'];
        //dump($usertype);die;
        $admin_info = D("{$usertype}")->where(['id'=>$id])->find();
        $this->assign('admin_info', $admin_info);
        $this->display();
    }

    //保存修改信息
    public function save()
    {
    	$id=$_SESSION['userinfo']['id'];
    	$usertype=$_SESSION['userinfo']['status'];
        $id=(I('id',''));
        //echo $id;die;
        $old_admin_password  = (I('old_admin_password', ''));
        $admin_password      =( I('admin_password', ''));
        $re_admin_repassword = (I('re_admin_repassword', ''));
        //dump(I('post.'));
       //是否一致
        if($admin_password !== $re_admin_repassword){
            $this->error('两次密码输入不一致');
        }

        //原始用户名和密码是否正确
        $filter = array(
            'id'=>$id,
            'Pwd' => $old_admin_password
        );

        $admin_info = M("{$usertype}")->where($filter)->find();
        //dump($admin_info);die;
     if(!$admin_info){
            $this->error('原始用户名或密码错误');
        }else{
            //更新管理员信息
           $pwd = $re_admin_repassword;
            //dump($admin_info);die;
            //dump($id);
            $result = D("{$usertype}")->where(['id'=>$id])->setfield(['Pwd'=>$pwd]);
            //echo D("{$usertype}")->getLastsql();die;
            //dump($result);die;
         if($result){
                $this->success('密码修改成功,请重新登录',U('Admin/index/logout',3));
            }else{
                $this->error('密码修改失败');
            }
        }

    }

}

