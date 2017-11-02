<?php

class Midreview1Controller extends Controller
{


	function actionIndex()
	{
		Yii::app()->user->setState('emp_id_3','');
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and mid_KRA_final_status = :mid_KRA_final_status';
		$list = array('appraisal_id1','mid_KRA_final_status');
		$data = array($id,'Approved');
		$kpi_data = $model->get_kpi_list($where,$data,$list);
	//print_r(Yii::app()->user->getState("employee_email"));die();
		$where = 'where appraisal_id1 = :appraisal_id1 and mid_KRA_final_status != :mid_KRA_final_status';
		$list = array('appraisal_id1','mid_KRA_final_status');
		$data = array($id,'');
		$emp_data = $model->get_emp_id_list($where,$data,$list);
//print_r($emp_data);die();
		$cnt = 0;$kpi_emp_data = '';$kpi_data_aprv = '';$kpi_emp_data_aprv = '';$kpi_data_aprv1 = '';
	//	print_r($emp_data);die();
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

		$where1 = 'where appraisal_id1 = :appraisal_id1 and mid_KRA_final_status = :mid_KRA_final_status';
		$list1 = array('appraisal_id1','mid_KRA_final_status');
		$data1 = array($id,'Approved');
		$kpi_data_aprv = $model->get_kpi_list($where1,$data1,$list1);
		

		$where = 'where appraisal_id1 = :appraisal_id1 and (mid_KRA_final_status != :mid_KRA_final_status )';
		$list = array('appraisal_id1','mid_KRA_final_status');
		$data = array($id,'');
		$emp_data1 = $model->get_emp_id_list($where,$data,$list);
		$cnt = 0;
		//print_r($emp_data1);die();
		if (isset($emp_data1) && count($emp_data1)>0) {
				foreach ($emp_data1 as $row) {
				$where1 = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data1 = array($row['Employee_id'],Yii::app()->user->getState('financial_year_check'));
				$kpi_data_aprv1[$cnt] = $model->get_kpi_list($where1,$data1,$list1);

				$where1 = 'where Employee_id = :Employee_id';
				$list1 = array('Employee_id');
				$data1 = array($row['Employee_id']);
				$kpi_emp_data_aprv[$cnt] = $emploee_data->get_employee_data($where1,$data1,$list1);
				
				//print_r($row['Employee_id']);echo "<br>";
				$cnt++;
			}
			
		}
		// echo "<pre>";
		// print_r($kpi_data_aprv1);die();
		//$mid_review = '1';
		$selected_option = 'Mid_review';
		
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/mid_review_emp_list1',array('kpi_data'=>$kpi_data,'kpi_emp_data'=>$kpi_emp_data,'kpi_data_aprv'=>$kpi_data_aprv1,'kpi_emp_data_aprv'=>$kpi_emp_data_aprv));
		$this->render('//site/footer_view_layout');

		
	}


public function actionIDP_review()
	{			
		$this->render('//site/IDP_review_layout');
	}

		function actionmidreview_emp_data()
	{


		if (isset($_POST['emp_id'])) {
			Yii::app()->user->setState('emp_id_3',$_POST['emp_id']);
                        $employee_id = Yii::app()->user->getState('emp_id_3');
		}
else if(Yii::app()->user->getState('emp_id_3')!= '')
		{
			$employee_id = Yii::app()->user->getState('emp_id_3');
		}
		else
		{
			$employee_id = '';
		}
		
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

		
		$cnt = 0;$employee_data = '';
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($employee_id);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);


