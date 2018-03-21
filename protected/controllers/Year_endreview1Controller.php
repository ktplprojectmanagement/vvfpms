<?php

class Year_endreview1Controller extends Controller
{
	public function actionIndex()
	{
	    
	    if(Yii::app()->user->getState("Employee_id"))
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

		$where = 'where Employee_id = :Employee_id and KRA_status = :KRA_status AND goal_set_year =:goal_set_year';
		$list = array('Employee_id','KRA_status','goal_set_year');
		$data = array($Employee_id,'Approved',Yii::app()->user->getState('financial_year_check'));
		$goal_set_track = $model->get_kpi_list($where,$data,$list);

		if (count($settings_data)>0) {
                $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,'2017-2018');
				$kpi_data = $model->get_kpi_list($where,$data,$list);
				
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($Employee_id,'2017-2018');
					$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,'2017-2018');
				$kpi_data = $model->get_kpi_list($where,$data,$list);
		}

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $emploee_data->get_employee_data($where,$data,$list);	
                
                $where = 'where Email_id = :Email_id';
		$list = array('Email_id');
		$data = array($emp_data['0']['Reporting_officer1_id']);
		$mgr_data = $emploee_data->get_employee_data($where,$data,$list);
                
                $IDPForm =new IDPForm;	 
                   $where = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year';
            $list = array('Employee_id','goal_set_year');
            $data = array($Employee_id,'2017-2018');
            $IDP_data = $IDPForm->get_idp_data($where,$data,$list);

                $program_data =new ProgramDataForm;
        		$where = 'where  goal_set_year =:goal_set_year';
                $list = array('goal_set_year');
                $data = array('2017-2018');
                $program_data_result = $program_data->get_kpi_data($where,$data,$list);
                $Compare_Designation =new CompareDesignationForm;	
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

//print_r($kpi_data);die();
		$kpi = $model->getdata();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout3',array('selected_option'=>$selected_option));
		if(isset($goal_set_track) && count($goal_set_track)>0)
		{
			$this->render('//site/year_end_reviewa1',array('program_data_result'=>$program_data_result,'kpi_data' => $kpi_data,'emp_data' => $emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag));
			$this->render('//site/footer_view_layout');	
		}
		else
		{
			$this->render('//site/blank_view',array('window_msg'=>'It seems your goalshhet for this year has not been approved by your manager'));
		}
		

	    }
	    else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}	

	public function actionappraiser_end_review($Employee_id = null,$apr_data = null)
	{
	   
	    if(Yii::app()->user->getState("Employee_id"))
	    {
		$model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
                $promotion = new PromotionForm;
		$KRA_status_flag = '2';$emp_data = '';
		$id = Yii::app()->user->getState("employee_email");
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
		
                $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($Employee_id,$settings_data['0']['setting_type']);
		$emp_promotion_data = $promotion->get_employee_data($where,$data,$list);
		
		//print_r($kpi_data);die();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $employee->get_employee_data($where,$data,$list);	

        $where = 'where Employee_id = :Employee_id and Reporting_officer1_id =:Reporting_officer1_id';
		$list = array('Employee_id','Reporting_officer1_id');
		$data = array($Employee_id,$apr_data);
		$emp_data_report = $employee->get_employee_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id and year_end_review_of_manager =:year_end_review_of_manager';
		$list = array('Employee_id','year_end_review_of_manager');
		$data = array($Employee_id,$apr_data);
		$emp_data_report1 = $employee->get_employee_data($where,$data,$list);

                $IDPForm =new IDPForm;	 
                $where = 'where Employee_id = :Employee_id AND goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($Employee_id,'2017-2018');
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

                // $program_data =new ProgramDataForm;
                // $program_data_result = $program_data->get_data();
				$program_data =new ProgramDataForm;
        		$where = 'where  goal_set_year =:goal_set_year';
                $list = array('goal_set_year');
                $data = array('2017-2018');
                $program_data_result = $program_data->get_kpi_data($where,$data,$list);
               // print_r($program_data_result);die();
                // $Compare_Designation =new CompareDesignationForm;	
                $Compare_Designation =new CompareDesignationForm;	
                $designation_flag = 0;

$chk_admin_assign = '';$chk_manager_diff = 0;
if(isset($emp_data_report1) && count($emp_data_report1)>0)
{
$chk_admin_assign = 1;
}

//print_r($emp_data_report1);die();

            if(isset($emp_data_report) && count($emp_data_report)>0)
{
if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
			$list = array('Employee_id','goal_set_year','new_goalsheet_state');
			$data = array($Employee_id,$settings_data['0']['setting_type'],'0');
			$kpi_data = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
				$list = array('Employee_id','goal_set_year','new_goalsheet_state');
				$data = array($Employee_id,'3',$settings_data1['0']['setting_type'],'0');
				$kpi_data = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
			$list = array('Employee_id','KRA_status_flag','goal_set_year','new_goalsheet_state');
			$data = array($Employee_id,'3',date('Y'),'0');
			$kpi_data = $model->get_kpi_list($where,$data,$list);
		}	

}
else if(isset($emp_data_report1) && count($emp_data_report1)>0)
{
if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
			$list = array('Employee_id','goal_set_year','new_goalsheet_state');
			$data = array($Employee_id,$settings_data['0']['setting_type'],'1');
			$kpi_data = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
				$list = array('Employee_id','goal_set_year','new_goalsheet_state');
				$data = array($Employee_id,$settings_data1['0']['setting_type'],'1');
				$kpi_data = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag and goal_set_year = :goal_set_year and new_goalsheet_state = :new_goalsheet_state';
			$list = array('Employee_id','KRA_status_flag','goal_set_year','new_goalsheet_state');
			$data = array($Employee_id,'3',date('Y'),'1');
			$kpi_data = $model->get_kpi_list($where,$data,$list);
		}	

$chk_admin_assign = 1;
$chk_manager_diff = 1;

}
else
{
if (count($settings_data)>0) {
			$where = 'where appraisal_id1 = :appraisal_id1 and Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('appraisal_id1','Employee_id','goal_set_year');
			$data = array($apr_data,$Employee_id,$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where appraisal_id1 = :appraisal_id1 and Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('appraisal_id1','Employee_id','goal_set_year');
				$data = array($apr_data,$Employee_id,'3',$settings_data1['0']['setting_type']);
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

$chk_admin_assign = 1;
}    
		
			if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
				$where = 'where designation = :designation';
				$list = array('designation');
				$data = array($emp_data['0']['Designation']);
				$Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
				if (isset($Compare_Designation1['0']['flag'])) {
					$designation_flag = $Compare_Designation1['0']['flag'];
				}
				
			}

		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array(Yii::app()->user->getState("employee_email"));
		$as_apr_data = $employee->get_employee_data($where,$data,$list);

                $where = 'where Employee_id = :Employee_id and Reporting_officer1_id =:Reporting_officer1_id';
		$list = array('Employee_id','Reporting_officer1_id');
		$data = array($Employee_id,Yii::app()->user->getState("employee_email"));
		$show_idp = $IDPForm->get_idp_data($where,$data,$list);
$num_days = '';
if(isset($emp_data['0']['reporting_1_effective_date']) && $emp_data['0']['reporting_1_effective_date'] != '' && $emp_data['0']['reporting_1_effective_date'] != "0000-00-00")
{
$date1 = $emp_data['0']['reporting_1_effective_date'];
$date2 = date('Y-m-d');

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
if($diff>=6)
{
$show_idp = '2';
}


$now = strtotime(date('Y-m-d'));
$your_date = strtotime($emp_data['0']['reporting_1_effective_date']);
$datediff = $now - $your_date;
$num_days = floor($datediff / (60 * 60 * 24));
}
//print_r($num_days);die();
		

		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option)); 
		$this->render('//site/sub_emp_endreview1',array('kpi_data' => $kpi_data,'emp_data' => $emp_data,'as_apr_data'=>$as_apr_data,'IDP_data'=>$IDP_data,'program_data_result'=>$program_data_result,'emp_promotion_data'=>$emp_promotion_data,'show_idp'=>$show_idp,'emp_data_report'=>$emp_data_report,'chk_admin_assign'=>$chk_admin_assign,'chk_manager_diff'=>$chk_manager_diff,'num_days'=>$num_days));	
		$this->render('//site/footer_view_layout');	
		 
	    }
	    else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}

        public function actionappraiser_end_review1($Employee_id = null)
	{
	    if(Yii::app()->user->getState("Employee_id"))
	    {
		$model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
                $promotion = new PromotionForm;
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
		
                $where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_promotion_data = $promotion->get_employee_data($where,$data,$list);
		
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
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
		//print_r($kpi_data);die();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $employee->get_employee_data($where,$data,$list);	

                 $IDPForm =new IDPForm;	 
                $where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

                $program_data =new ProgramDataForm;
                $program_data_result = $program_data->get_data();
                $Compare_Designation =new CompareDesignationForm;	
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

		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array(Yii::app()->user->getState("employee_email"));
		$as_apr_data = $employee->get_employee_data($where,$data,$list);
		//print_r($emp_data);die();
//print_r($kpi_data);die();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/sub_emp_endreview1',array('kpi_data' => $kpi_data,'emp_data' => $emp_data,'as_apr_data'=>$as_apr_data,'IDP_data'=>$IDP_data,'program_data_result'=>$program_data_result,'emp_promotion_data'=>$emp_promotion_data));	
		$this->render('//site/footer_view_layout');	
	    }
	    else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}

	function actionyear_end_reviewlist()
	{
	    if(Yii::app()->user->getState("Employee_id"))
	    {
	    $model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
		$KRA_status_flag = '3';
		$emp_data = '';
		$selected_option = 'year end review';
		$kpi_data = $model->get_emp_list11(Yii::app()->user->getState("employee_email"),Yii::app()->user->getState('financial_year_check'));
		//print_r($kpi_data);die();
		$id = Yii::app()->user->getState("employee_email");

		for ($i=0; $i < count($kpi_data); $i++) { 
			$emp_id = $kpi_data[$i]['Employee_id'];
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($emp_id);
			$emp_data[$i] = $employee->get_employee_data($where,$data,$list);
		}

if(count($kpi_data)>0)
{
for ($i=0; $i < count($kpi_data); $i++) { 
			$emp_id = $kpi_data[$i]['Employee_id'];
			//echo $emp_id;
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($emp_id);
			$emp_data[$i] = $employee->get_employee_data($where,$data,$list);
		}
}
else
{
for ($i=0; $i < count($kpi_data2); $i++) { 
			$emp_id = $kpi_data2[$i]['Employee_id'];
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($emp_id);
			$emp_data[$i] = $employee->get_employee_data($where,$data,$list);
		}
}
//print_r(count($kpi_data));
//die();
                
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_reviewlist',array('emp_data' => $emp_data));
		//$this->render('//site/footer_view_layout');	
	    }
	    else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
		
	}

