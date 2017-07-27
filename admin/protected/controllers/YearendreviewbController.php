<?php

class YearendreviewbController extends Controller
{
	
	public function actionIndex()
	{
		$model = new Yearend_reviewbForm;
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
		$Employee_id = Yii::app()->user->getState("Employee_id");
		if (count($settings_data)>0) {
			
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$employee_review_data = $model->get_employee_data($where,$data,$list);

			$model1=new KpiAutoSaveForm;	
			$Employee_id = Yii::app()->user->getState("Employee_id");
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
			$list = array('Employee_id','KRA_status_flag','goal_set_year');
			$data = array($Employee_id,'3',$settings_data['0']['setting_type']);
			$kpi_data = $model1->get_kpi_list($where,$data,$list);      	
		}
		else if(count($settings_data1)>0)
		{   
				$year =  date("Y",strtotime("-1 year")).'-'.date('Y');  
				if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data1['0']['setting_type']);
				$employee_review_data = $model->get_employee_data($where,$data,$list);

				$model1=new KpiAutoSaveForm;	
				$Employee_id = Yii::app()->user->getState("Employee_id");
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',$settings_data1['0']['setting_type']);
				$kpi_data = $model1->get_kpi_list($where,$data,$list);
				}    	
				
		}	

		else
		{        	
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,date('Y'));
				$employee_review_data = $model->get_employee_data($where,$data,$list);

				$model1=new KpiAutoSaveForm;	
				$Employee_id = Yii::app()->user->getState("Employee_id");
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',date('Y'));
				$kpi_data = $model1->get_kpi_list($where,$data,$list);
		}	

		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));		
		$this->render('//site/year_end_view',array('model'=>$model,'employee_review_data'=>$employee_review_data,'kpi_data'=>$kpi_data));
		$this->render('//site/footer_view_layout');
		
		
	}

	function actionsub_emp_reviewb($Employee_id = null)
	{
		$model = new Yearend_reviewbForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$employee_review_data = $model->get_employee_data($where,$data,$list);

		$model1=new KpiAutoSaveForm;	
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
			$list = array('Employee_id','KRA_status_flag','goal_set_year');
			$data = array($Employee_id,'3',$settings_data['0']['setting_type']);
			$kpi_data = $model1->get_kpi_list($where,$data,$list);
		}
		else if(count($settings_data1)>0)
		{   
				$year =  date("Y",strtotime("-1 year")).'-'.date('Y');  
				if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',$settings_data1['0']['setting_type']);
				$kpi_data = $model1->get_kpi_list($where,$data,$list);
				}    	
				
		}	

		else
		{        	
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',date('Y'));
				$kpi_data = $model1->get_kpi_list($where,$data,$list);
		}	
		

		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		
		$master_apr = 2;
		$this->render('//site/session_check_view');
		$this->render('//site/year_end_view',array('model'=>$model,'employee_review_data'=>$employee_review_data,'master_apr'=>$master_apr,'kpi_data'=>$kpi_data));
		$this->render('//site/footer_view_layout');
		
		
	}

	function actionsavedata()
	{
		$model=new Yearend_reviewbForm;	
		$employee=new EmployeeForm;
		$model->Employee_id = Yii::app()->user->getState("Employee_id");
		$appriaser_1 = Yii::app()->user->getState("appriaser_1");

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array(Yii::app()->user->getState("Employee_id"));
		$employee_data = $employee->get_employee_data($where,$data,$list);
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array(Yii::app()->user->getState("Employee_id"));
		$employee_review_data = $model->get_employee_data($where,$data,$list);
		if (count($employee_review_data)>0) {
			$review_data = array(
				'employee_review1' => $_POST['employee_review1'], 
				'employee_review2' => $_POST['employee_review2'],
				'review1_example1' => $_POST['review1_example1'],
				'review1_example2' => $_POST['review1_example2'],
				'review2_example1' => $_POST['review2_example1'],
				'review2_example2' => $_POST['review2_example2'],
				'year_end_reviewb_status' => 1
			);
			$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$review_data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
			if ($update == 1) {
				$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id']);
			}
			else
			{
				print_r("error occured");
			}
		}
		else
		{
			$model->Reporting_officer1_id = $appriaser_1;
			$model->employee_review1 = $_POST['employee_review1'];
			$model->employee_review2 = $_POST['employee_review2'];
			$model->review1_example1 = $_POST['review1_example1'];
			$model->review1_example2 = $_POST['review1_example2'];
			$model->review2_example1 = $_POST['review2_example1'];
			$model->review2_example2 = $_POST['review2_example2'];
			$model->review_date = date('Y-m-d');
			$model->goal_set_year = date('Y');
			if($model->validate())
			{
				if($model->save())
				{
					$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id']);
				}
			}	
			else
			{
				print_r("error occured");
			}
		}		
		
	}

	function actiongoalnotification($mail_id = NULL)
    {
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$where1 = 'where Email_id = :Email_id';
	$list1 = array('Email_id');
	$data2 = array($mail_id);
	$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		 $message->view = "appraiser_to_emp1";
		  $params = array('mail_data'=>$employee_data1);
		   $message->setBody($params, 'text/html');
		  $message->subject = 'Appraisal Request Approve';
		  $message->addTo($mail_id);
		 $message->addCC('mssadafule@gmail.com');  
		  $message->from = $Employee_id;
		  	$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($mail_id);
			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  $notification_data->notification_type = 'Year end Review(B) submmited.';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }
    }



	function actionfetch_yer1($Employee_id = null)
	{
		$model=new Yearend_reviewbForm;
		$where = ' where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$empl_result = $model->get_employee_data($where,$data,$list);
		$selected_option = 'year end review';
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_view',array('empl_result'=>$empl_result));
		$this->render('//site/footer_view_layout');

	}

	function actionupdate_yer()
	{
		
		$model = new Yearend_reviewbForm;
		
		$data = array(
			'Employee_id' => '1', 
			'Reporting_officer1_id' => '11111', 
			'appraiser_review' => 'gfdgfdgf', 
			'employee_review1' => $_POST['employee_review1'],
			'employee_review2' => $_POST['employee_review2'], 
			'review1_example1' => $_POST['review1_example1'], 
			'review1_example2' => $_POST['review1_example2'],
			'review2_example1' => $_POST['review2_example1'],
			'review2_example2' => $_POST['review2_example2'],
			'review_date' => date('Y-m-d')
			
		);
		
		$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data,'Employee_id=:Employee_id',array(':Employee_id'=>'1'));
		if ($update!=0) {
			print_r("success");
		}
		
		
	}
}

?>
			
