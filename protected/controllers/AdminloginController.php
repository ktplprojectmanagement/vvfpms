<?php

class AdminloginController extends Controller
{
	
	public function actionIndex()
	{

		$model=new LoginForm;
		$this->render('//site/baseurl');
		$this->render('//site/user_login_view',array('model'=>$model));
	}

	public function actionemployee_login()
	{

		$model=new LoginForm;
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			$row = $model->check_login($model->attributes);
			
			if ($row!=0 || count($row)>0) {
				Yii::app()->user->setState('Employee_name',$row['Emp_fname']);
				Yii::app()->user->setState('Employee_id',$row['Employee_id']);
				Yii::app()->user->setState('employee_email',$row['Email_id']);
				Yii::app()->user->setState('appriaser_1',$row['Reporting_officer1_id']);
				
				$this->render('//site/script_file');
				$this->render('//site/header_view',array('logout'=>'Adminlogin/employee_logout'));	
				$this->render('//site/employee_profile_view',array('model'=>$model));
				$this->render('//site/footer_view');
			}
		}
	}

	public function actioncheck()
	{
		
		$model = new LoginForm;
		if (isset($_POST)) {
			$role_id_array = $model->check_admin($_POST);			
			
			if (count($role_id_array)>0 && $role_id_array != '') {												
					$result = $model->check_login($_POST);
					Yii::app()->user->setState('role_id',$role_id_array['role_id']);
					Yii::app()->user->setState('Employee_name',$result['Emp_fname']);
					Yii::app()->user->setState('Employee_id',$result['Employee_id']);
					Yii::app()->user->setState('employee_email',$result['Email_id']);
					$prev_date = date('Y').'-'.date('Y',strtotime('+1 year'));
					
				    Yii::app()->user->setState('financial_year_check',$prev_date);
					$data = array(
						'Employee_id' => $result['Employee_id'], 
					);
					$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username and password=:password',array(':username'=>$role_id_array['username'],':password'=>$role_id_array['password']));					
					echo "Valid";
				
			}			
			else
			{
				echo "invalid";
			}
			
		}
	}


	// public function actionemployee_logout()
	// {
	// 	$model=new LoginForm;
	// 	$data = array(
	// 				'login_flag' => 0, 
	// 				);
	// 		$update = Yii::app()->db->createCommand()->update('login',$data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
	// 		Yii::app()->user->setState('Employee_id','');
	// 		Yii::app()->user->setState('role_id','');
	// 		Yii::app()->user->setState('Employee_name','');
	// 		Yii::app()->user->setState('Employee_id','');
	// 		Yii::app()->user->setState('employee_email','');
	// 		Yii::app()->user->setState('appriaser_1','');
	// 	return $this->redirect(['Index']);
	// }
public function actionemployee_logout()
	{
		$model=new LoginForm;
		$data = array(
					'login_flag' => 0, 
					);
			$update = Yii::app()->db->createCommand()->update('login',$data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('role_id','');
			Yii::app()->user->setState('Employee_name','');
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('employee_email','');
			Yii::app()->user->setState('appriaser_1','');
			Yii::app()->user->setState('session_current_time','');unset($_SESSION['number']);session_destroy();
		return $this->redirect('/pms/index.php/Adminlogin');
	}
	
}