function actionupdatereview()
	{
$kra_year_end = array();
	if (Yii::app()->user->getState("Employee_id"))
		{
		$model = new KpiAutoSaveForm;
		$emploee_data = new EmployeeForm;
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array(
			'Employee_id'
		);
		$data2 = array(
			Yii::app()->user->getState("Employee_id")
		);
		$employee_data = $emploee_data->get_employee_data($where1, $data2, $list1);
		

		$kpi_total_list = explode(';', $_POST['kpi_value_id']);
		$year_end_rva = explode('^', $_POST['year_end_reviewa']);
		$year_end_rcmnt = explode('^', $_POST['year_end_achieve']);
		$seq_chk = '';
		for ($j = 0; $j < count($kpi_total_list); $j++)
			{
			$model = new KpiAutoSaveForm;
			$where = 'where KPI_id = :KPI_id';
			$list = array(
				'KPI_id'
			);
			$data1 = array(
				$kpi_total_list[$j]
			);
			$kpi_data = $model->get_kpi_list($where, $data1, $list);
			$kpi_list = explode(';', $kpi_data['0']['kpi_list']);

			

			$num = array();$num_file = array();
			if($kpi_data['0']['document_proof'] != '')
			{
				$mg_name = $kpi_data['0']['document_proof'];
				$squ_number = $kpi_data['0']['seq_number'];
			}
			else
			{
				$mg_name = "";
				$squ_number = "";
			}
			//print_r($squ_number);
			for ($i = 0; $i < count($kpi_list); $i++)
				{
				if (isset($_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name']) && $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name'] != '')
					{
					if (isset($kpi_total_list[$j]))
						{
						if (isset($kpi_data['0']['seq_number']) && $kpi_data['0']['seq_number'] == '')
							{
		

								$image_data = CUploadedFile::getInstanceByName('employee_csv' . $i . $kpi_total_list[$j]);
								$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name']);
								$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name']);

								if ($mg_name == '')
									{
									$mg_name = $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name'];
									}
								  else
									{
									$mg_name = $mg_name . ';' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name'];
									}

								
								if ($squ_number == '')
									{
									$squ_number = $kpi_total_list[$j] . $i;
									}
								  else
									{
									$squ_number = $squ_number . ';' . $kpi_total_list[$j] . $i;
									}
							}
						  else
							{
								$file = explode(';', $kpi_data['0']['document_proof']);
								$seq = explode(';', $kpi_data['0']['seq_number']);
							// if (isset($kpi_data['0']['document_proof']) && isset($kpi_data['0']['seq_number']))
							// 	{
									//print_r($kpi_data);
									
									// $squ_number = $kpi_data['0']['seq_number'];
									// $mg_name = $kpi_data['0']['document_proof'];
									// for ($f = 0; $f < count($seq); $f++)
									// {

									// if($seq_number[$f] != $kpi_total_list[$j] . $i)
									// {
									// 	if ($mg_name == '')
									// 		{
									// 		$mg_name = $file[$f];
									// 		}
									// 	  else
									// 		{
									// 		$mg_name = $mg_name . ';' . $file[$f];
									// 		}

									// 	if ($squ_number == '')
									// 		{
									// 		$squ_number = $seq[$f];
									// 		}
									// 	  else
									// 		{
									// 		$squ_number = $squ_number . ';' . $seq[$f];
									// 		}
									// }
									// }
								// }

							

								$image_data = CUploadedFile::getInstanceByName('employee_csv' . $i . $kpi_total_list[$j]);
								$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name']);
								$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name']);
								//$squ_number = explode(';', $squ_number);
								$seq1 = $seq;
								//print_r($squ_number);die();
								// if(count($seq)>0)
								// {

								// 	for ($f = 0; $f < count($seq); $f++)
								// 	{
										
								// 		//print_r($kpi_total_list[$j] . $i);
								// 			if(isset($seq[$f]) && $kpi_total_list[$j].$i != $seq[$f])
								// 			{												
											
												$mg_name = $mg_name . ';' . $_FILES['employee_csv' . $i . $kpi_total_list[$j]]['name'];
												$squ_number = $squ_number . ';' . $kpi_total_list[$j] . $i;
												$mg_name1 = explode(';', $mg_name);
												$squ_number1 = explode(';', $squ_number);
												$seq_chk = $kpi_total_list[$j] . $i;
												if(isset($squ_number))
												{
													
													$num = $squ_number1;
													$num_file = $mg_name1;
													$cnt_seq = 0;
													//print_r($kpi_total_list[$j] . $i);die();					
													for($k=0;$k<count($num);$k++)
													{
														
															if($num[$k] == $kpi_total_list[$j] . $i)
															{
																if($cnt_seq > 0)
															{
															unset($num[$k]);
															unset($num_file[$k]);
															
																// $num[$k] = '';
																// $mg_name[$k] = '';
																// print_r($k);
															}
															
															$cnt_seq++;
															
														}
														
														
														
													}
													//print_r($cnt_seq);
													
												}
												//echo $squ_number;
								// 			}
											
								// 	}
								// 	//die();
								// }
								

							}
						}
					

					}

				}

				if(count($num)>0)
				{
					//print_r($num);die();
						$list_seq = '';
						for ($l=0; $l < count($num); $l++) 
						{ 
						//echo $num[$l];
							if($list_seq == '')
							{
								$list_seq = $num[$l];
							}
							else
							{
								$list_seq = $list_seq.';'.$num[$l];
							}
						}
						$list_file_seq = '';
						for ($l=0; $l < count($num_file); $l++) 
						{ 
						//echo $num[$l];
							if($list_file_seq == '')
							{
								$list_file_seq = $num_file[$l];
							}
							else
							{
								$list_file_seq = $list_file_seq.';'.$num_file[$l];
							}
						}
					$data = array(
						'year_end_reviewa' => $year_end_rva[$j],
						'year_end_achieve' => $year_end_rcmnt[$j],
						'KRA_status_flag' => '3',
						'document_proof' => $list_file_seq,
						'seq_number' => $list_seq,
						//'KPI_id' => $kpi_total_list[$j]
					);
				}
				else
				{
					//echo "bbb";die();
					$data = array(
						'year_end_reviewa' => $year_end_rva[$j],
						'year_end_achieve' => $year_end_rcmnt[$j],
						'KRA_status_flag' => '3',
						'document_proof' => $mg_name,
						'seq_number' => $squ_number,
						//'KPI_id' => $kpi_total_list[$j]
					);
				}
//print_r($data);			
// print_r($data);die();
			$kra_year_end[$j] = $data;
			
			

			$update = Yii::app()->db->createCommand()->update('kpi_auto_save', $data, 'KPI_id=:KPI_id', array(':KPI_id' => $kpi_total_list[$j]
			));
			
			// $squ_number = '';
			// $mg_name = '';
			
			 					//die();
			}
//die();
			
		
// echo $kpi_data['0']['Employee_id'];die();
		$IDPForm = new IDPForm;
		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list = array(
			'Employee_id',
			'goal_set_year'
		);
		$data = array(
			$kpi_data['0']['Employee_id'],
			'2017-2018'
		);
		$IDP_data = $IDPForm->get_idp_data($where, $data, $list);
		if (isset($_FILES['proof3']['name']))
			{
			$filenamekey = $kpi_data['0']['Employee_id'] . "-" . "proof3";
			$Fileext = pathinfo($_FILES['proof3']['name'], PATHINFO_EXTENSION);
			$IDPForm->proof3 = $filenamekey . '.' . $Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof3');
			$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/year_end_idp_proofs/' . $IDPForm->proof3);
			$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_idp_proofs/' . $IDPForm->proof3);
			}
		  else
			{
			if ($IDP_data['0']['proof3'] != '')
				{
				$IDPForm->proof3 = $IDP_data['0']['proof3'];
				}
			  else
				{
				$IDPForm->proof3 = '';
				}
			}
//print_r($$_POST['correct_emp_id']);die();
		$data = array(
			'proof3' => $IDPForm->proof3,
			'Year_end_prg_status' => $_POST['Year_end_prg_status'],
			'Year_end_prg_comments' => $_POST['Year_end_prg_comments'],
			'Extra_year_end_prg_status' => $_POST['Extra_year_end_prg_status'],
			'Extra_year_end_prg_comments' => $_POST['Extra_year_end_prg_comments'],
			'Relationship_year_end_status' => $_POST['Relationship_year_end_status'],
			'Relationship_year_end_comments' => $_POST['Relationship_year_end_comments'],
			'Year_end_prog_status' => $_POST['Year_end_prog_status'],
			'Year_end_prog_comments' => $_POST['Year_end_prog_comments']
		);
		// $update = Yii::app()->db->createCommand()->update('IDP', $data, 'Employee_id=:Employee_id', array(':Employee_id' => $kpi_data['0']['Employee_id']
		// ));
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('IDP', $data, 'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>"2017-2018"));
		//print_r($update);die();
		$model1 = new Yearend_reviewbForm;
		$employee1 = new EmployeeForm;
		$model1->Employee_id = Yii::app()->user->getState("Employee_id");
		$appriaser_1 = Yii::app()->user->getState("appriaser_1");
		$where = 'where Employee_id = :Employee_id';
		$list = array(
			'Employee_id'
		);
		$data = array(
			Yii::app()->user->getState("Employee_id")
		);
		$employee_data = $employee1->get_employee_data($where, $data, $list);
		//print_r($employee_data);die();
		$where = 'where Employee_id = :Employee_id AND goal_set_year = :goal_set_year';
		$list = array(
			'Employee_id','goal_set_year'
		);
		$data = array(
			Yii::app()->user->getState("Employee_id"),'2017-2018'
		);
		$employee_review_data = $model1->get_employee_data($where, $data, $list);
		//print_r($employee_review_data);die();
		if (isset($_FILES['proof2']['name']))
			{
			$filenamekey = $employee_review_data['0']['Employee_id'] . "-" . "proof2";
			$Fileext = pathinfo($_FILES['proof2']['name'], PATHINFO_EXTENSION);
			$model1->proof2 = $filenamekey . '.' . $Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof2');
			$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/year_end_proofs/' . $model1->proof2);
			$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/' . $model1->proof2);
			}
		  else
			{
			if ($employee_review_data['0']['proof2'] != '')
				{
				$model1->proof2 = $employee_review_data['0']['proof2'];
				}
			  else
				{
				$model1->proof2 = '';
				}
			}

		if (isset($_FILES['proof1']['name']))
			{
			$filenamekey = $employee_review_data['0']['Employee_id'] . "-" . "proof1";
			$Fileext = pathinfo($_FILES['proof1']['name'], PATHINFO_EXTENSION);
			$model1->proof1 = $filenamekey . '.' . $Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof1');
			$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/year_end_proofs/' . $model1->proof1);
			$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/' . $model1->proof1);
			}
		  else
			{
			if ($employee_review_data['0']['proof1'] != '')
				{
				$model1->proof1 = $employee_review_data['0']['proof1'];
				}
			  else
				{
				$model1->proof1 = '';
				}
			}

		if (isset($_FILES['proof_2']['name']))
			{
			$filenamekey = $employee_review_data['0']['Employee_id'] . "-" . "proof3";
			$Fileext = pathinfo($_FILES['proof_2']['name'], PATHINFO_EXTENSION);
			$model1->proof_2 = $filenamekey . '.' . $Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof_2');
			$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/year_end_proofs/' . $model1->proof_2);
			$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/data(proof)/year_end_proofs/' . $model1->proof_2);
			}
		  else
			{
			if ($employee_review_data['0']['proof_2'] != '')
				{
				$model1->proof_2 = $employee_review_data['0']['proof_2'];
				}
			  else
				{
				$model1->proof_2 = '';
				}
			}

		if (isset($_FILES['proof_1']['name']))
			{
			$filenamekey = $employee_review_data['0']['Employee_id'] . "-" . "proof4";
			$Fileext = pathinfo($_FILES['proof_1']['name'], PATHINFO_EXTENSION);
			$model1->proof_1 = $filenamekey . '.' . $Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof_1');
			$image_data->saveAs(Yii::getPathOfAlias('webroot') . '/data(proof)/year_end_proofs/' . $model1->proof_1);
			$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/' . $model1->proof_1);
			}
		  else
			{
			if ($employee_review_data['0']['proof_1'] != '')
				{
				$model1->proof_1 = $employee_review_data['0']['proof_1'];
				}
			  else
				{
				$model1->proof_1 = '';
				}
			}

		

		$where = 'where Employee_id = :Employee_id AND goal_set_year = :goal_set_year';
		$list = array(
			'Employee_id','goal_set_year'
		);
		$data = array(
			Yii::app()->user->getState("Employee_id"),'2017-2018'
		);
		$employee_review_data = $model1->get_employee_data($where, $data, $list);
		//print_r($employee_review_data);die();
		if (count($employee_review_data) > 0)
			{
			$review_data = array(
				'employee_review1' => $_POST['employee_review1'],
				'employee_review2' => $_POST['employee_review2'],
				'review1_example1' => $_POST['review1_example1'],
				'review1_example2' => $_POST['review1_example2'],
				'review2_example1' => $_POST['review2_example1'],
				'review2_example2' => $_POST['review2_example2'],
				'year_end_reviewb_status' => 1,
				'proof2' => $model1->proof2,
				'proof1' => $model1->proof1,
				'proof_1' => $model1->proof_1,
				'proof_2' => $model1->proof_2,
			);
			$update = Yii::app()->db->createCommand()->update('yearend_reviewb', $review_data, 'Employee_id=:Employee_id AND goal_set_year =:goal_set_year', array(
				':Employee_id' => Yii::app()->user->getState("Employee_id") ,
				'goal_set_year' => '2017-2018'
			));

			// print_r($update);die();

			}
		  else
			{
			$model1->Employee_id = Yii::app()->user->getState("Employee_id");
			$model1->Reporting_officer1_id = $appriaser_1;
			$model1->employee_review1 = $_POST['employee_review1'];
			$model1->employee_review2 = $_POST['employee_review2'];
			$model1->review1_example1 = $_POST['review1_example1'];
			$model1->review1_example2 = $_POST['review1_example2'];
			$model1->review2_example1 = $_POST['review2_example1'];
			$model1->review2_example2 = $_POST['review2_example2'];
			$model1->proof1 = $_POST['proof1'];
			$model1->proof2 = $_POST['proof2'];
			$model1->proof_1 = $_POST['proof_1'];
			$model1->proof_2 = $_POST['proof_2'];
			$model1->review_date = date('Y-m-d');
			$model1->goal_set_year = '2017-2018';
			$model1->year_end_reviewb_status = 1;
			$model1->save();
			}

		if ($update == 1)
			{
			echo 'success';

			// $this->actiongoalnotification($employee_data['0']['Reporting_officer1_id'],'Year End Approval Request');

			}
		  else
			{
			echo "error occured11";
			}
		}
	  else
		{
		$model = new LoginForm;
		$this->render('//site/session_check_view');
		$this->render('//site/admin_login', array(
			'model' => $model
		));
		}
	}



  



function actionupdatereview1()
{
if(Yii::app()->user->getState("Employee_id"))
{

$model=new KpiAutoSaveForm;
$emploee_data =new EmployeeForm;

//echo "hi"	; die();

$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array(Yii::app()->user->getState("Employee_id"));
$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
//print_r($employee_data);die();
if(isset($_POST['kpi_file_value']) && $_POST['kpi_file_value'] !=''){
$total_upload = explode(';',$_POST['kpi_file_value']);
}
else{
$total_upload=array();
}
$kpi_total_list = explode(';',$_POST['kpi_value_id']);
$year_end_rva = explode('^',$_POST['year_end_reviewa']);
$year_end_rcmnt = explode('^',$_POST['year_end_achieve']);
//print_r($total_upload);die();

for($j=0;$j<count($kpi_total_list);$j++)
{
$model=new KpiAutoSaveForm;
$where = 'where KPI_id = :KPI_id';
$list = array('KPI_id');
$data1 = array($kpi_total_list[$j]);
$kpi_data = $model->get_kpi_list($where,$data1,$list);
$kpi_list = explode(';',$kpi_data['0']['kpi_list']);

//print_r($year_end_rcmnt);die();
$data = array(
'year_end_reviewa' => $year_end_rva[$j],
'year_end_achieve' => $year_end_rcmnt[$j], 
'KRA_status_flag' => '3',		
// 'document_proof' => $mg_name,
// 'seq_number' => $squ_number,
);
//print_r($data);die();

$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_total_list[$j]));
}

//print_r($_FILES['employee_csv'.$_POST['kpi_list_value_id']]['name']);die();
// print_r($update);die();
//print_r($_POST['kpi_file_value']);die();
$IDPForm =new IDPForm;	
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array(Yii::app()->user->getState("Employee_id"),'2017-2018');
$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

// print_r($IDP_data);die();

$data = array(	
'Year_end_prg_status'=>$_POST['Year_end_prg_status'],
'Year_end_prg_comments'=>$_POST['Year_end_prg_comments'],
'Extra_year_end_prg_status'=>$_POST['Extra_year_end_prg_status'],
'Extra_year_end_prg_comments'=>$_POST['Extra_year_end_prg_comments'],
'Relationship_year_end_status'=>$_POST['Relationship_year_end_status'],
'Relationship_year_end_comments'=>$_POST['Relationship_year_end_comments'],
'Year_end_prog_status'=>$_POST['Year_end_prog_status'],
'Year_end_prog_comments'=>$_POST['Year_end_prog_comments']
);


$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id AND goal_set_year =:goal_set_year ',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2017-2018'));
//print_r($data);die();
//print_r($kpi_data['0']['Employee_id']);die();
$model1=new Yearend_reviewbForm;	
$employee1=new EmployeeForm;
$model1->Employee_id = Yii::app()->user->getState("Employee_id");
$appriaser_1 = Yii::app()->user->getState("appriaser_1");

