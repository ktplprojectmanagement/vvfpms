<?php

class Year_endreviewController extends Controller
{
	public function actionIndex()
	{
		$model=new KpiAutoSaveForm;
		$setting_date=new SettingsForm;
		$emploee_data =new EmployeeForm;
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
			$where = 'where Employee_id = :Employee_id and mid_KRA_final_status = :mid_KRA_final_status and goal_set_year = :goal_set_year';
			$list = array('Employee_id','mid_KRA_final_status','goal_set_year');
			$data = array($Employee_id,'Approved',$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);        	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($Employee_id,$settings_data1['0']['setting_type']);
					$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and mid_KRA_final_status = :mid_KRA_final_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','mid_KRA_final_status','goal_set_year');
				$data = array($Employee_id,'Approved',date('Y'));
				$kpi_data = $model->get_kpi_list($where,$data,$list);
		}

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $emploee_data->get_employee_data($where,$data,$list);		
		$kpi = $model->getdata();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_reviewa',array('kpi_data' => $kpi_data,'emp_data' => $emp_data));
		$this->render('//site/footer_view_layout');		
	}	

	public function actionappraiser_end_review($Employee_id = null)
	{
		$model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
		$KRA_status_flag = '2';$emp_data = '';
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
			$kpi_data = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
			$list = array('Employee_id','KRA_status_flag','goal_set_year');
			$data = array($Employee_id,'3',date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);
		}	
		for ($i=0; $i < count($kpi_data); $i++) { 
			$emp_id = $kpi_data[$i]['Employee_id'];
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data[$i] = $employee->get_employee_data($where,$data,$list);
		}

		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array(Yii::app()->user->getState("employee_email"));
		$as_apr_data = $employee->get_employee_data($where,$data,$list);
		//print_r($kpi_data);die();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/sub_emp_endreview',array('kpi_data' => $kpi_data,'emp_data' => $emp_data,'as_apr_data'=>$as_apr_data));	
		$this->render('//site/footer_view_layout');		
	}

	function actionyear_end_reviewlist()
	{
		$model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
		$KRA_status_flag = '3';
		$emp_data = '';
		$selected_option = 'year end review';
		$kpi_data = $model->get_emp_list();

		for ($i=0; $i < count($kpi_data); $i++) { 
			$emp_id = $kpi_data[$i]['Employee_id'];
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($emp_id);
			$emp_data[$i] = $employee->get_employee_data($where,$data,$list);
		}
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_reviewlist',array('emp_data' => $emp_data));
		$this->render('//site/footer_view_layout');		
	}

	function actionupdatereview()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;

		if (isset($_FILES['employee_csv'.$_POST['kpi_value_id']]['name'])) {
			$filenamekey = md5(uniqid('employee_csv'.$_POST['kpi_value_id'], true)); 
			$Fileext = pathinfo($_FILES['employee_csv'.$_POST['kpi_value_id']]['name'], PATHINFO_EXTENSION);
			$model->document_proof=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('employee_csv'.$_POST['kpi_value_id']);
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/'.$model->document_proof);
		}
		else
		{
			$model->document_proof = '';
		}
		

		//print_r(Yii::getPathOfAlias('webroot').'/data(proof)/'.$model->document_proof);die();
		//print_r($_FILES['employee_csv325a434f9c2']['name']);die();
		
		$data = array(
			'year_end_reviewa' => $_POST['year_end_reviewa'],
			'year_end_achieve' => $_POST['year_end_achieve'], 
			'KRA_status_flag' => '3',
			'document_proof' =>$model->document_proof,
			'rating_by_emp' => $_POST['rating_by_emp_raiting'],
			//'final_kra_status' => 'Pending',
		);
		//print_r($data);die();
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['kpi_value_id']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['kpi_value_id']));
		//print_r($_POST['kpi_value_id']);die();
		if ($update==1) {
			echo 'success';
			//$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id'],'Year End Approval Request');
		}
		else
		{
			echo "error occured";
		}			
	}

