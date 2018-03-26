<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    //显示登录页面
    public function index()
    {
        if (!session('?userinfo')) {
            # code...
            $this->display();
        }
         	    
	}

	//登录验证
    public function checkLogin()
    {
        //获取输入的值
        $username = I("post.username");
        $pwd = I("post.password");
        $usertype = I('post.role');
        //echo $usertype;die;
        $str = substr($usertype,0,3);
        //echo $str;die;
        $str .= 'no';
        $str2 .= 'name';
        // echo $str;die;

        //判断是否输入用户名密码
        if(!$username){
            $this->error('请输入用户名！');
        }
        if(!$pwd){
            $this->error('请输入密码');
        }
        $info = D("{$usertype}")->where("{$str}='$username'")->find();
        //echo D("{$usertype}")->getLastSql();die;
        //dump($info);die;
       // dump($info["{$str}"]);die;
       // dump($info['pwd']);die;
        if ($info["{$str}"]==$username&&$info['pwd']==$pwd) {
             //保存用户信息
            session('userinfo',array(
                'id' => $info['id'],
                'no' => $info["{$str}"],
                'status'=>$usertype,
               // "no" => {},$
                'name' => $info["{$str}"],
                'pwd' => $info['pwd'],
                'classno' => $info['classno'],
                'classname' => $info['classname'],
            ));
            $this->success('登陆成功',U("admin/".$usertype."/index"));
        }else{
            $this->error('登录失败');
        }
    }

    public function logout()
    {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(),'',time()-1);
        }
        session_destroy();
        $this->redirect('Admin/index/index');
    }
}