$where = 'where Employee_id = :Employee_id';
$list = array('Employee_id');
$data = array(Yii::app()->user->getState("Employee_id"));
$employee_data = $employee1->get_employee_data($where,$data,$list);

$where = 'where Employee_id = :Employee_id AND goal_set_year= :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array(Yii::app()->user->getState("Employee_id"),'2017-2018');
$employee_review_data = $model1->get_employee_data($where,$data,$list);
//print_r($employee_review_data)  ;die(); 

//$command = Yii::app()->db->createCommand();
//$query_result1 = $command->delete('yearend_reviewb', 'Employee_id=:Employee_id', array(':Employee_id'=>''));

if (count($employee_review_data)>0) {


$review_data = array(
'employee_review1' => $_POST['employee_review1'], 
'employee_review2' => $_POST['employee_review2'],
'review1_example1' => $_POST['review1_example1'],
'review1_example2' => $_POST['review1_example2'],
'review2_example1' => $_POST['review2_example1'],
'review2_example2' => $_POST['review2_example2'],

);

//print_r($review_data);die();

$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$review_data,'Employee_id=:Employee_id AND goal_set_year =:goal_set_year',array(':Employee_id'=>Yii::app()->user->getState("Employee_id"),'goal_set_year'=>'2017-2018'));
//print_r($update);die();
}
else
{
$model1->Employee_id = Yii::app()->user->getState("Employee_id");
$model1->Reporting_officer1_id = $appriaser_1;
$model1->employee_review1 = $_POST['employee_review1'];
$model1->employee_review2 = $_POST['employee_review2'];
$model1->review1_example1 = $_POST['review1_example1'];
$model1->review1_example2 = $_POST['review1_example2'];
$model1->review2_example1 = $_POST['review2_example1'];
$model1->review2_example2 = $_POST['review2_example2'];

$model1->review_date = date('Y-m-d');
$model1->goal_set_year = '2017-2018';
//print_r($model1->attributes);die();
//$model1->save();
if($model1->save()){
echo "ffff";die();
}
else{
echo "dddddd";die();
}



}		

