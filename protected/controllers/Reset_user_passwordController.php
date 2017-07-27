<?php

class Reset_user_passwordController extends Controller
{
	
	public function actionIndex($employee_id = null)
	{
		$emploee_data1 =new EmployeeForm;
		$model = new LoginForm;	
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($employee_id);
		$Email_id_data = $emploee_data1->get_employee_data($where1,$data2,$list1);
		$where1 = 'where username = :username';
		$list1 = array('username');
		$data2 = array($Email_id_data['0']['Email_id']);
		$reset_flag = $model->get_login_data($where1,$data2,$list1);
		//print_r(Yii::app()->user->getState("employee_email"));die();
		if (Yii::app()->user->getState("employee_email") && count($reset_flag)>0 && isset($reset_flag['0']['first_login_flag']) && $reset_flag['0']['first_login_flag']!=1) {
			$this->render('//site/reset_password_view',array('employee_id'=>$employee_id));
		}
		else if(Yii::app()->user->getState("employee_email") && count($reset_flag)>0)
		{
			$this->render('//site/script_file');
			$this->render('//site/session_check_view');
			$this->render('//site/header_view_layout');
			$this->render('//site/reset_user_password',array('employee_id'=>$Email_id_data['0']['Email_id']));
			$this->render('//site/footer_view_layout');
		}
		else
		{
			$this->redirect(Yii::app()->createUrl('Login'));
		}
		
	}

	function actionrsest()
	{
		//print_r($_POST['username']);die();
		$model = new LoginForm;	
		$emploee_data1 =new EmployeeForm;
		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($_POST['username']);
		$Email_id_data = $emploee_data1->get_employee_data($where1,$data2,$list1);

	$data = array(
	'username' => $_POST['username'],
);
		$login_data = $model->check_login_user($data);

		if (isset($login_data) && count($login_data)>0) {

			if($login_data['password'] == md5($_POST['password']))
			{
				$data = array(
				'password' => md5($_POST['password_value']), 
				'first_login_flag' => 1,
				);
				//print_r($_POST['username']);die();
				$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username',array(':username'=>$Email_id_data['0']['Email_id']));

				if ($update != 0) {
					echo "success";
				}
				else
				{
					echo "error occure";
				}
			}
			else
			{
				print_r("Current password does not exists");die();
			}
			
		}
		
		
	}
	
}
