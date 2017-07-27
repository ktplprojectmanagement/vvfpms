<?php

class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		$model = new LoginForm;
		//$this->render('//site/Login_view',array('model'=>$model));
		$this->render('//site/login_view',array('model'=>$model));
		
	}

	public function actioncheck()
	{
		$model = new LoginForm;
		//$model->attributes=$_POST['LoginForm'];
		if (isset($_POST)) {
			
			$role_id_array = $model->check_role($_POST);

			
			// $role_id = Yii::app()->user->getState('role_id');
			//print_r($result);die();
			//print_r($result);die();
			if ($role_id_array != '') {
                               $result = $model->check_login($_POST);
				Yii::app()->user->setState('role_id',$role_id_array['role_id']);
				Yii::app()->user->setState('Employee_name',$result['Emp_fname']);
				Yii::app()->user->setState('Employee_id',$result['Employee_id']);
				Yii::app()->user->setState('employee_email',$result['Email_id']);
				Yii::app()->user->setState('appriaser_1',$result['Reporting_officer1_id']);
				//Yii::app()->user->setState('appriaser_2',$row['Reporting_officer2_id']);
				echo "Valid";
			}
			else
			{
				echo "invalid";
			}
			
		}
		
		

		// if($model->username == $_POST['username'] && $model->password == $_POST['password'])
		// {
		// 	$this->redirect(array("Newemployee/index"));
		// }
		//print_r($model->username);die();
	}

function actionmyprofile()
	{
		$model=new EmployeeForm;
		$notification_data=new NotificationsForm;
		$id = Yii::app()->user->getState("Employee_id");
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($id);
		$employee_data = $model->get_employee_data($where,$data,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($id);
		$notifications_count = $notification_data->get_notifications($where1,$data2,$list1);

		$where1 = 'where Employee_id = :Employee_id and chk_flag = :chk_flag';
		$list1 = array('Employee_id','chk_flag');
		$data2 = array($id,'0');
		$notifications = $notification_data->get_notifications($where1,$data2,$list1);
		
		$appriaser_1 = Yii::app()->user->getState("appriaser_1");
                $Reporting_officer_name = '';
		$where = 'where Email_id = :Email_id';
		$list = array('Email_id');
		$data = array($appriaser_1);
		$Reporting_officer_data = $model->get_employee_data($where,$data,$list);

		if (isset($Reporting_officer_data['0']['Emp_lname'])) {
			$Reporting_officer_name = $Reporting_officer_data['0']['Emp_fname'].' '.$Reporting_officer_data['0']['Emp_lname'];
		}
		else
		{
			$Reporting_officer_name = $Reporting_officer_data['0']['Emp_fname'];
		}

		$this->render('//site/script_file');
		$this->render('//site/header_view',array('notication_data'=>$notifications,'notifications_count'=>$notifications_count));
		$this->render('//site/employee_profile',array('employee_data'=>$employee_data,'model'=>$model,'Reporting_officer_name'=>$Reporting_officer_name));
		$this->render('//site/footer_view');
		
	}

	public function actiondashboard()
	{
		$model=new KPIStructureForm;
		$kra_data=new KRAStructureForm;
		$notification_data=new NotificationsForm;
		$id = Yii::app()->user->getState("Employee_id");
		$where = 'where Employee_id = :Employee_id and KRA_status = :KRA_status and KRA_date = :KRA_date';
		$list = array('Employee_id','KRA_status','KRA_date');
		$data = array($id,'Approved',date('Y-m-d'));
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$KRA_approve = '';
		if (count($kpi_data)>0) {
			$KRA_approve = array(
				'notication_count' => count($kpi_data), 
				'notication_type' => "KRA Approved",
			);			
		}
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($id);
		$notifications_count = $notification_data->get_notifications($where1,$data2,$list1);

		$where1 = 'where Employee_id = :Employee_id and chk_flag = :chk_flag';
		$list1 = array('Employee_id','chk_flag');
		$data2 = array($id,'0');
		$notifications = $notification_data->get_notifications($where1,$data2,$list1);
		//print_r($notifications);die();	
		

		$this->render('//site/script_file');
		$this->render('//site/header_view',array('notication_data'=>$notifications,'notifications_count'=>$notifications_count));
		$this->render('//site/user_profile');
		$this->render('//site/footer_view');
	}
	
}