if ($update==1) {
echo 'success';
//$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id'],'Year End Approval Request');
}
else
{
echo "error occured";
}	
}
else
{
$model = new LoginForm;	
$this->render('//site/session_check_view');
$this->render('//site/admin_login',array('model'=>$model));
}   
}

function actionfinal_goal_review1()
	{
	    if(Yii::app()->user->getState("Employee_id"))
	    {
//print_r($_POST['avg_kra_rating']);die();
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
      //print_r($kpi_data1);die();          
                if(isset($_POST['field1']))
                {
                   $data1 = array(
				'field1' => $_POST['field1'], 
				'field2' => $_POST['field2'], 
				'field3' => $_POST['field3'], 
				'field4' => $_POST['field4'], 
				'field5' => $_POST['field5'], 
				'field6' => $_POST['field6'], 
				'field7' => $_POST['field7'],  
				'field8' => $_POST['field8'],
			);

			//$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id));
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
			
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
	     else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}	

	function actiongoalnotification()
    {
        if(Yii::app()->user->getState("Employee_id"))
	    {
      echo "hi";die();
     	//$model=new KpiAutoSaveForm;
    	//$emploee_data =new EmployeeForm;
    	//$notification_data =new NotificationsForm;

	//print_r($_POST['emp_id'])	;die();

$model=new KpiAutoSaveForm;
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
        
    	$setting_date=new SettingsForm;
$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

$where1 = 'where Reporting_officer2_id = :Reporting_officer2_id';
		$list1 = array('Reporting_officer2_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data_apr = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
$normalize =new NormalizeRatingForm;

$emploee_data =new EmployeeForm;
$setting_date=new SettingsForm;
$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
$normalize =new NormalizeRatingForm;
                        $IDP_data=array();
                        $IDPForm =new IDPForm;	
                        $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
//print_r($IDP_data);die();

              $promotion_data=array();
	       $promotion = new PromotionForm;
		//$emp_data = new EmployeeForm;
		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
		$promotion_data = $promotion->get_employee_data($where,$data,$list);


                if(count($promotion_data)>0 && $IDP_data['0']['career_plan'] != "Promotion"){          
$data = array(
				'update_flag' => '2'
			);
			
			// $update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));	
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));
             //'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));    
}
else
{
$data = array(
				'update_flag' => '0'
			);
			
			//$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));	
}



		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  
//print_r($kpi_data);die();
$where1 = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data['0']['setting_type']);
		$normalize_data = $normalize->get_setting_data($where1,$data2,$list1);

			if (count($kpi_data)>0) {
if(!(isset($employee_data_apr) && count($employee_data_apr)>0))
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email"))); 
			 	} 
}
else
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'dot_final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email")));
			 	} 

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

