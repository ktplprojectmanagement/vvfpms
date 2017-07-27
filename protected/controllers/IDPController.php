<?php

class IDPController extends Controller
{

	public function actionIndex()
	{
		if (Yii::app()->user->getState("Employee_id")!='') 
		{
			$model = new LoginForm;	
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;	
			$IDPForm =new IDPForm;	
			$Compare_Designation =new CompareDesignationForm;		
			//$program_data_result = $program_data->get_data();
			$where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
			$Employee_id = Yii::app()->user->getState("Employee_id");
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data = $employee->get_employee_data($where,$data,$list);
			$designation_flag = 0;

			if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
				$where = 'where designation = :designation';
				$list = array('designation');
				$data = array($emp_data['0']['Designation']);
				$Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
				if (isset($Compare_Designation1['0']['flag'])) {
					$designation_flag = $Compare_Designation1['0']['flag'];
				}
				
			}
			$where = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'));
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
			//print_r($IDP_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data['0']['Reporting_officer1_id']);
			$mgr_data = $employee->get_employee_data($where,$data,$list);

			$selected_option = 'IDP';
			$this->render('//site/script_file');
			$this->render('//site/session_check_view');
			$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_form',array('program_data_result'=>$program_data_result,'emp_data'=>$emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag));
			$this->render('//site/footer_view_layout');
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
		
	}

	public function actionsubordinate_idp()
	{
		$employee_email = '';$appriaser_1 = '';
    	//print_r($_POST['emp_id']);die();
    	$emploee_data =new EmployeeForm;
                $notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
//print_r($_POST['emp_id']);die();
    	$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$mail_id = $employee_data1['0']['Email_id'];
    	//print_r(Yii::app()->user->getState("employee_email"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		if (count($settings_data)>0) {
        	$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);	
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data2 = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
        	} 
		}
		else
		{			
			$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],date('Y'));
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
		}
		
                if (isset($_POST['chk_goalsheet_flag'])) {
			for ($i=0; $i < count($kra_data); $i++) { 
			$data = array(
			'KRA_status' => 'Approved',
			);
			$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_data[$i]['KPI_id']));
		}
		
    	
