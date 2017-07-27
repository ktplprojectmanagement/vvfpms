<?php

class AdminloginController extends Controller
{
	
	public function actionIndex()
	{
		$model=new LoginForm;
		//$this->render('//site/header');
		//$this->render('//site/script_file');
		//$this->render('//site/header_view');	
                $this->render('//site/script_file');
		$this->render('//site/admin_login',array('model'=>$model));
		//$this->render('//site/footer_view');
		//$this->render('//site/emp',array('model'=>$model));
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
				//Yii::app()->user->setState('appriaser_2',$row['Reporting_officer2_id']);
				
				$this->render('//site/script_file');
				$this->render('//site/header_view',array('logout'=>'Adminlogin/employee_logout'));	
				$this->render('//site/employee_profile_view',array('model'=>$model));
				$this->render('//site/footer_view');
			}
			//print_r($model->attributes);die();
		}
	}

	public function actionemployee_logout()
	{
		$model=new LoginForm;
		Yii::app()->user->setState('Employee_name','');
		return $this->redirect(['Index']);
	}

	
}