$where1 = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
		$normalize_data = $normalize->get_setting_data($where1,$data2,$list1);

			if (count($kpi_data)>0) {
				if(!(isset($employee_data_apr) && count($employee_data_apr)>0))
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				 $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email")));
			 	} 
}
else
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'dot_final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email")));
			 	} 

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
				if(!(isset($employee_data_apr) && count($employee_data_apr)>0))
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email")));
			 	} 
}
else
{
for ($i=0; $i < count($kpi_data); $i++) { 
			 		$update_flag = array(
				  		'dot_final_kra_status' => 'Approved',
				  	);
				  $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id and  appraisal_id1 = :appraisal_id1',array(':KPI_id'=>$kpi_data[$i]['KPI_id'],':appraisal_id1'=>Yii::app()->user->getState("employee_email")));
			 	} 

}
			}			
		}    	


		if (count($normalize_data)>0) {
			$data = array(
				'Tota_score' => $_POST['avg_kra_rating'],
				'performance_rating' => $_POST['avg_kra_rating']
			);
			//print_r($data);die();
			
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));			
		}
		else
		{
			$normalize->Employee_id = $kpi_data['0']['Employee_id'];
			$normalize->Reporting_officer1_id = $employee_data1['0']['Reporting_officer1_id'];			
			$normalize->Tota_score = $_POST['avg_kra_rating'];
			$normalize->performance_rating = $_POST['avg_kra_rating'];	
                        $normalize->goal_set_year = '2017-2018';
                        $normalize->save();			
		}