		//	print_r($kpi_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($employee_data['0']['Reporting_officer1_id']);
			$mgr_data = $emploee_data->get_employee_data($where,$data,$list);
		//print_r($employee_data);die();
                if(isset($employee_data['0']['Reporting_officer1_id']) && ($employee_data['0']['Reporting_officer1_id'] != Yii::app()->user->getState("employee_email")))
{
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
}
else
{
     if (count($settings_data)>0) {
        		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
				$list = array('Employee_id','goal_set_year');
				$data = array($employee_id,$settings_data['0']['setting_type']);
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
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
				$list = array('Employee_id','goal_set_year');
				$data = array($employee_id,date('Y'));
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
}

                $where = 'where Employee_id = :Employee_id and Reporting_officer1_id =:Reporting_officer1_id';
		$list = array('Employee_id','Reporting_officer1_id');
		$data = array($employee_id,Yii::app()->user->getState("employee_email"));
		$show_idp = $get_idp_data->get_idp_data($where,$data,$list);
  //print_r($kpi_data);die();        
//print_r(Yii::app()->user->getState("employee_email"));die();
		//$mid_review = 1;
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'prg_cnt'=>$prg_cnt,'show_idp'=>$show_idp,'mgr_data'=>$mgr_data));
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
			'mid_mgr_cmt1'=> $_POST['mgr_cmt1'],
			'mid_mgr_cmt2'=> $_POST['mgr_cmt2'],
			'mid_mgr_cmt3'=> $_POST['mgr_cmt3'],
		);
		//print_r($data);die();
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
//	echo "hi";die();
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
//print_r(Yii::app()->user->getState('financial_year_check'));die();
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status and new_goalsheet_state =:new_goalsheet_state ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year','KRA_status','new_goalsheet_state');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),'Pending','0');
			$kpi_data = $model->get_kpi_list($where,$data,$list);