$notification_data->notification_type = 'Updated Goalsheet';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();	

      
    	 
			
		}
		if (isset($_POST['emp_id'])) {
			$emp_id = Yii::app()->user->setState('emp_id2',$_POST['emp_id']);
		}
		else
		{
			$emp_id = '';
		}
		$emp_id = Yii::app()->user->getState('emp_id2');
		//print_r($emp_id);die();
			$model = new LoginForm;	
			$model1 = new KpiAutoSaveForm;
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;	
			$IDPForm =new IDPForm;	
			$Compare_Designation =new CompareDesignationForm;	
			$setting_date=new SettingsForm;	
			$program_data_result = $program_data->get_data();

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
			
			$Employee_id = $emp_id;
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data = $employee->get_employee_data($where,$data,$list);

			$designation_flag = 0;

			if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
				$where = 'where designation = :designation';
				$list = array('designation');
				$data = array($emp_data['0']['Designation']);
				$Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
				if (isset($Compare_Designation1['0']['flag'])) {
					$designation_flag = $Compare_Designation1['0']['flag'];
				}
				
			}

			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
			//print_r($IDP_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data['0']['Reporting_officer1_id']);
			$mgr_data = $employee->get_employee_data($where,$data,$list);
			
			if (count($settings_data)>0) {
				$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status','goal_set_year');
				$data = array($Employee_id,'Approved',$settings_data['0']['setting_type']);
				$KRA_status = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($KRA_status) && count($KRA_status)>0)
				{
				$prg_cnt = 1;
				}
			}
			else if (count($settings_data1)>0) {
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
				if ($settings_data1['0']['setting_type'] == $year) {
					$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
					$list = array('Employee_id','KRA_status','goal_set_year');
					$data = array($Employee_id,'Approved',$settings_data1['0']['setting_type']);
					$KRA_status = $model1->get_kpi_list($where,$data,$list);
					$prg_cnt = 0;
					if(isset($KRA_status) && count($KRA_status)>0)
					{
					$prg_cnt = 1;
					}
				} 
			}
			else
			{
				$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status','goal_set_year');
				$data = array($Employee_id,'Approved',date('Y'));
				$KRA_status = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($KRA_status) && count($KRA_status)>0)
				{
				$prg_cnt = 1;
				}
			}
			

			$selected_option = 'IDP';
			//$this->render('//site/script_file');
			//$this->render('//site/session_check_view');
			//$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_form1',array('program_data_result'=>$program_data_result,'emp_data'=>$emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag,'prg_cnt'=>$prg_cnt));
			//$this->render('//site/footer_view_layout');
		
	}

	public function actionMidyear_subordinate_idp()
	{
			if (isset($_POST['emp_id'])) {
			$emp_id = Yii::app()->user->setState('emp_id_4',$_POST['emp_id']);
			}
			else
			{
				$employee_id = '';
			}
			$emp_id = Yii::app()->user->getState('emp_id_4');
		
			$model = new LoginForm;	
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;	
			$IDPForm =new IDPForm;	
			$Compare_Designation =new CompareDesignationForm;	
			$model1=new KpiAutoSaveForm;	
			$program_data_result = $program_data->get_data();
			$setting_date=new SettingsForm;
			$where = 'where setting_content = :setting_content and year = :year';
			$list = array('setting_content','year');
			$data = array('PMS_display_format',date('Y'));             
			$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

			$where = 'where setting_content = :setting_content and year = :year';
			$list = array('setting_content','year');
			$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
			$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
			
			$Employee_id = $emp_id;
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data = $employee->get_employee_data($where,$data,$list);
			
			if (count($settings_data)>0)
			 {
				$where = 'where Employee_id = :Employee_id and mid_KRA_final_status =:mid_KRA_final_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','mid_KRA_final_status','goal_set_year');
				$data = array($emp_id,'Approved',$settings_data['0']['setting_type']);
				$IDP_data_mid = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($IDP_data_mid) && count($IDP_data_mid)>0)
				{
				$prg_cnt = 1;
				}
			}
			else if (count($settings_data1)>0) {
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
				if ($settings_data1['0']['setting_type'] == $year) {
					$where = 'where Employee_id = :Employee_id and mid_KRA_final_status =:mid_KRA_final_status and goal_set_year = :goal_set_year';
					$list = array('Employee_id','mid_KRA_final_status','goal_set_year');
					$data = array($emp_id,'Approved',$settings_data1['0']['setting_type']);
					$IDP_data_mid = $model1->get_kpi_list($where,$data,$list);
					$prg_cnt = 0;
					if(isset($IDP_data_mid) && count($IDP_data_mid)>0)
					{
					$prg_cnt = 1;
					}
				} 
			}
			else
			{
				$where = 'where Employee_id = :Employee_id and mid_KRA_final_status =:mid_KRA_final_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','mid_KRA_final_status','goal_set_year');
				$data = array($emp_id,'Approved',date('Y'));
				$IDP_data_mid = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($IDP_data_mid) && count($IDP_data_mid)>0)
				{
				$prg_cnt = 1;
				}
			}
			

			$designation_flag = 0;

			if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
				$where = 'where designation = :designation';
				$list = array('designation');
				$data = array($emp_data['0']['Designation']);
				$Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
				if (isset($Compare_Designation1['0']['flag'])) {
					$designation_flag = $Compare_Designation1['0']['flag'];
				}
				
			}

			$where = 'where Employee_id = :Employee_id and set_status = :set_status';
			$list = array('Employee_id','set_status');
			$data = array($Employee_id,'Approved');
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
			//print_r($IDP_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data['0']['Reporting_officer1_id']);
			$mgr_data = $employee->get_employee_data($where,$data,$list);

			$selected_option = 'IDP';
			$this->render('//site/script_file');
			$this->render('//site/session_check_view');
			$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_form2',array('program_data_result'=>$program_data_result,'emp_data'=>$emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag,'prg_cnt'=>$prg_cnt));
			$this->render('//site/footer_view_layout');
		
	}