$update_flag1 = array(
			'idp_final_status' => 'Approved',
		);
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id AND goal_set_year =:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2017-2018'));
                $update_flag2 = array(
			'year_end_b_appr_status' => '1',
		);
		$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$update_flag2,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));
//$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	Yii::import('ext.yii-mail.YiiMailMessage');
		
		//print_r($employee_data1);die();
		  $message = new YiiMailMessage;
		  $message->view = "year_end_approval_mail";
		  $params = array('mail_data'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = "Year end review approved";
		  $message->addTo($employee_data1['0']['Email_id']);
		  $message->addCC($employee_data1['0']['Reporting_officer1_id']);  
		  $message->from = 'testing@kritvainvestments.com';
		 
		  $notification_data->notification_type = 'Year end review(A) submitted.';
		  $notification_data->Employee_id = $_POST['emp_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
Yii::app()->mail->send($message);
		 echo "Notification Send";die();
	    }
	    else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
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

				if (count($settings_data)>0) 
				{
					$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($Emp_id,$settings_data['0']['setting_type']);
					$kpi_data = $model->get_kpi_list($where,$data,$list);  
					if (count($kpi_data)>0) 
					{
						for ($i=0; $i < count($kpi_data); $i++) 
						{ 
							$update_flag = array(
							'final_kra_status' => 'Pending',
							);
							$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
						//print_r($update);die();
						} 
					}	
				}
				else if (count($settings_data1)>0) 
				{
				
					$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
					if ($settings_data1['0']['setting_type'] == $year) 
					{
						$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
						$list = array('Employee_id','goal_set_year');
						$data = array($Emp_id,$settings_data1['0']['setting_type']);
						$kpi_data = $model->get_kpi_list($where,$data,$list);  

						if (count($kpi_data)>0) 
						{
							for ($i=0; $i < count($kpi_data); $i++)
							{ 
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

					if (count($kpi_data)>0) 
					{
						for ($i=0; $i < count($kpi_data); $i++) 
						{ 
							$update_flag = array(
							'final_kra_status' => 'Pending',
							);
							$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$update_flag,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data[$i]['KPI_id'])); 
						} 
					}			
				}
				$update_flag1 = array('idp_final_status' => 'Pending',);
				$update = Yii::app()->db->createCommand()->update('IDP',$update_flag1,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
				//'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));
				$update_flag2 = array('year_end_reviewb_status' => '1',);
				$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$update_flag2,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
				//print_r($update);die();
				Yii::import('ext.yii-mail.YiiMailMessage');
				$where1 = 'where Email_id = :Email_id';
				$list1 = array('Email_id');
				$data2 = array($Employee_id);
				$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
				//print_r($employee_data1);die();
				$where1 = 'where Email_id = :Email_id';
				$list1 = array('Email_id');
				$data2 = array($employee_data1['0']['Reporting_officer1_id']);
				$employee_data_rqt = $emploee_data->get_employee_data($where1,$data2,$list1); 
//print_r($employee_data_rqt);die();
				// $message = new YiiMailMessage;
				// $message->view = "year_end_approval_pending";
				// $params = array('mail_data'=>$employee_data1,'mail_data1'=>$employee_data_rqt);
				// $message->setBody($params, 'text/html');
				// $message->subject = 'Year end review approval pending';
				// $message->addTo($employee_data1['0']['Reporting_officer1_id']);
				// $message->addCC($Employee_id);  
				// $message->from = $Employee_id;
				// Yii::app()->mail->send($message);
				// $where1 = 'where Email_id = :Email_id';
				// $list1 = array('Email_id');
				// $data2 = array($employee_data1['0']['Reporting_officer1_id']);
				// $employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
				// $notification_data->notification_type = 'Year end review(A) submitted.';
				// $notification_data->Employee_id = $employee_data1['0']['Employee_id'];
				// $notification_data->date = date('Y-m-d');
				// $notification_data->save();

		$Employee_id = Yii::app()->user->getState("employee_email");

		if($employee_data1['0']['invalid_email'] != '1')
       {
       	//echo "if";die();
       			require 'PHPMailer-master/PHPMailerAutoload.php';
       			$mail = new PHPMailer;
				$mail->isSMTP();                
				$mail->Host = 'smtp.office365.com'; 
				$mail->SMTPAuth = true;                          
				$mail->Username = 'vvf.pms@vvfltd.com';    
				$mail->Password = 'Kritva@5Jan';                    
				$mail->SMTPSecure = 'tls';                          
				$mail->Port = 587; 
              	$params = array('mail_data'=>$employee_data);
               	$message = $this->renderPartial('//site/mail/year_end_approval_pending',$params,TRUE);
               	$mail->Subject = 'Year end review approval pending';
				$mail->Body    = $message;
              	$mail->addReplyTo($employee_data1['0']['Reporting_officer1_id'], 'Goal Approve1');
              	$mail->setFrom($Employee_id,$employee_data1['0']['Emp_fname'].' '.$employee_data1['0']['Emp_lname']);
              	$mail->isHTML(true);     
              	
    			  if($mail->send())
    			  {	  		
    			  		echo "Notification Send";die();
    			  }
    			  else{
    			  	echo "Notification Send2";die();
    			  }
    			        
       }
       else
       {
          echo "Notification Send1";die();
       }

		}

function actiondel_promo_form()
{
    if(Yii::app()->user->getState("Employee_id"))
	    {
$emploee_data =new EmployeeForm;
$setting_date=new SettingsForm;
$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
$normalize =new NormalizeRatingForm;
                        $IDP_data=array();
                        $IDPForm =new IDPForm;	
                        $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
//print_r($IDP_data);die();

              $promotion_data=array();
	       $promotion = new PromotionForm;
		//$emp_data = new EmployeeForm;
		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
		$promotion_data = $promotion->get_employee_data($where,$data,$list);


                if(count($promotion_data)>0){          
		 //print_r($IDP_data['0']['career_plan']);die();
		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('promotion_form_data', 'Employee_id=:Employee_id', array(':Employee_id'=>$_POST['emp_id']));
		if ($query_result) {
			print_r("success");die();
		}
                 
}
}
   else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
}

function actionget_promo_form()
{
    if(Yii::app()->user->getState("Employee_id"))
	    {
		$emploee_data =new EmployeeForm;
$setting_date=new SettingsForm;
$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
$normalize =new NormalizeRatingForm;
                        $IDP_data=array();
                        $IDPForm =new IDPForm;	
                        $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
//print_r($IDP_data);die();

              $promotion_data=array();
	       $promotion = new PromotionForm;
		//$emp_data = new EmployeeForm;
		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($_POST['emp_id'],$settings_data['0']['setting_type']);
		$promotion_data = $promotion->get_employee_data($where,$data,$list);

		$link = '';
		if(count($promotion_data)>0)
		{
		 $link = "<a href='".Yii::app()->createUrl("index.php/Promotion/promotion_form",array("Employee_id"=>$_POST['emp_id']))."' target='_new'>Check Promotion Form</a><i class='fa fa-trash-o' aria-hidden='true' style='margin-left: 10px;cursor: pointer;' id='del_this'></i>";
		}
echo $link;
}
else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
}

function actionfinal_goal_review()
	{
	    if(Yii::app()->user->getState("Employee_id"))
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
	     else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}	
function actionupdatereview_delfile1()
{
$Employee_id = Yii::app()->user->getState("Employee_id");
$IDPForm =new IDPForm;
$data = array(
			$_POST['id'] => '',
			);
			// $update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id));
$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
			//'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));

}
function actionupdatereview_delfile()
{
    if(Yii::app()->user->getState("Employee_id"))
	    {
$model=new KpiAutoSaveForm;
$emploee_data =new EmployeeForm;
$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data2 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where1,$data2,$list1);
$mg_name = '';$squ_number = '';
$se_num = explode(';',$kpi_data['0']['seq_number']);
$document_proof = explode(';',$kpi_data['0']['document_proof']);
for($j=0;$j<count($se_num);$j++)
{
if($se_num[$j] != $_POST['num'])
{
if($squ_number == '')
{
$squ_number = $se_num[$j];
}
else
{
$squ_number = $squ_number.';'.$se_num[$j];
}
if($mg_name == '')
{
$mg_name = $document_proof[$j];
}
else
{
$mg_name = $mg_name.';'.$document_proof[$j];
}
}
}
$data = array(
			'document_proof' => $mg_name,
                        'seq_number' => $squ_number,
		);
//print_r($data);die();
$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
//print_r($_POST['KPI_id']);die();
}
else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
}

	function actionupdatereview_appraiser()
	{
	    
	    //echo "hi";die();

	    if(Yii::app()->user->getState("Employee_id"))
	    {
	
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$final_kra_status = 'Pending';
		
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
		$kra_id_list = explode(';',$_POST['KPI_id']);
		$apr_rate = explode('^',$_POST['appraiser_raiting']);
		$apr_comment = explode('^',$_POST['appraiser_comment']);
		$sum_score = explode(';',$_POST['average_rating']);
		//print_r($kra_id_list);die();
		for($i = 0;$i<count($kra_id_list);$i++)
		{
		$model=new KpiAutoSaveForm;
		$where1 = 'where KPI_id = :KPI_id';
				$list1 = array('KPI_id');
				$data2 = array($kra_id_list[$i]);
				$kpi_data = $model->get_kpi_list($where1,$data2,$list1);
				//print_r($_POST['state']);die();
		if($_POST['state'] != '')
		{
		$data = array(
					'appraiser_end_review' => $apr_comment[$i], 
					'appraiser_end_rating' => $apr_rate[$i],
					'appraiser_avrage_end' => $sum_score[$i],
					'final_kra_status' => 'Approved'
				);
		}
		else
		{
		$data = array(
					'appraiser_end_review' => $apr_comment[$i], 
					'appraiser_end_rating' => $apr_rate[$i],
					'appraiser_avrage_end' => $sum_score[$i],
		            'final_kra_status' => 'Approved'
				);
		}
				
		//print_r($data);die();
				$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_id_list[$i]));
		}            
		                    
                
		$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data2 = array($kra_id_list['0']);
		$kpi_data = $model->get_kpi_list($where1,$data2,$list1);
                
$data_yearB=array(
			'yearB_rate1'=>$_POST['yearB_rate1'],
			'yearB_rate2'=>$_POST['yearB_rate2'],
			'yearB_rate3'=>$_POST['yearB_rate3'],
			'yearB_rate4'=>$_POST['yearB_rate4'],
			'appr_comments_yearB1'=>$_POST['appr_comments_yearB1'],
			'appr_comments_yearB2'=>$_POST['appr_comments_yearB2'],
			'appr_comments_yearB3'=>$_POST['appr_comments_yearB3'],
			'appr_comments_yearB4'=>$_POST['appr_comments_yearB4'],                        
			'year_end_b_appr_status'=>1,
		);

        //$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data_yearB,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));  
        $update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data_yearB,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>"2017-2018"));  
        //'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