//print_r($kpi_data);die();
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status and new_goalsheet_state =:new_goalsheet_state ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year','KRA_status','new_goalsheet_state');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),'Pending','1');
			$kpi_data2 = $model->get_kpi_list($where,$data,$list);
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
				if ($settings_data1['0']['setting_type'] == $year) {
								$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status and new_goalsheet_state =:new_goalsheet_state ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year','KRA_status','new_goalsheet_state');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),'Pending','0');
			$kpi_data = $model->get_kpi_list($where,$data,$list);	
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and KRA_status != :KRA_status and new_goalsheet_state =:new_goalsheet_state ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year','KRA_status','new_goalsheet_state');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),'Pending','1');
			$kpi_data2 = $model->get_kpi_list($where,$data,$list);			
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
			$program_data =new ProgramDataForm;
			$Compare_Designation =new CompareDesignationForm;	
			$IDPForm =new IDPForm;		
					$where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
			
			$Employee_id = Yii::app()->user->getState("Employee_id");
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data = $emploee_data->get_employee_data($where,$data,$list);
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
			$where = 'where Employee_id = :Employee_id AND goal_set_year= :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'));
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
		//	print_r($kpi_data);die();
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data['0']['Reporting_officer1_id']);
			$mgr_data = $emploee_data->get_employee_data($where,$data,$list);
		
		
		$selected_option = 'Mid_review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/employee_mid_review1',array('kpi_data'=>$kpi_data,'mid_review'=>$mid_review,'mid_review_by_employee'=>$mid_review_by_employee,'employee_data'=>$employee_data,'program_data_result'=>$program_data_result,'emp_data'=>$emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag,'kpi_data2'=>$kpi_data2));
		$this->render('//site/footer_view_layout');
	}

	function actionmidreview_layout()
	{
		$employee_email = '';$appriaser_1 = '';
    	
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    	//print_r(Yii::app()->user->getState("employee_email"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($appriaser_1);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where  Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($employee_data1['0']['Employee_id']);
		$kra_data = $kra->get_kpi_list($where1,$data2,$list1);

		$selected_option = 'Mid_review';

		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/mid_year_review_summary',array('mail_data'=>$employee_data,'kpi_data'=>$kra_data,'employee_data1'=>$employee_data1));
		$this->render('//site/footer_view_layout');
	}

	function actionemployee_mid_review()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;	
		$IDPForm =new IDPForm;	
		//print_r($_FILES['employee_csv']['name']);die();
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id_value']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['correct_emp_id']);
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
	
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['correct_emp_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		
		if (isset($employee_data) && isset($_FILES['employee_csv']['name'])) {
			$filenamekey = $_POST['correct_emp_id']; 
			$Fileext = pathinfo($_FILES['employee_csv']['name'], PATHINFO_EXTENSION);
			$model->mid_year_goalsheet_doc=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('employee_csv');
			//print_r(Yii::getPathOfAlias('webroot').'/goalsheet_mid_proof/'.$model->mid_year_goalsheet_doc);die();
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/'.$model->mid_year_goalsheet_doc);
		}
		else
		{
			if (isset($kpi_data) && $kpi_data>0) {
				if (isset($kpi_data['0']['mid_year_goalsheet_doc'])) {
					$model->mid_year_goalsheet_doc = $kpi_data['0']['mid_year_goalsheet_doc'];
				}
			}
			else
			{
				$model->mid_year_goalsheet_doc = '';
			}
			
		}

		if (isset($_FILES['employee_csv1']['name'])) {
			$filenamekey = $_POST['correct_emp_id']; 
			$Fileext = pathinfo($_FILES['employee_csv1']['name'], PATHINFO_EXTENSION);
			$IDPForm->mid_year_idp_doc=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('employee_csv1');
			//print_r(Yii::getPathOfAlias('webroot').'/goalsheet_mid_proof/'.$model->mid_year_goalsheet_doc);die();
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/idp'.$IDPForm->mid_year_idp_doc);
		}
		else
		{
			if (isset($IDP_data) && $IDP_data>0) {
				if (isset($IDP_data['0']['mid_year_idp_doc'])) {
					$IDPForm->mid_year_idp_doc = $IDP_data['0']['mid_year_idp_doc'];
				}
			}
			else
			{
				$IDPForm->mid_year_goalsheet_doc = '';
			}
			
		}

		$data = array(
			
			'mid_review_by_employee_date' => date('Y-m-d'),	
			'mid_KRA_final_status' => 'Pending',	
			'mid_year_goalsheet_doc' =>	$model->mid_year_goalsheet_doc,			
			'employee_comment' => $_POST['review_comments'],			
		);

		
		//print_r($_POST['correct_emp_id']);die();

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id and goal_set_year=:goal_set_year',array(':KPI_id'=>$_POST['KPI_id_value'],':goal_set_year'=>"2016-2017"));
$data1 = array(			
			'program_review_by_emp' => $_POST['program_review_by_emp'],
			'extra_program_review_by_emp' => $_POST['extra_program_review_by_emp'],
			'rel_program_review_by_emp' => $_POST['rel_program_review_by_emp_name'],	
			'project_mid_review_by_emp' => $_POST['emp_project_mid_review'],
			'mid_year_idp_doc' =>	$IDPForm->mid_year_idp_doc,
		);
		$update1 = Yii::app()->db->createCommand()->update('IDP',$data1,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['correct_emp_id'],':goal_set_year'=>"2016-2017"));
		//print_r($update1);die();
		if ($update==1) {

			echo "success";die();
		}
	}


	function actionemployee_mid_review1()
	{
		//echo "success";die();
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;	
		$IDPForm =new IDPForm;	
		//print_r($_FILES['employee_csv']['name']);die();
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id_value']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['correct_emp_id']);
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
	
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['correct_emp_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		
		if (isset($employee_data) && isset($_FILES['employee_csv']['name'])) {
			$filenamekey = $_POST['correct_emp_id']; 
			$Fileext = pathinfo($_FILES['employee_csv']['name'], PATHINFO_EXTENSION);
			$model->mid_year_goalsheet_doc=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('employee_csv');
			//print_r(Yii::getPathOfAlias('webroot').'/goalsheet_mid_proof/'.$model->mid_year_goalsheet_doc);die();
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/'.$model->mid_year_goalsheet_doc);
		}
		else
		{
			if (isset($kpi_data) && $kpi_data>0) {
				if (isset($kpi_data['0']['mid_year_goalsheet_doc'])) {
					$model->mid_year_goalsheet_doc = $kpi_data['0']['mid_year_goalsheet_doc'];
				}
			}
			else
			{
				$model->mid_year_goalsheet_doc = '';
			}
			
		}

		if (isset($_FILES['employee_csv1']['name'])) {
			$filenamekey = $_POST['correct_emp_id']; 
			$Fileext = pathinfo($_FILES['employee_csv1']['name'], PATHINFO_EXTENSION);
			$IDPForm->mid_year_idp_doc=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('employee_csv1');
			//print_r(Yii::getPathOfAlias('webroot').'/goalsheet_mid_proof/'.$model->mid_year_goalsheet_doc);die();
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/idp'.$IDPForm->mid_year_idp_doc);
		}
		else
		{
			if (isset($IDP_data) && $IDP_data>0) {
				if (isset($IDP_data['0']['mid_year_idp_doc'])) {
					$IDPForm->mid_year_idp_doc = $IDP_data['0']['mid_year_idp_doc'];
				}
			}
			else
			{
				$IDPForm->mid_year_goalsheet_doc = '';
			}
			
		}

		$data = array(
			
			'mid_review_by_employee_date' => date('Y-m-d'),	
			'mid_year_goalsheet_doc' =>	$model->mid_year_goalsheet_doc,			
			'employee_comment' => $_POST['review_comments'],
			'mid_emp_status'=>$_POST['mid_review'],
			'mid_emp_cmt1'=>$_POST['mid_emp_cmt1'],
			'mid_emp_cmt2'=>$_POST['mid_emp_cmt2'],
			'mid_emp_cmt3'=>$_POST['mid_emp_cmt3'],
		);

		
		//print_r($data);die();

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id and goal_set_year=:goal_set_year',array(':KPI_id'=>$_POST['KPI_id_value'],':goal_set_year'=>"2017-2018"));
$data1 = array(			
			'program_review_by_emp' => $_POST['program_review_by_emp'],
			'extra_program_review_by_emp' => $_POST['extra_program_review_by_emp'],
			'rel_program_review_by_emp' => $_POST['rel_program_review_by_emp'],	
			'project_mid_review_by_emp' => $_POST['emp_project_mid_review'],
			'mid_emp_trn_prog_stat'=>$_POST['mid_emp_trn_prog_stat'],
			'mid_year_idp_doc' =>	$IDPForm->mid_year_idp_doc,
			'mid_rel_prg_rev_emp' => $_POST['rel_program_review_status_emp'],
		
		);
//print_r($IDPForm->mid_year_idp_doc);die();
		$update1 = Yii::app()->db->createCommand()->update('IDP',$data1,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['correct_emp_id'],':goal_set_year'=>"2017-2018"));
		//print_r($update1);die();
		if ($update==1) {

			echo "success";die();
		}
	}

	function actionfinal_goal_review1()
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

		$Employee_id = $_POST['emp_id'];