public function actionMidyear_subordinate_idp1()
	{
		
			$model = new LoginForm;	
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;	
			$IDPForm =new IDPForm;	
			$Compare_Designation =new CompareDesignationForm;		
			$program_data_result = $program_data->get_data();
			$emp_id = Yii::app()->user->getState("Employee_id");	
			$Employee_id = $emp_id;
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data = $employee->get_employee_data($where,$data,$list);

			$designation_flag = 0;

			if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
				$where = 'where designation = :designation';
				$list = array('designation');
				$data = array($emp_data['0']['Designation']);
				$Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
				if (isset($Compare_Designation1['0']['flag'])) {
					$designation_flag = $Compare_Designation1['0']['flag'];
				}
				
			}

			$where = 'where Employee_id = :Employee_id and set_status = :set_status';
			$list = array('Employee_id','set_status');
			$data = array($Employee_id,'Approved');
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
			//print_r($IDP_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data['0']['Reporting_officer1_id']);
			$mgr_data = $employee->get_employee_data($where,$data,$list);

			$selected_option = 'IDP';
			$this->render('//site/script_file');
			$this->render('//site/session_check_view');
			$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_form3',array('program_data_result'=>$program_data_result,'emp_data'=>$emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag));
			$this->render('//site/footer_view_layout');
		
	}

	function actionadd()
	{
		$model=new ProgramDataForm;
		if ($_POST['faculty_email_id'] != '') {
			$data_get = explode(';',$_POST['faculty_email_id']);
			$model->faculty_email_id = $data_get[0];
			$model->faculty_name = $data_get[1];
		}
		//print_r($_POST['faculty_email_id']);die();
		
		$model->program_name = $_POST['program_name'];
		$model->faculty_type = $_POST['faculty_type'];
		$model->amount = $_POST['amount'];
		$model->external_name = $_POST['external_name'];		
		$model->training_days = $_POST['training_days'];
		if($model->save())
	  	{
	  		print_r("Successfully Saved");die();
	  	}
	  	else
	  	{
	  		print_r("No changes done");die();
	  	}
		
	}

	function actiondel_record()
	{
		$command = Yii::app()->db->createCommand();		
		$query_result = $command->delete('program_data', 'id=:id', array(':id'=>$_POST['id']));
		if ($query_result>0) {
			echo '1';
		}
		else
		{
			echo '0';
		}
	}