function actionfinal_goal_review1()
	{
		$model=new KpiAutoSaveForm;	
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);

		$Employee_id = $_POST['emp_id'];
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and appraiser_end_rating != :appraiser_end_rating and goal_set_year = :goal_set_year';
			$list = array('Employee_id','appraiser_end_rating','goal_set_year');
			$data = array($Employee_id,'',$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and appraiser_end_rating != :appraiser_end_rating and goal_set_year = :goal_set_year';
				$list = array('Employee_id','appraiser_end_rating','goal_set_year');
				$data = array($Employee_id,'',$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);

				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data1['0']['setting_type']);
				$kpi_data1 = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and appraiser_end_rating != :appraiser_end_rating and goal_set_year = :goal_set_year';
			$list = array('Employee_id','appraiser_end_rating','goal_set_year');
			$data = array($Employee_id,'',date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,date('Y'));
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);
		}

		if(isset($kpi_data1) && isset($kpi_data))
		{
			if (count($kpi_data1) == count($kpi_data)) {
				echo '1';die();
			}
			else
			{
				echo '0';die();
			}
		}	
	}	

	function actiongoalnotification()
    {
    	$model=new KpiAutoSaveForm;
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
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
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  
			
			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
				  //print_r($kpi_data);die();
			 	} 
			}	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}	
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}			
		}    	

    	$Employee_id = Yii::app()->user->getState("employee_email");
    	Yii::import('ext.yii-mail.YiiMailMessage');
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		//print_r($employee_data1);die();
		  $message = new YiiMailMessage;
		  $message->view = "year_end_approval_mail";
		  $params = array('mail_data'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = "Year end review(A) goalsheet approved";
		  $message->addTo($employee_data1['0']['Email_id']);
		  $message->addCC('mssadafule@gmail.com');  
		  $message->from = $Employee_id;
		  	
		  $notification_data->notification_type = 'Year end review(A) submitted.';
		  $notification_data->Employee_id = $_POST['emp_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }
    }

function actiongoalnotification1()
    {
	$model=new KpiAutoSaveForm;
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
	
	$Emp_id = Yii::app()->user->getState("Employee_id");
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
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Emp_id,$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Pending',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Emp_id,$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Pending',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}	
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Emp_id,date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Pending',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}			
		}

    	Yii::import('ext.yii-mail.YiiMailMessage');
		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($Employee_id);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		  $message = new YiiMailMessage;
		  $message->view = "year_end_approval_pending";
		  $params = array('mail_data'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Year end review(A) approval pending';
		  $message->addTo($employee_data1['0']['Reporting_officer1_id']);
		  $message->addCC('mssadafule@gmail.com');  
		  $message->from = $Employee_id;
		  	$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($employee_data1['0']['Reporting_officer1_id']);
			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  $notification_data->notification_type = 'Year end review(A) submitted.';
		  $notification_data->Employee_id = $employee_data1['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }    	
    }

function actionfinal_goal_review()
	{
		$model=new KpiAutoSaveForm;	
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);

		$Employee_id = $_POST['emp_id'];
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
			$list = array('Employee_id','KRA_status_flag','goal_set_year');
			$data = array($Employee_id,'3',$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status_flag','goal_set_year');
				$data = array($Employee_id,'3',$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);

				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data1['0']['setting_type']);
				$kpi_data1 = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year';
			$list = array('Employee_id','KRA_status_flag','goal_set_year');
			$data = array($Employee_id,'3',date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,date('Y'));
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);
		}

		if(isset($kpi_data1) && isset($kpi_data))
		{
			if (count($kpi_data1) == count($kpi_data)) {
				echo '1';die();
			}
			else
			{
				echo '0';die();
			}
		}	
	}	

	function actionupdatereview_appraiser()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$final_kra_status = 'Pending';
		//$all_status = explode(';',$_POST['final_year_kra_status']);
		$pending_count = 0;
		//for ($i=0; $i < count($all_status); $i++) { 
			//if($all_status[$i] == 'Pending')
			//{
				//$pending_count = 1;break;
			//}
			//else
			//{
				$pending_count = 0;
			//}
		//}
		if ($pending_count==0) {
			$final_kra_status = 'Approved';
		}
		else
		{
			$final_kra_status = 'Pending';
		}
		$data = array(
			'appraiser_end_review' => $_POST['appraiser_comment'], 
			'appraiser_end_rating' => $_POST['appraiser_raiting'],
			'appraiser_avrage_end' => $_POST['average_rating'],
			//'final_year_kra_status' => $_POST['final_year_kra_status'],
			'KRA_status_flag' => 3,
			//'rating_by_emp' => $_POST['rating_by_emp_raiting'],
		);
		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data2 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where1,$data2,$list1);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		if ($update==1) {
			echo 'success';
			//$this->actiongoalnotification($employee_data['0']['Email_id'],'Year End(A) Review Done');
		}
		else
		{
			echo "error occured";
		}			
	}
	
}	