if(isset($_POST['manager_1_rate']) && $_POST['manager_1_rate'] != '')
{
$data = array(			
                        'project_final_review_apr' => $_POST['project_final_review_apr'],
                        'rel_program_final_review_by_apr' => $_POST['rel_program_final_review_by_apr'],
                        'program_final_review' => $_POST['program_final_review'],	
                        'extra_program_final_review' => $_POST['extra_program_final_review'],	
                        'career_plan' => $_POST['career_plan'],		
                        'career_plan_desc' => $_POST['career_plan_desc'],	
                        'other_comment' => $_POST['other_comment'],
                        'performance_rating'=>$_POST['performance_rating'],
                        'Tota_score'=>$_POST['Tota_score'],
'manager_1_rate' => $_POST['manager_1_rate'],
		);
}
if(isset($_POST['manager_2_rate']) && $_POST['manager_2_rate'] != '')
{
$data = array(			
                        'project_final_review_apr' => $_POST['project_final_review_apr'],
                        'rel_program_final_review_by_apr' => $_POST['rel_program_final_review_by_apr'],
                        'program_final_review' => $_POST['program_final_review'],	
                        'extra_program_final_review' => $_POST['extra_program_final_review'],	
                        'career_plan' => $_POST['career_plan'],		
                        'career_plan_desc' => $_POST['career_plan_desc'],	
                        'other_comment' => $_POST['other_comment'],
                        'performance_rating'=>$_POST['performance_rating'],
                        'Tota_score'=>$_POST['Tota_score'],
'manager_2_rate' => $_POST['manager_2_rate'],
		);
}
                
