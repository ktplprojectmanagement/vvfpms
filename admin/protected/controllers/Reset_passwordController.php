<?php

class Reset_passwordController extends Controller
{
	
	public function actionIndex()
	{
		//print_r(Yii::app()->user->getState("employee_email"));die();
		if (Yii::app()->user->getState("employee_email")) {
			$this->render('//site/reset_password_view',array('employee_id'=>Yii::app()->user->getState("Employee_id")));
		}
		else if(Yii::app()->user->getState("employee_email") && count($reset_flag)>0)
		{
			$this->render('//site/reset_password_view',array('employee_id'=>Yii::app()->user->getState("Employee_id")));
		}
		else
		{
			$this->redirect(Yii::app()->createUrl('Login'));
		}
		
	}

function actionreset_new($employee_id = null)
	{		
		$this->render('//site/reset_pass_view',array('employee_id'=>$employee_id));
	}

	function actionrsest()
	{
		//print_r($_POST['username']);die();
		$model = new LoginForm;	
		$emploee_data1 =new EmployeeForm;
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['username']);
		$Email_id_data = $emploee_data1->get_employee_data($where1,$data2,$list1);
		$data = array(
			'password' => md5($_POST['password_value']), 
			'first_login_flag' => 1,
		);		
		$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username',array(':username'=>$Email_id_data['0']['Email_id']));
		
		if ($update == 1) {
			echo "success";
		}
		else
		{
			echo "error occure";
		}
	}

function actionrsest1()
	{
		//print_r($_POST['username']);die();
		$model = new LoginForm;	
		$emploee_data1 =new EmployeeForm;
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['username']);
		$Email_id_data = $emploee_data1->get_employee_data_new($where1,$data2,$list1);
//print_r($Email_id_data);die();
		$data = array(
			'password' => md5($_POST['password_value']), 
			//'first_login_flag' => 1,
		);		
		$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username',array(':username'=>$Email_id_data['0']['Email_id']));
		
		if ($update == 1) {
			echo "success";
		}
		else
		{
			echo "error occure";
		}
	}		
	
}
