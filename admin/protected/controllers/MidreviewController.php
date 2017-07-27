<?php

class MidreviewController extends Controller
{
	function actionIndex()
	{
		Yii::app()->user->setState('emp_id_3','');
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'Approved');
		$kpi_data = $model->get_kpi_list($where,$data,$list);

		$where = 'where appraisal_id1 = :appraisal_id1 and mid_KRA_status = :mid_KRA_status';
		$list = array('appraisal_id1','mid_KRA_status');
		$data = array($id,'');
		$emp_data = $model->get_emp_id_list($where,$data,$list);

		$cnt = 0;$kpi_emp_data = '';$kpi_data_aprv = '';$kpi_emp_data_aprv = '';$kpi_data_aprv1 = '';
		//print_r($kpi_data);die();
		if (isset($emp_data) && count($emp_data)>0) {
				foreach ($emp_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$kpi_emp_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				//print_r($row['Employee_id']);echo "<br>";
				$cnt++;
			}
			
		}

		$where1 = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
		$list1 = array('appraisal_id1','KRA_status');
		$data1 = array($id,'Approved');
		$kpi_data_aprv = $model->get_kpi_list($where1,$data1,$list1);
		

		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'Approved');
		$emp_data1 = $model->get_emp_id_list($where,$data,$list);
		$cnt = 0;
		//print_r($emp_data1);die();
		if (isset($emp_data1) && count($emp_data1)>0) {
				foreach ($emp_data1 as $row) {
				$where1 = 'where Employee_id = :Employee_id';
				$list1 = array('Employee_id');
				$data1 = array($row['Employee_id']);
				$kpi_data_aprv1[$cnt] = $model->get_kpi_list($where1,$data1,$list1);

				$where1 = 'where Employee_id = :Employee_id';
				$list1 = array('Employee_id');
				$data1 = array($row['Employee_id']);
				$kpi_emp_data_aprv[$cnt] = $emploee_data->get_employee_data($where1,$data1,$list1);
				//print_r($row['Employee_id']);echo "<br>";
				$cnt++;
			}
			
		}
		
		//print_r($kpi_emp_data_aprv);die();
		//$mid_review = '1';
		$selected_option = 'Mid_review';
		//die();
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/mid_review_emp_list',array('kpi_data'=>$kpi_data,'kpi_emp_data'=>$kpi_emp_data,'kpi_data_aprv'=>$kpi_data_aprv1,'kpi_emp_data_aprv'=>$kpi_emp_data_aprv));
		$this->render('//site/footer_view_layout');

		
	}

	function actionmidreview_emp_data()
	{
		if (isset($_POST['emp_id'])) {
			$employee_id = Yii::app()->user->setState('emp_id_3',$_POST['emp_id']);
		}
		else
		{
			$employee_id = '';
		}
		$employee_id = Yii::app()->user->getState('emp_id_3');
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$get_idp_data =new IDPForm;
		$prg_cnt = 0;
		$id = Yii::app()->user->getState("employee_email");$kpi_data1 = '';$kpi_data='';
		if (count($settings_data)>0) {
        		$where = 'where appraisal_id1 = :appraisal_id1 and Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
				$list = array('appraisal_id1','Employee_id','goal_set_year');
				$data = array($id,$employee_id,$settings_data['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);
				$where = 'where Employee_id = :Employee_id and goal_set_year =:goal_set_year and midyear_status_flag =:midyear_status_flag';
				$list = array('Employee_id','goal_set_year','midyear_status_flag');
				$data = array($employee_id,$settings_data['0']['setting_type'],'Approved');
				$program_data_detail = $get_idp_data->get_idp_data($where,$data,$list);
				
				if(isset($program_data_detail) && count($program_data_detail)>0)
				{
				$prg_cnt = 1;
				}
		}
		else
		{
			$where = 'where appraisal_id1 = :appraisal_id1 and Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
				$list = array('appraisal_id1','Employee_id','goal_set_year');
				$data = array($id,$employee_id,date('Y'));
				$kpi_data = $model->get_kpi_list($where,$data,$list);
				$where = 'where Employee_id = :Employee_id and goal_set_year =:goal_set_year and midyear_status_flag =:midyear_status_flag';
				$list = array('Employee_id','goal_set_year','midyear_status_flag');
				$data = array($employee_id,date('Y'),'Approved');
				$program_data_detail = $get_idp_data->get_idp_data($where,$data,$list);
				if(isset($program_data_detail) && count($program_data_detail)>0)
				{
				$prg_cnt = 1;
				}
		}
		
		
		$cnt = 0;$employee_data = '';
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($employee_id);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
		//$mid_review = 1;
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'prg_cnt'=>$prg_cnt));
		$this->render('//site/footer_view_layout');
	}

	function actionmidupdategoal()
	{

		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		
		$final_status = 'Pending';
		$all_status = explode(';',$_POST['mid_KRA_status']);
		$pending_count = 0;
		
		$data = array(
			'appraiser_comment' => $_POST['appraiser_comment'],	
			'mid_review_date' => date('Y-m-d'),
			'mid_KRA_status' => $_POST['mid_KRA_status'],
		);
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		
		if ($update) {
			echo "success";
			//$this->actionsendmail($_POST['KPI_id']);
		}
		else
		{
			echo "error occured";
		}
	}

	function actionsubmitidp()
	{
		$model=new IDPForm;
		$model->KPI_id = $_POST['KPI_id'];
		$model->IDP_status = $_POST['IDP_status'];
		$model->IDP_comment	 = $_POST['IDP_comment'];
		$model->idp_date = date('Y-m-d');
		if($model->save())
		{
			print_r("success");
		}
		else
		{
			print_r("error occured");
		}
	}

	function actionget_idp()
	{
		$model=new IDPForm;
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_idp_data($where,$data1,$list);
		echo json_encode($kpi_data);die();
	}

	function actionupdateidp()
	{
		$model=new IDPForm;
		
		$data = array(
			'IDP_status' => $_POST['IDP_status'],	
			'IDP_comment' => $_POST['IDP_comment'],
			'idp_date' => date('Y-m-d')
		);
		
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
	}

	function actionsetbyemployee()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
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
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status';
			$list = array('Employee_id','goal_set_year','KRA_status');
			$data = array($Employee_id,$settings_data['0']['setting_type'],'Pending');
			$kpi_data = $model->get_kpi_list($where,$data,$list);
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
				if ($settings_data1['0']['setting_type'] == $year) {
					$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status';
					$list = array('Employee_id','goal_set_year','KRA_status');
					$data = array($Employee_id,$settings_data1['0']['setting_type'],'Pending');
					$kpi_data = $model->get_kpi_list($where,$data,$list);					
				} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status';
			$list = array('Employee_id','goal_set_year','KRA_status');
			$data = array($Employee_id,date('Y'),'Pending');
			$kpi_data = $model->get_kpi_list($where,$data,$list);			
		}
		
		//print_r($Employee_id);die();
		$mid_review = '1';
		$mid_review_by_employee = '1';$employee_data = '';
		if (count($kpi_data)>0) {
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($kpi_data['0']['Employee_id']);
			$employee_data = $emploee_data->get_employee_data($where,$data,$list);
		}
		
		
		$selected_option = 'Mid_review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/employee_mid_review',array('kpi_data'=>$kpi_data,'mid_review'=>$mid_review,'mid_review_by_employee'=>$mid_review_by_employee,'employee_data'=>$employee_data));
		$this->render('//site/footer_view_layout');
	}

	function actionemployee_mid_review()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;		
		
		$data = array(
			'employee_comment' => $_POST['review_comments'],	
			'mid_review_by_employee_date' => date('Y-m-d'),	
			'mid_KRA_final_status' => 'Pending',		
		);
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		
		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		
		if ($update==1) {

			echo "success";die();
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
			$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year';
			$list = array('Employee_id','mid_KRA_status','goal_set_year');
			$data = array($Employee_id,'',$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);  

                        if (count($kpi_data1)>0) {
				for ($i=0; $i < count($kpi_data1); $i++) { 
			 		$update_flag = array(
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data1[$i]['KPI_id'])); 
			 	} 
			}	    	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','mid_KRA_status','goal_set_year');
				$data = array($Employee_id,'',$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);

				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data1['0']['setting_type']);
				$kpi_data1 = $model->get_kpi_list($where,$data,$list);
			} 

                        if (count($kpi_data1)>0) {
				for ($i=0; $i < count($kpi_data1); $i++) { 
			 		$update_flag = array(
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data1[$i]['KPI_id'])); 
			 	} 
			}	  
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year';
			$list = array('Employee_id','mid_KRA_status','goal_set_year');
			$data = array($Employee_id,'',date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,date('Y'));
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);

                        if (count($kpi_data1)>0) {
				for ($i=0; $i < count($kpi_data1); $i++) { 
			 		$update_flag = array(
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data1[$i]['KPI_id'])); 
			 	} 
			}	  
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

	
	function actionsendmail()
    {
    	$model=new KpiAutoSaveForm;
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
//print_r($_POST['emp_id']);die();
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
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
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
				$data = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);  

			if (count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
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
				  		'KRA_status_flag' => 2,
						'mid_KRA_final_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
			 	} 
			}			
		}    	

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['emp_id']);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
    	
    	$notification_data->notification_type = 'Mid Review Approved';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();		  
 if($employee_data['0']['invalid_email'] != '1')
       {
        Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		 $message->view = "appraiser_to_emp2";
		  $params = array('mail_data'=>$employee_data);
		   $message->setBody($params, 'text/html');
		  $message->subject = 'Mid Year Review Approved';
		  $message->addTo($employee_data['0']['Email_id']);
		  //$message->addTo('mssadafule@gmail.com');  
		 $message->addTo(Yii::app()->user->getState("employee_email"));
		  $message->from = $employee_data['0']['Reporting_officer1_id'];
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Mid Year Review Updation Done";die();
		  }
       }
       else
       {
          echo "Mid Year Review Updation Done";die();
       }
    	
    }	

	function actionget_mid_emp_data()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

       
        $kpi_data1 = '';$kpi_data='';
		if (count($settings_data)>0) {
        	$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);	
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);	
        	} 
		}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);
		}
		$mid_status = 0;
		if (count($kpi_data)>0) {
			for ($i=0; $i < count($kpi_data); $i++) { 
				if ($kpi_data[$i]['mid_KRA_final_status'] == 'Pending' || $kpi_data[$i]['mid_KRA_final_status'] == 'Approved') {
					$mid_status++;
				}
			}
		}
		
		print_r($mid_status.'-'.count($kpi_data));die();
	}

	function actiongoalnotification()
    {
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    	$emp_id = Yii::app()->user->getState("Employee_id");
    	//print_r($appriaser_1);die();
	$where1 = 'where Email_id = :Email_id';
	$list1 = array('Email_id');
	$data2 = array($appriaser_1);
	$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
	$where1 = 'where Email_id = :Email_id';
	$list1 = array('Email_id');
	$data2 = array(Yii::app()->user->getState("employee_email"));
	$employee_data2 = $emploee_data->get_employee_data($where1,$data2,$list1);
$notification_data->notification_type = 'Mid Review Done';
		  $notification_data->Employee_id = $employee_data1['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
 if($employee_data1['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "email_appraiser";
		  $params = array('mail_data'=>$employee_data1,'mail_data1'=>$employee_data2);
		   $message->setBody($params, 'text/html');
		  $message->subject = 'Midreview Approval Pending';
		  $message->addTo($appriaser_1);
		 //$message->addCC('mssadafule@gmail.com');  
		  $message->from = $Employee_id;
		  	$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($appriaser_1);
			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  
		  $data_new = array(
				'mid_KRA_final_status' => 'Approved',		
			);
		  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data_new,'Employee_id=:Employee_id',array(':Employee_id'=>$emp_id));
		  //print_r($emp_id);die();
		  if ($update == 1) {
		  	if(Yii::app()->mail->send($message))
			  {
			  		echo "Notification Send";die();
			  }
		  }
       }
       else
       {
          echo "Notification Send";die();
       }

    	
		  
    }

	
}
