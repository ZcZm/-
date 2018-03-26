<?php
namespace Admin\Controller;
use Think\Controller;

class TeacherController extends CommonController{
    // 教师默认登录界面
    public function index(){
        $model = D('Teacher');
        $id = $_SESSION['userinfo']['id'];
        $data= $model->where(['id'=>$id])->find();
        //dump($data);die;
        $this->assign('data',$data);
	    $this->display();
	}

    // 添加页面
    public function add(){
        $this->display();
    }

    //添加课程
    public function add_do(){
        $post = I('post.');
        $cou=D('Course');
        $re=$cou->create();
        if(!$re){
            $this->error($cou->getError());
        }
        $r = $cou -> add();
        if(!$r){
            $this->error('课程创建失败！');
        }
        else{
            $this->success('课程创建成功！',U('Admin/Teacher/index'));
        }
    }

    //显示课程
    public function coulist(){
        $str=$_SESSION['userinfo']['no'];//['id'];
        //dump( $str);die;
        $teacoulist = M('course')->where(['TeaNo'=>$str])->select();
        //dump($teacoulist);die;
        //echo M('course')->getLastSql();die;
        $this->assign('list',$teacoulist);
        $this->display();
    }

    //查看选课学生详细信息
    public function courseListDetail(){
        //找出选这门课的学生的学号
        $CouNo=$_POST['CouNo'];
        //echo $CouNo;die;
        $stuno = D('stucou')->where(['CouNo' => $CouNo])->select();
        //dump($stuno);die;
       $stuno=$stuno[0]['stuno'];
       $stuinfo=M('student')->where(['StuNo'=>$stuno])->select();

        //dump($stuinfo);
        // foreach ($stuinfo as $value) {
        //    $res = $value;
        // }
        // dump($res);//die;
        //echo $stuno;die;
        //echo M('student')->getLastSql();die;

        // 列表展示
        $this->assign('list',$stuinfo);
        $this->display();
    }

    //编辑课程
    //显示默认参数
    public function edit(){
        $post = I('get.id');
        // var_dump($post);die;
        $cou=D('Course');
        $data= $cou->where(['CouNo'=>$post])->select();
        // var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }
    //修改提交新参数并跳转
    public function edit_edit(){
        $post = I('post.');
        $data = D('Course');
        $res = $data->save($post);
        if ($res) {
            $this->success('编辑成功',U('Admin/Teacher/coulist'));
        }else{
            $this->error('编辑失败');
        }
    }
    //删除课程
    public function delete(){
        $CouNo= I('get.id');
        $mod=M('course')->where("CouNo = '$CouNo'")->delete();
        M('stucou')->where("CouNo = '$CouNo'")->delete();

        if($mod){
            $this->success('课程删除成功',U('Admin/Teacher/coulist'));

        }else{
            $this->success('课程删除失败！');
        }
    }
    //编辑老师
    //显示默认老师参数
    public function teaedit(){
        $cou=D('Teacher');
        $id = $_SESSION['userinfo']['id'];
        $data= $cou->where(['id'=>$id])->find();
        $this->assign('data',$data);
        $this->display();
    }
    //修改提交新参数并跳转
    public function teaedit_edit(){
       $post = I('post.');
       $data = D('Teacher');
       $id = $_SESSION['userinfo']['id'];
       $res = $data->where(['id'=>$id])->save($post);
       if ($res) {
           $this->success('编辑成功',U('Admin/Teacher/index'));
       }else{
           $this->error('编辑失败');
       }
	}
}