$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
if($employee_data1['0']['Reporting_officer1_id'] != Yii::app()->user->getState("employee_email"))
{
if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year and appraisal_id1 = :appraisal_id1';
				$list = array('Employee_id','mid_KRA_status','goal_set_year','appraisal_id1');
			$data = array($Employee_id,'',$settings_data['0']['setting_type'],Yii::app()->user->getState("employee_email"));
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and appraisal_id1 = :appraisal_id1';
				$list = array('Employee_id','goal_set_year','appraisal_id1');
			$data = array($Employee_id,$settings_data['0']['setting_type'],Yii::app()->user->getState("employee_email"));
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
				$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year and appraisal_id1 = :appraisal_id1';
				$list = array('Employee_id','mid_KRA_status','goal_set_year','appraisal_id1');
				$data = array($Employee_id,'',$settings_data1['0']['setting_type'],Yii::app()->user->getState("employee_email"));
				$kpi_data = $model->get_kpi_list($where,$data,$list);

				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and appraisal_id1 = :appraisal_id1';
				$list = array('Employee_id','goal_set_year','appraisal_id1');
				$data = array($Employee_id,$settings_data1['0']['setting_type'],Yii::app()->user->getState("employee_email"));
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
			$where = 'where Employee_id = :Employee_id and mid_KRA_status != :mid_KRA_status and goal_set_year = :goal_set_year and appraisal_id1 = :appraisal_id1';
			$list = array('Employee_id','mid_KRA_status','goal_set_year','appraisal_id1');
			$data = array($Employee_id,'',date('Y'),Yii::app()->user->getState("employee_email"));
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
}
else
{
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






            require 'PHPMailer-master/PHPMailerAutoload.php';
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;      
			$emploee_data =new EmployeeForm;
			$Employee_id = $_POST['emp_id'];	
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$employee_data = $emploee_data->get_employee_data($where,$data,$list);    

			$emploee_data1 =new EmployeeForm;
			//$Employee_id = $_POST['emp_id'];	
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array(Yii::app()->user->getState("employee_email"));
			$employee_data1 = $emploee_data1->get_employee_data($where,$data,$list);                      // Enable verbose debug output

			$params = array('mail_data'=>$employee_data,'mail_data1'=>$employee_data1);

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'vvf.pms@vvfltd.com';                 // SMTP username
			$mail->Password = 'Dream@200';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('vvf.pms@vvfltd.com', $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']);
			//print_r($employee_data);die();
			// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			// $mail->addAddress('ellen@example.com');    
			//echo $employee_data['0']['Reporting_officer1_id'];die();
			$message = $this->renderPartial('//site/mail/appraiser_to_emp2',$params,TRUE);           // Name is optional
			//$mail->addReplyTo($employee_data['0']['Reporting_officer1_id'], 'Mid review Approved');
			//$mail->addTo($employee_data['0']['Reporting_officer1_id']);
			$mail->AddAddress($employee_data['0']['Reporting_officer1_id']); 
			$mail->addCC($employee_data['0']['Email_id']);
			$mail->addCC('demo.appraisel@gmail.com');
			$mail->msgHTML($message);
			//$mail->addBCC('bcc@example.com');
			//echo "dfsdf";die();
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Mid Review Approved';
			$mail->Body    = $message;
			//$mail->AltBody = $message;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
// 		$where = 'where Employee_id = :Employee_id';
// 		$list = array('Employee_id');
// 		$data = array($_POST['emp_id']);
// 		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
    	
//     	$notification_data->notification_type = 'Mid Review Approved';
// 		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
// 		  $notification_data->date = date('Y-m-d');
// 		  $notification_data->save();	
// if($employee_data['0']['Reporting_officer2_id'] != Yii::app()->user->getState("employee_email"))
// {	
//  if($employee_data['0']['invalid_email'] != '1')
//        {
//         Yii::import('ext.yii-mail.YiiMailMessage');
// 		  $message = new YiiMailMessage;
// 		 $message->view = "appraiser_to_emp2";
// 		  $params = array('mail_data'=>$employee_data);
// 		   $message->setBody($params, 'text/html');
// 		  $message->subject = 'Mid Year Review Approved';
// 		  $message->addTo($employee_data['0']['Email_id']);
// 		  //$message->addTo('mssadafule@gmail.com');  
// 		 //$message->addTo(Yii::app()->user->getState("employee_email"));
// 		  $message->from = 'testing@kritvainvestments.com';
//  $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/Goalsheet_mid_docs/goalsheet_".$employee_data['0']['Emp_fname']."_".$employee_data['0']['Emp_lname'].".pdf"));
// 		   $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/IDP_mid_docs/IDP_".$employee_data['0']['Emp_fname']."_".$employee_data['0']['Emp_lname'].".pdf"));
// 		  if(Yii::app()->mail->send($message))
// 		  {
// $update_flag = array(
// 						'mid_status' => 'Approved',
// 				  	);
// 				  $update = Yii::app()->db->createCommand()->update('IDP',$update_flag,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id'])); 
// 		  		echo "Mid Year Review Updation Done";die();
// 		  }
//        }
//        else
//        {
//           echo "Mid Year Review Updation Done";die();
//        }
// }
    	
    }	

	function actionsendmail_by_emp()
    {
    	$employee_email = '';$appriaser_1 = '';
    	
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    	//print_r(Yii::app()->user->getState("appriaser_1"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($appriaser_1);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where  Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($employee_data1['0']['Employee_id']);
		$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
$notification_data->notification_type = 'Midyear Review Approval Request';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
    	if($employee_data['0']['invalid_email'] != '1')
       {
        Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "midyear_request";
		  $params = array('mail_data'=>$employee_data,'kpi_data'=>$kra_data,'employee_data1'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Approval Pending';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($appriaser_1);
		  $message->addTo($Employee_id);  		  
		  $message->from = $Employee_id;
                  $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/Goalsheet_mid_docs/goalsheet_".$employee_data['0']['Emp_fname']."_".$employee_data['0']['Emp_lname'].".pdf"));
		   $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/IDP_mid_docs/IDP_".$employee_data['0']['Emp_fname']."_".$employee_data['0']['Emp_lname'].".pdf"));

		  if(Yii::app()->mail->send($message))
		  {
                     echo "Notification Send";die();
		  }
       }
       else
       {
          echo "Notification Send";die();
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
	$where1 = 'where Employee_id = :Employee_id';
	$list1 = array('Employee_id');
	$data2 = array($emp_id);
	$employee_data2 = $emploee_data->get_employee_data($where1,$data2,$list1);
			  $data_new = array(
				'mid_KRA_final_status' => 'Pending',		
			);
		
$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data_new,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$emp_id,':goal_set_year'=>Yii::app()->user->getState('financial_year_check')));
		 // print_r($update);die();
		 //  if ($update != 0) {
		  	
			//   		echo "Notification Send";die();
			 
		 //  }
		 //  echo "Notification Send";die();









		    require 'PHPMailer-master/PHPMailerAutoload.php';
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;      
			$emploee_data =new EmployeeForm;
			//$Employee_id = $_POST['emp_id'];	
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($emp_id);
			$employee_data = $emploee_data->get_employee_data($where,$data,$list);
			$appriaser_1 = Yii::app()->user->getState("appriaser_1");   

			$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($appriaser_1);
			$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);                      // Enable verbose debug output
// print_r($employee_data);die();
			$params = array('mail_data'=>$employee_data,'mail_data1'=>$employee_data1);

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'vvf.pms@vvfltd.com';                 // SMTP username
			$mail->Password = 'Dream@200';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('vvf.pms@vvfltd.com', $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']);
			//print_r($employee_data);die();
			// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			// $mail->addAddress('ellen@example.com');    
			//echo $employee_data['0']['Reporting_officer1_id'];die();
			$message = $this->renderPartial('//site/mail/email_appraiser',$params,TRUE);           // Name is optional
			$mail->addReplyTo($employee_data['0']['Reporting_officer1_id'], 'Midreview Approval Pending');
			// $mail->addTo($employee_data['0']['Reporting_officer1_id']);
			// $mail->addCC('demo.appraisel@gmail.com');
			$mail->AddAddress($employee_data['0']['Reporting_officer1_id']); 
			$mail->addCC($employee_data['0']['Email_id']);
			$mail->addCC('demo.appraisel@gmail.com');
			$mail->msgHTML($message);
			//$mail->addBCC('bcc@example.com');
			//echo "dfsdf";die();
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Midreview Approval Pending';
			$mail->Body    = $message;
			//$mail->AltBody = $message;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}










//  if($employee_data1['0']['invalid_email'] != '1')
//        {
//          //echo "hi";die();
//          Yii::import('ext.yii-mail.YiiMailMessage');
// 		  $message = new YiiMailMessage;
// 		  $message->view = "email_appraiser";
// 		  $params = array('mail_data'=>$employee_data1,'mail_data1'=>$employee_data2);
// 		   $message->setBody($params, 'text/html');
// 		  $message->subject = 'Midreview Approval Pending';
// 		  $message->addTo($appriaser_1);
// // $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/Goalsheet_mid_docs/goalsheet_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));
// // 		   $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/IDP_mid_docs/IDP_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));

// 		 //$message->addCC('mssadafule@gmail.com');  
// 		// echo $Employee_id;die();
// 		  $message->from = $Employee_id;
// 		  	$where1 = 'where Email_id = :Email_id';
// 			$list1 = array('Email_id');
// 			$data2 = array($appriaser_1);
// 			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  
// 		  $data_new = array(
// 				'mid_KRA_final_status' => 'Pending',		
// 			);
// 		  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data_new,'Employee_id=:Employee_id',array(':Employee_id'=>$emp_id));
// 		  //print_r($emp_id);die();
// 		  if ($update == 1) {
// 		  	if(Yii::app()->mail->send($message))
// 			  {
// 			  		echo "Notification Send";die();
// 			  }
// 		  }
//        }
//        else
//        {
//           echo "Notification Send";die();
//        }

    	
		  
    }

	
}
