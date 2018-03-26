<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends CommonController
{
	
	//显示页面
	public function index()
	{
		$model=D('Manager');
		$id = $_SESSION['userinfo']['id'];
        $data= $model->where(['id'=>$id])->find();
		$this->assign('data',$data);
		$this->display();

	}
	//添加学生信息
	public function stuadd()
	{
		if (IS_POST) {
			//post 
			$data=I('post.');
			$res=D('Student')->add($data);
			if ($res) {
				$this->success('添加成功',U('Admin/Manager/index'));
			}else{
				$this->error('添加失败');
			}			
		}else{
			//get 页面展示
			$this->display();
		}
	}
	//学生管理
	public function stulist()
	{
		//展示页面
		$model=D('Student');
		$data=$model->select();
		$this->assign('data',$data);
		$this->display();
	}
	//进入修改页面学生信息
	public function stuedit()
	{
		
		//展示页面
		$stuno = I('get.stuno');
		$data = D('Student')->find($stuno);
		//dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	//修改学生数据
	public function stueditm()
	{
		$data=I('post.');
		$stuno=I('get.stuno',0,'intval');
		$res = D('Student')->where(['StuNo'=>$stuno])->save($data); 
		if ($res!==false) {
			$this->success('修改成功',U('Admin/Manager/stulist'));
		}else{
			$this->error('修改失败');
		}
	}
	//删除学生
	public function deleteStudent()
	{
		$stuno=I('get.stuno',0,'intval');
		// dump($stuno);
		$model=D('Student');
		$res = $model->where(['StuNo'=>$stuno])->delete();

		if($res !== false){
			$this -> success('操作成功', U('Admin/Manager/stulist'));
		}else{
			$this -> error('操作失败');
		}	
	}
	//老师管理
	public function tealist()
	{
		//展示页面
		$model=D('Teacher');
		$data=$model->select();
		$this->assign('data',$data);
		$this->display();
	}

	public function teaadd(){
		if (IS_POST) {
			//post 
			$data=I('post.');
			$res=D('Teacher')->add($data);
			if ($res) {
				$this->success('添加成功',U('Admin/Manager/index'));
			}else{
				$this->error('添加失败');
			}

			
			
		}else{
			//get 页面展示
			$this->display();
		}
	}

	//进入老师修改页面
	public function teaedit()
	{
		
		//展示页面
		$teano = I('get.teano');
		$data = D('Teacher')->find($teano);

		//dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	//修改老师数据数据
	public function teaeditm()
	{
		$data=I('post.');
		$teano=I('get.teano',0,'intval');

		// dump($stuno);die;
		// dump($data);
		$res = D('Teacher')->where(['TeaNo'=>$teano])->save($data); 
		// echo D('Teacher')->getLastSql();die;
		if ($res!==false) {
			$this->success('修改成功',U('Admin/Manager/tealist'));
		}else{
			$this->error('修改失败');
		}
	}

	public function deleteTeacher()
	{
		$teano=I('get.teano',0,'intval');
		 // dump($teano);die;
		$model=D('Teacher');
		$res = $model->where(['TeaNo'=>$teano])->delete();
		dump($res);
		if($res !== false){
			$this -> success('操作成功', U('Admin/Manager/tealist'));
		}else{
			$this -> error('操作失败');
		}	
	}

	//进入管理员修改页面
	public function manedit()
	{
		
		//展示页面
		$manno = I('get.manno');
		$model = D('Manager');
		$id = $_SESSION['userinfo']['id'];
        $data= $model->where(['id'=>$id])->find();
		$this->assign('data',$data);
		$this->display();
	}
	//修改管理员数据
	public function maneditm()
	{
		$data=I('post.');
		//$manno=I('get.manno',0,'intval');

		// dump($stuno);die;
		// dump($data);
		$id = $_SESSION['userinfo']['id'];
		$res = D('Manager')->where(['id'=>$id])->save($data); 
		// echo D('Teacher')->getLastSql();die;
		if ($res!==false) {
			$this->success('修改成功',U('Admin/Manager/index'));
		}else{
			$this->error('修改失败');
		}
	}


}