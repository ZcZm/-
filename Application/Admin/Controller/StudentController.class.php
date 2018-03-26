<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends CommonController{

	public function index(){
		$model = D('Student');
        $id = $_SESSION['userinfo']['id'];
        //echo $id;die;
        $data= $model->where(['id'=>$id])->find();
         //dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	//选课
	public function chooseCourse(){
		$student = D('student')->alias('st')->join('left join think_class as cl on st.ClassNo = cl.ClassNo')->find();
		// dump($student);die;
		// $stuno = session('StuNo');
		$coulist = D('course')->alias('c')->field('c.*,sc.stuNo')->join("left join think_stucou as sc on sc.CouNo = c.CouNo and sc.StuNo = '".$student."'")->where()->select();

		$this->assign('list',$coulist);
		$this->display();
	}
	//修改选课
	public function chooseCourseDo(){
		// echo 1111;
		$couno = I('get.couno');
		// dump($couno);die;
		  //判断所选课条件是否满足
		$student = D('student')->alias('st')->join('left join think_class as cl on st.ClassNo = cl.ClassNo')->find();
		// dump($student);die;
        $StuNo=$student['stuno'];
        // dump($StuNo);die;
        $Stu=D('stucou')->where(['StuNo'=>$StuNo])->select();
       // dump($Stu);die;
        // $CouNo['CouNo']=$couno;
        $ChooseNum=D("course")->where(["CouNo"=>$couno])->find();

        $stuCourse;
 		// dump($ChooseNum);die;
        //找出对应编号学生已选课程
         for($i=0;$i<count($Stu);$i++){
            $Cou=$Stu[$i]['couno'];
            // dump($Stu);die;
            $schooltime=M('course')->where(['CouNo'=>$Cou])->find();
            // dump($schooltime);die;
            $stuCourse[$i]['Schooltime']=$schooltime['schooltime'];
            $stuCourse[$i]['t1']=$schooltime['t1'];
            $stuCourse[$i]['t2']=$schooltime['t2'];
            $stuCourse[$i]['t3']=$schooltime['t3'];
            $stuCourse[$i]['t4']=$schooltime['t4'];
            $stuCourse[$i]['t7']=$schooltime['t7'];
            $stuCourse[$i]['t8']=$schooltime['t8'];
            $stuCourse[$i]['t9']=$schooltime['t9'];
            $stuCourse[$i]['t10']=$schooltime['t10'];
            $stuCourse[$i]['t11']=$schooltime['t11'];
            $stuCourse[$i]['t12']=$schooltime['t12'];
            $stuCourse[$i]['t13']=$schooltime['t13'];
        }
        // dump($stuCourse);die;
        // dump($ChooseNum);die;
        //判断是否时间冲突
         for($i=0;$i<count($stuCourse);$i++){
        	// echo 11;die;
            // if($ChooseNum['SchoolTime'] == $stuCourse[$i]['schooltime']){
            // 	// echo 111;die;
            //     $this->error('选课时间冲突，选课失败!!!！');
            // }
            // echo 1;die;
            if($ChooseNum['Weekday'] == $stuCourse[$i]['weekday']){
                if($ChooseNum['t1'] == 1 && $stuCourse[$i]['t1']==1){

                    $this->error('选课时间冲突，选课失败！');echo 1;die;

                }
                if($ChooseNum['t2'] == 1 && $stuCourse[$i]['t2']==1){

                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t3'] == 1 && $stuCourse[$i]['t3']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t4'] == 1 && $stuCourse[$i]['t4']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t7'] == 1 && $stuCourse[$i]['t7']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t8'] == 1 && $stuCourse[$i]['t8']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t9'] == 1 && $stuCourse[$i]['t9']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t10'] == 1 && $stuCourse[$i]['t10']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t11'] == 1 && $stuCourse[$i]['t11']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t12'] == 1 && $stuCourse[$i]['t12']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
                if($ChooseNum['t13'] == 1 && $stuCourse[$i]['t13']==1){
                    $this->error('选课时间冲突，选课失败！');
                }
            }
        }
        // dump($ChooseNum);die;
        //若选课成功，选课人数+1
        // echo $ChooseNum['choosenum'];die;
        if($ChooseNum['choosenum'] >= $ChooseNum['limitnum']){

            $this->error('人数已满，选课失败！');
        }
        else{
        	// echo 1;die;

            $ChooseNum['choosenum']++;
            // echo $ChooseNum['choosenum'];die;
            // dump($ChooseNum);
            D('course')->where(['CouNo'=>$ChooseNum['couno']])->setField(['ChooseNum'=>$ChooseNum['choosenum']]);
            // echo D('course')->getlastsql();die;
            // dump(M('course')->save($ChooseNum));die;
        }

        //选课列表增加
        $data['StuNo']=$StuNo;
        $data['CouNo']=$couno;
        $res = M('stucou')->add($data);
        // die;
        $this->success('选课成功！');
	}


 	  //显示已选课程
    public function courseList(){
        // $StuNo['StuNo']=$_SESSION['StuNo'];
        $student = D('student')->alias('st')->join('left join think_class as cl on st.ClassNo = cl.ClassNo')->find();
        $StuNo=$student['stuno'];
        // dump($StuNo);die;
		$Stu=D('stucou')->where(['StuNo'=>$StuNo])->select();
        // $stu = M('stucou')->where($StuNo)->select();
        // dump($Stu);die;
        $stuCourse;
         for($i=0;$i<count($Stu);$i++){
            $Cou=$Stu[$i]['couno'];
			$coulist=M('course')->where(['CouNo'=>$Cou])->find();
			// dump($coulist);die;
            $stuCourse[$i]['CouNo']=$coulist['couno'];
            $stuCourse[$i]['CouName']=$coulist['couname'];
            $stuCourse[$i]['TeaName']=$coulist['teaname'];
            $stuCourse[$i]['SchoolTime']=$coulist['schooltime'];
            $stuCourse[$i]['Location']=$coulist['location'];
            $stuCourse[$i]['Credit']=$coulist['credit'];
            $stuCourse[$i]['ClassHour']=$coulist['classhour'];
            $stuCourse[$i]['ExpHour']=$coulist['exphour'];
            $stuCourse[$i]['ChooseNum']=$coulist['choosenum'];
            $stuCourse[$i]['LimitNum']=$coulist['limitnum'];
        }
        // dump($stuCourse);die;
        $this->assign('list',$stuCourse);
        $this->display();
    }
      //删除已选课程
    public function delete(){
    	// echo 1;die;
        $CouNo=I('get.CouNo');
        $mod=D('Stucou')->where(["CouNo"=>$CouNo])->delete();
         // $ChooseNum=D("course")->where(["CouNo"=>$couno])->find();
        //选课人数-1
        // $Couno['CouNo']=$CouNo;
        $ChooseNum=M("course")->where(["CouNo"=>$CouNo])->find();
        $ChooseNum['choosenum']--;
          D('course')->where(['CouNo'=>$ChooseNum['couno']])->setField(['ChooseNum'=>$ChooseNum['choosenum']]);
        // M("course")->save($ChooseNum);

        $this->success('已选课程删除成功！',U('Admin/Student/courseList'));
    }

        //显示默认学生参数
    public function stuedit(){
        $cou=D('Student');
        $id = $_SESSION['userinfo']['id'];
        $data= $cou->where(['id'=>$id])->select();
        // var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }
    //修改提交新参数并跳转
    public function stuedit_edit(){
        $data = I('post.');

        $res = D('Student');
        $id = $_SESSION['userinfo']['id'];
        // dump($data);die;
        $re = $res->where(['id'=>$id])->save($data);
        if(!$re){
            $this->error('信息修改失败！');
        }
        else{
            $this->success('信息修改成功！',U('Admin/Student/stuedit'));
        }
	}
}