//print_r($kpi_data['0']['Employee_id']);die();
//print_r($kpi_data['0']['Employee_id']);die();
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2017-2018'));
//print_r($data);die();
//print_r($kpi_data['0']['Employee_id']);die();
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
	     else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}


	function actionupdatereview_appraiser1()
	{
	   // echo "helloooooo";die();
	    if(Yii::app()->user->getState("Employee_id"))
	    {

		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$final_kra_status = 'Pending';

		$pending_count = 0;

		if ($pending_count==0) {
			$final_kra_status = 'Approved';
		}
		else
		{
			$final_kra_status = 'Pending';
		}
                                $kra_id_list = explode(';',$_POST['KPI_id']);
$apr_rate = explode('^',$_POST['appraiser_raiting']);
$apr_comment = explode('^',$_POST['appraiser_comment']);
$sum_score = explode(';',$_POST['average_rating']);

for($i = 0;$i<count($kra_id_list);$i++)
{
$model=new KpiAutoSaveForm;
$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data2 = array($kra_id_list[$i]);
		$kpi_data = $model->get_kpi_list($where1,$data2,$list1);
if($_POST['state'] != '')
{
$data = array(
			'appraiser_end_review' => $apr_comment[$i], 
			'appraiser_end_rating' => $apr_rate[$i],
			'appraiser_avrage_end' => $sum_score[$i]

		);
}
else
{
$data = array(
			'appraiser_end_review' => $apr_comment[$i], 
			'appraiser_end_rating' => $apr_rate[$i],
			'appraiser_avrage_end' => $sum_score[$i]
		);
}
	


		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_id_list[$i]));
		//print_r($kra_id_list[$i]);die();
}            
                    
                
		$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data2 = array($kra_id_list['0']);
		$kpi_data = $model->get_kpi_list($where1,$data2,$list1);
                
$data_yearB=array(
			'yearB_rate1'=>$_POST['yearB_rate1'],
			'yearB_rate2'=>$_POST['yearB_rate2'],
			'yearB_rate3'=>$_POST['yearB_rate3'],
			'yearB_rate4'=>$_POST['yearB_rate4'],
			'appr_comments_yearB1'=>$_POST['appr_comments_yearB1'],
			'appr_comments_yearB2'=>$_POST['appr_comments_yearB2'],
			'appr_comments_yearB3'=>$_POST['appr_comments_yearB3'],
			'appr_comments_yearB4'=>$_POST['appr_comments_yearB4'],                        
			//'year_end_b_appr_status'=>1,
		);

       
        $update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data_yearB,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2017-2018'));  
       
if(isset($_POST['manager_1_rate']) && $_POST['manager_1_rate'] != '')
{
$data = array(			
                        'project_final_review_apr' => $_POST['project_final_review_apr'],
                        'rel_program_final_review_by_apr' => $_POST['rel_program_final_review_by_apr'],
                        'program_final_review' => $_POST['program_final_review'],	
                        'extra_program_final_review' => $_POST['extra_program_final_review'],	
                        'career_plan' => $_POST['career_plan'],		
                        'career_plan_desc' => $_POST['career_plan_desc'],	
                        'other_comment' => $_POST['other_comment'],
                        'performance_rating'=>$_POST['performance_rating'],
                        'Tota_score'=>$_POST['Tota_score'],
						'manager_1_rate' => $_POST['manager_1_rate'],
		);
}
if(isset($_POST['manager_2_rate']) && $_POST['manager_2_rate'] != '')
{
$data = array(			
                        'project_final_review_apr' => $_POST['project_final_review_apr'],
                        'rel_program_final_review_by_apr' => $_POST['rel_program_final_review_by_apr'],
                        'program_final_review' => $_POST['program_final_review'],	
                        'extra_program_final_review' => $_POST['extra_program_final_review'],
                        'career_plan' => $_POST['career_plan'],		
                        'career_plan_desc' => $_POST['career_plan_desc'],	
                        'other_comment' => $_POST['other_comment'],
                        'performance_rating'=>$_POST['performance_rating'],
                        'Tota_score'=>$_POST['Tota_score'],
						'manager_2_rate' => $_POST['manager_2_rate'],
		);
}
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2017-2018'));
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
	     else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
	}

function actionsubmit_data()
	{
	    if(Yii::app()->user->getState("Employee_id"))
	    {
		$model = new PromotionForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['emp_id']);
		$emp_data = $model->get_employee_data($where,$data,$list);
//print_r( $_POST['goal_set_year']);die();
		if (count($emp_data)>0) {
			$data1 = array(
				'field1' => $_POST['field1'], 
				'field2' => $_POST['field2'], 
				'field3' => $_POST['field3'], 
				'field4' => $_POST['field4'], 
				'field5' => $_POST['field5'], 
				'field6' => $_POST['field6'], 
				'field7' => $_POST['field7'],  
				'field8' => $_POST['field8'],
                 'goal_set_year'=>$_POST['goal_set_year'],
                                
			);
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$_POST['emp_id'],':goal_set_year'=>"2017-2018"));
			//'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$Employee_id,':goal_set_year'=>"2017-2018"));
			if ($update == 1) {
				echo "update";
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			$model->field1 = $_POST['field1'];
			$model->field2 = $_POST['field2'];
			$model->field3 = $_POST['field3'];
			$model->field4 = $_POST['field4'];
			$model->field5 = $_POST['field5'];
			$model->field6 = $_POST['field6'];
			$model->field7 = $_POST['field7'];
			$model->field8 = $_POST['field8'];
             $model->goal_set_year = $_POST['goal_set_year'];
                        
			$model->Employee_id = $_POST['emp_id'];
			if ($model->save()) {
				echo "success";
			}
			else
			{
				echo "error";
			}
		}
	    }
	     else
	    {
	        $model = new LoginForm;	
		    $this->render('//site/session_check_view');
		    $this->render('//site/admin_login',array('model'=>$model));
	    }
		
	}
	
}	