function actionsave_data1()
	{
		$model=new IDPForm;

		$Employee_id = $_POST['emp_code'];
		$where = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year ';
		$list = array('Employee_id','goal_set_year');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'));
		$IDP_data = $model->get_idp_data($where,$data,$list);
		
//echo Yii::app()->user->getState('financial_year_check');die();
		if (count($IDP_data)>0) {
				$detail = array(
				'Employee_id' => isset($_POST['emp_code']) ? $_POST['emp_code'] : '',
				'program_comment' => isset($_POST['prgrm_cmd']) ? $_POST['prgrm_cmd'] : '',
				'extra_topic' => isset($_POST['topic']) ? $_POST['topic'] : '',
				'extra_days' => isset($_POST['date_value']) ? $_POST['date_value'] : '',
				'extra_faculty' => isset($_POST['faculty_value']) ? $_POST['faculty_value'] : '',
				'rel_target_date' => isset($_POST['development_data']) ? $_POST['development_data'] : '',
				'meeting_planned' => isset($_POST['number_of_meetings']) ? $_POST['number_of_meetings'] : '',
				'topic_to_be_diss' => isset($_POST['topic_diss1']) ? $_POST['topic_diss1'] : '',
				'leader_name' => isset($_POST['faculty_value1']) ? $_POST['faculty_value1'] : '',
				'project_title' => isset($_POST['project_title']) ? $_POST['project_title'] : '',
				'project_review_date' => isset($_POST['review_date']) ? $_POST['review_date'] : '',
				'project_end_date' => isset($_POST['target_end_date']) ? $_POST['target_end_date'] : '',
				'project_scope' => isset($_POST['project_scope']) ? $_POST['project_scope'] : '',
				'project_exclusion' => isset($_POST['project_exclusion']) ? $_POST['project_exclusion'] : '',
				'Project_deliverables' => isset($_POST['Project_deliverables']) ? $_POST['Project_deliverables'] : '',
				'learn_from_project' => isset($_POST['learn_from_project']) ? $_POST['learn_from_project'] : '',
				'Reviewer' => isset($_POST['Reviewer']) ? $_POST['Reviewer'] : '',	
			    'set_status' => "Pending",
			    
			);
		    //print_r($detail);die();	
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id AND goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_code'],':goal_set_year'=>Yii::app()->user->getState('financial_year_check')));
			//print_r($update);die();	
			if($update>0)
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}
		else
		{
			$model->Employee_id = $_POST['emp_code'];
			$model->program_comment = $_POST['prgrm_cmd'];
			$model->extra_topic = $_POST['topic'];
			$model->extra_days = $_POST['date_value'];		
			$model->extra_faculty = $_POST['faculty_value'];
			$model->rel_target_date = $_POST['development_data'];
			$model->meeting_planned = $_POST['number_of_meetings'];	
			$model->leader_name = $_POST['faculty_value1'];
			$model->project_title = $_POST['project_title'];
			$model->project_review_date = $_POST['review_date'];
			$model->project_end_date = $_POST['target_end_date'];
			$model->project_scope = $_POST['project_scope'];
			$model->project_exclusion = $_POST['project_exclusion'];
			$model->Project_deliverables = $_POST['Project_deliverables'];
			$model->learn_from_project = $_POST['learn_from_project'];
			$model->Reviewer = $_POST['Reviewer'];
			$model->Reporting_officer1_id = $_POST['Reporting_officer1_id'];
			$model->set_status = "Pending";
			$model->goal_set_year =Yii::app()->user->getState('financial_year_check');
			$model->topic_to_be_diss = $_POST['topic_diss1'];
			//print_r($model->attributes);die();
			if($model->save())
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}	
		
		
	}

	function actionsave_data()
	{
		$model=new IDPForm;

		$Employee_id = $_POST['emp_code'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$IDP_data = $model->get_idp_data($where,$data,$list);

		if (count($IDP_data)>0) {
			$detail = array(
				'Employee_id' => $_POST['emp_code'],
				'program_comment' => $_POST['prgrm_cmd'],
				'extra_topic' => $_POST['topic'],
				'extra_days' => $_POST['date_value'],
				'extra_faculty' => $_POST['faculty_value'],
				'Reporting_officer1_id' => $_POST['Reporting_officer1_id'],
				'set_status' => "Pending",
			);
			//print_r($detail);die();
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_code']));

			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}
		else
		{
			$model->Employee_id = $_POST['emp_code'];
			$model->program_comment = $_POST['prgrm_cmd'];
			$model->extra_topic = $_POST['topic'];
			$model->extra_days = $_POST['date_value'];		
			$model->extra_faculty = $_POST['faculty_value'];
			$model->Reporting_officer1_id = $_POST['Reporting_officer1_id'];
			$model->set_status = "Pending";

			if($model->save())
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}
		
	}

	function actionsend_for_approval()
	{
		$notification_data =new NotificationsForm;
		$emploee_data =new EmployeeForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array(Yii::app()->user->getState("Employee_id"));
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
		//print_r($employee_data);die();
$notification_data->notification_type = 'IDP Approval Request';
			  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
			  $notification_data->date = date('Y-m-d');
			  $notification_data->save();	
 if($employee_data1['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
			  $message->view = "idp_request";
			  $params = array('mail_data'=>$employee_data);
			  $message->setBody($params, 'text/html');
			  $message->subject = 'IDP Approval Request';
			  $message->addTo($employee_data['0']['Reporting_officer1_id']);
			//$message->addTo(' vvf.pms@vvfltd.com');		  
			  $message->from = $employee_data['0']['Email_id'];
			  	 
			//print_r($kra_data);die(); 
			  if(Yii::app()->mail->send($message))
			  {
$detail = array(
				'goal_set_year' => date('Y').'-'.date('Y', strtotime('+1 year'))
			);
			
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));	  		
			  		echo "Successfully Saved";die();
       }
       else
       {
          echo "Successfully Saved";die();
       }
		
			  }		  		
	}

	function actionsave_data_final()
	{
		$model=new IDPForm;

		$Employee_id = $_POST['emp_code'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$IDP_data = $model->get_idp_data($where,$data,$list);

		if (count($IDP_data)>0) {
				$detail = array(
				// 'Employee_id' => $_POST['emp_code'],
				'program_comment' => $_POST['prgrm_cmd'],
				'extra_topic' => $_POST['topic'],
				'extra_days' => $_POST['date_value'],
				'extra_faculty' => $_POST['faculty_value'],
				'rel_target_date' => $_POST['development_data'],
				'meeting_planned' => $_POST['number_of_meetings'],
				'leader_name' => $_POST['faculty_value1'],
				'project_title' => $_POST['project_title'],
				'project_review_date' => $_POST['review_date'],
				'project_end_date' => $_POST['target_end_date'],
				'project_scope' => $_POST['project_scope'],
				'project_exclusion' => $_POST['project_exclusion'],
				'Project_deliverables' => $_POST['Project_deliverables'],
				'learn_from_project' => $_POST['learn_from_project'],
				'Reviewer' => $_POST['Reviewer'],	
				// 'Reporting_officer1_id' => $_POST['Reporting_officer1_id'],
				'set_status' => "Pending",
			);
			//print_r($detail);die();	
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_code']));

			if($update>0)
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}
		else
		{
			$model->Employee_id = $_POST['emp_code'];
			$model->program_comment = $_POST['prgrm_cmd'];
			$model->extra_topic = $_POST['topic'];
			$model->extra_days = $_POST['date_value'];		
			$model->extra_faculty = $_POST['faculty_value'];
			$model->rel_target_date = $_POST['development_data'];
			$model->meeting_planned = $_POST['number_of_meetings'];	
			$model->leader_name = $_POST['faculty_value1'];
			$model->project_title = $_POST['project_title'];
			$model->project_review_date = $_POST['review_date'];
			$model->project_end_date = $_POST['target_end_date'];
			$model->project_scope = $_POST['project_scope'];
			$model->project_exclusion = $_POST['project_exclusion'];
			$model->Project_deliverables = $_POST['Project_deliverables'];
			$model->learn_from_project = $_POST['learn_from_project'];
			$model->Reviewer = $_POST['Reviewer'];
			$model->Reporting_officer1_id = $_POST['Reporting_officer1_id'];
			$model->set_status = "Pending";
			print_r($model->attributes);die();
			if($model->save())
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}	
	}

	function actionmid_save_data()
	{
		$model=new IDPForm;

		$Employee_id = $_POST['emp_code'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$IDP_data = $model->get_idp_data($where,$data,$list);

		if (count($IDP_data)>0) {
			$detail = array(
				'Employee_id' => $_POST['emp_code'],
				'mid_prgrm_cmd' => $_POST['prgrm_cmd'],
				'mid_status' => $_POST['program_status'],
				'extra_prgrm_cmd' => $_POST['extra_prgrm_cmd'],
				'extra_program_status' => $_POST['extra_program_status'],
				'rel_program_review' => $_POST['rel_program_review'],
				'rel_program_review_status' => $_POST['rel_program_review_status'],
				'project_mid_review' => $_POST['project_mid_review'],
				'project_mid_status' => $_POST['project_mid_status'],
			);
			//print_r($detail);die();
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_code']));

			if($update>0)
		  	{
		  		print_r("Successfully Saved");die();
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}
	}

	function actionmid_idp_approval()
	{
		$notification_data =new NotificationsForm;
		$emploee_data =new EmployeeForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['emp_id']);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
				//print_r($employee_data);die();
$detail = array(
				'midyear_status_flag' => "Approved",
			);
			//print_r($detail);die();
			$update = Yii::app()->db->createCommand()->update('IDP',$detail,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));	
$notification_data->notification_type = 'Midyear IDP approved';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();	
if($employee_data['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "mid_idp_approve";
		  $params = array('mail_data'=>$employee_data);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Midyear IDP approved';
		  $message->addTo($employee_data['0']['Email_id']);
		//$message->addTo('mssadafule@gmail.com');		  
		  $message->from = $employee_data['0']['Reporting_officer1_id'];		  	 
	//print_r($kra_data);die(); 
	  if(Yii::app()->mail->send($message))
	  {	  
				
	  		print_r("Successfully Saved");die();
	  }		  
       }
       else
       {
          print_r("Successfully Saved");die();
       }

		
	}




	function actionIDP_approvegoal_list()
	{
		Yii::app()->user->setState('emp_id2','');
		$model=new IDPForm;
		$emploee_data =new EmployeeForm;

		$where = 'where Email_id = :Email_id';
		$list = array('Email_id');
		$data = array(Yii::app()->user->getState("employee_email"));
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);

		$id = Yii::app()->user->getState("employee_email");
		//print_r($id);die();
		$where = 'where Reporting_officer1_id = :Reporting_officer1_id GROUP BY Employee_id';
		$list = array('Reporting_officer1_id');
		$data = array($id);
		$kpi_data = $model->get_idp_data($where,$data,$list);
		//print_r($kpi_data);die();
		//print_r($kpi_data);die();
		$cnt = 0;
		if (isset($kpi_data) && count($kpi_data)>0) {
				foreach ($kpi_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				$cnt++;
			}
			
		}

		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/goal_list_view1',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'approved_list'=>'approved_list'));
		$this->render('//site/footer_view_layout');
	}

		function actionIDP_Mid_approvegoal_list()
	{
		Yii::app()->user->setState('emp_id_4','');
		$model=new IDPForm;
		$emploee_data =new EmployeeForm;

		$where = 'where Email_id = :Email_id';
		$list = array('Email_id');
		$data = array(Yii::app()->user->getState("employee_email"));
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);

		$id = Yii::app()->user->getState("employee_email");
		//print_r($id);die();
		$where = 'where Reporting_officer1_id = :Reporting_officer1_id and set_status = :set_status GROUP BY Employee_id';
		$list = array('Reporting_officer1_id','set_status');
		$data = array($id,'Approved');
		$kpi_data = $model->get_idp_data($where,$data,$list);

		//print_r($kpi_data);die();
		$cnt = 0;
		if (isset($kpi_data) && count($kpi_data)>0) {
				foreach ($kpi_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				$cnt++;
			}
			
		}

		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/goal_list_view2',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'approved_list'=>'approved_list'));
		$this->render('//site/footer_view_layout');
	}

	function actiondel_extra_program()
	{
		$kra=new IDPForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		$update = 0;

		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

        if (count($settings_data)>0) {
        	$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kra_data = $kra->get_idp_data($where1,$data2,$list1);	

			$extra_topic1 = '';$extra_days1 = '';$extra_faculty1 = '';$extra_faculty = '';$update_detail = '';
			if (count($kra_data)>0) {
				$extra_topic = explode(';',$kra_data['0']['extra_topic']);
				$extra_days = explode(';',$kra_data['0']['extra_days']);
				$extra_faculty = explode(';',$kra_data['0']['extra_faculty']);
				for ($i=0; $i < count($extra_topic); $i++) { 
					if ($i != $_POST['current_row_id']) {
						
							if ($extra_topic1 == '') {
								$extra_topic1 = $extra_topic[$i];
								$extra_days1 = $extra_days[$i];
								$extra_faculty1 = $extra_faculty[$i];
							}
							else
							{
								$extra_topic1 = $extra_topic1.';'.$extra_topic[$i];
								$extra_days1 = $extra_days1.';'.$extra_days[$i];
								$extra_faculty1 = $extra_faculty1.';'.$extra_faculty[$i];
							}
					}
				}
				$update_detail = array(
					'extra_topic' => $extra_topic1, 
					'extra_days' => $extra_days1, 
					'extra_faculty' => $extra_faculty1, 
				);
			}
			//print_r($update_detail);die();
			$update = Yii::app()->db->createCommand()->update('IDP',$update_detail,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data2 = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kra_data = $kra->get_idp_data($where1,$data2,$list1);

				$extra_topic1 = '';$extra_days1 = '';$extra_faculty = '';$update_detail = '';
				if (count($kra_data)>0) {
					$extra_topic[$i] = explode(';',$kra_data['0']['extra_topic']);
					$extra_days = explode(';',$kra_data['0']['extra_days']);
					$extra_faculty = explode(';',$kra_data['0']['extra_faculty']);
					for ($i=0; $i < count($extra_topic); $i++) { 
						if ($i != $_POST['current_row_id']) {
							$update_detail = array(
								'extra_topic' => $extra_topic[$i], 
								'extra_days' => $extra_days[$i], 
								'extra_faculty' => $extra_faculty[$i], 
							);
						}
					}
				}
				
				$update = Yii::app()->db->createCommand()->update('IDP',$update_detail,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
        	} 
		}
		else
		{			
			$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],date('Y'));
			$kra_data = $kra->get_idp_data($where1,$data2,$list1);
			$extra_topic1 = '';$extra_days1 = '';$extra_faculty = '';$update_detail = '';
			if (count($kra_data)>0) {
				$extra_topic[$i] = explode(';',$kra_data['0']['extra_topic']);
				$extra_days = explode(';',$kra_data['0']['extra_days']);
				$extra_faculty = explode(';',$kra_data['0']['extra_faculty']);
				for ($i=0; $i < count($extra_topic); $i++) { 
					if ($i != $_POST['current_row_id']) {
						$update_detail = array(
							'extra_topic' => $extra_topic[$i], 
							'extra_days' => $extra_days[$i], 
							'extra_faculty' => $extra_faculty[$i], 
						);
					}
				}
			}
			
			$update = Yii::app()->db->createCommand()->update('IDP',$update_detail,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
		}
		if ($update>0) {
			print_r("updated");
		}
		
	}

		function actiondel_extra_program_list()
	{
		$kra=new IDPForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		$update = 0;

		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

        $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],Yii::app()->user->getState('financial_year_check'));
			$kra_data = $kra->get_idp_data($where1,$data2,$list1);	

			$extra_topic1 = '';$extra_days1 = '';$extra_faculty1 = '';$extra_faculty = '';$update_detail = '';
			if (count($kra_data)>0) {
				$extra_topic = explode(';',$kra_data['0']['program_comment']);
				for ($i=0; $i < count($extra_topic); $i++) { 
					$extra_topic_new = explode('?',$extra_topic[$i]);
					if ($extra_topic_new[0] != $_POST['current_row_id']) {						
							if ($extra_topic1 == '') {
								$extra_topic1 = $extra_topic[$i];
							}
							else
							{
								$extra_topic1 = $extra_topic1.';'.$extra_topic[$i];
							}
					}
				}
				$update_detail = array(
					'program_comment' => $extra_topic1, 
				);
			}
// 			$update_detail = array(
// 			    'program_comment' => ''
// 			);
			//print_r($update_detail);die();
			$update = Yii::app()->db->createCommand()->update('IDP',$update_detail,'Employee_id=:Employee_id and goal_set_year =:goal_set_year',array(':Employee_id'=>$kra_data['0']['Employee_id'],':goal_set_year'=>Yii::app()->user->getState('financial_year_check')));
		if ($update>0) {
			print_r("updated");
		}
		
	}

	function actionadd_program()
	{
		$reporting_list = new EmployeeForm();
     $records = $reporting_list->get_appraiser_list1();
     $faculty = '';
     $extract_id = explode('-',$_POST['last_id']);
     //print_r($extract_id);die();
     for ($k=0; $k < count($records); $k++) { 
        $where = 'where Email_id = :Email_id';
        $list = array('Email_id');
        $data = array($records[$k]['Email_id']);
        $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
     }

     $Cadre_id = array(); 
     if (isset($Reporting_officer_data)) 
     {
        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
        }
           
       }
     }
    //print_r($Cadre_id);die();
    $record1 = CHtml::DropDownList('faculty_email_id'.$extract_id[0],'faculty_email_id'.$extract_id[0],$Cadre_id,array('class'=>'form-control faculty_email_id'.$extract_id[0],'empty'=>'Select','options' => $faculty));
    //$result_data = array();
    // $result_data0 = '<div class="col-md-2">'.'2'.'</div>';
    $result_data1 = '<div class="col-md-4">'.CHtml::textField('topic'.$extract_id[0],'',array('class'=>'form-control topic'.$extract_id[0])).'</div>';
	$result_data2 = '<div class="col-md-2">'.CHtml::textField('days_required'.$extract_id[0],'',$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 days_required".$extract_id[0])).'</div>';
	$result_data3 = '<div class="col-md-2">'.$record1.'</div>';
	$result_data4 = '<div class="col-md-2">'.'<i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="'.$extract_id[0].$extract_id[1].'" title="Delete" aria-hidden="true"></i>'.'</div>';	
	if ($extract_id[0] <= 1) {
		print_r($result_data1.$result_data2.$result_data3.$result_data4);die();
	}
	else{
		print_r('<lable style="color:red">'."Maximum 2 programs can be added.".'</lable>');die();
	}
	
    //echo json_encode($result_data);
	}

	function actiongoalapproved()
    {
    	
		$employee_email = '';$appriaser_1 = '';$update = 0;
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$kra=new IDPForm;
    	$setting_date=new SettingsForm;
    	//print_r($_POST['emp_id']);die();
		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");

    	$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$mail_id = $employee_data1['0']['Email_id'];
    	//print_r(Yii::app()->user->getState("employee_email"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		if (count($settings_data)>0) {
        	$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kra_data = $kra->get_idp_data($where1,$data2,$list1);	
			$data = array(
				'set_status' => 'Approved'
			);
			$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data2 = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kra_data = $kra->get_idp_data($where1,$data2,$list1);

				$data = array(
				'set_status' => 'Approved'
				);
				$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
        	} 
		}
		else
		{			
			$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],date('Y'));
			$kra_data = $kra->get_idp_data($where1,$data2,$list1);
			$data = array(
				'set_status' => 'Approved'
			);
			$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kra_data['0']['Employee_id']));
		}
		if ($update>0) {
			$notification_data =new NotificationsForm;
			$emploee_data =new EmployeeForm;
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($_POST['emp_id']);
			$employee_data = $emploee_data->get_employee_data($where,$data,$list);
$notification_data->notification_type = 'IDP approved';
				  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
				  $notification_data->date = date('Y-m-d');
				  $notification_data->save();		
if($employee_data['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
				  $message = new YiiMailMessage;
				  $message->view = "idp_approve";
				  $params = array('mail_data'=>$employee_data);
				  $message->setBody($params, 'text/html');
				  $message->subject = 'IDP approved';
				  $message->addTo($employee_data['0']['Email_id']);
				//$message->addTo('mssadafule@gmail.com');		  
				  $message->from = $employee_data['0']['Reporting_officer1_id'];
				  
				//print_r($kra_data);die(); 
				  if(Yii::app()->mail->send($message))
				  {	  		
				  		print_r("updated");
				  }	  
       }
       else
       {
          print_r("updated");
       }
			 
				  
			
		}
    }

	
}
