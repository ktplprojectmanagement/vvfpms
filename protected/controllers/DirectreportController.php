<?php

class DirectreportController extends Controller
{
	public function actionIndex()
	{
	    $date = date('Y-m-d', strtotime("16-Jan-80"));
	    echo $date;die();
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
                                $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data['0']['setting_type']);
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
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,date('Y'));
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
//print_r($kpi_data);die();
		$kpi = $model->getdata();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_reviewa',array('program_data_result'=>$program_data_result,'kpi_data' => $kpi_data,'emp_data' => $emp_data,'mgr_data'=>$mgr_data,'IDP_data'=>$IDP_data,'designation_flag'=>$designation_flag));
		$this->render('//site/footer_view_layout');		
	}	
	
	function actionchart($email,$emp_id,$val)
     {
         
        $employee=new EmployeeForm;    
        $where = 'where Reporting_officer1_id = :Reporting_officer1_id';
        $list = array('Reporting_officer1_id');
        $data = array($email);
        $apr_data_details = $employee->get_employee_data($where,$data,$list);
        $apr_data_details=(array_filter($apr_data_details));
        $where = 'where Email_id = :Email_id';
        $list = array('Email_id');
        $data = array($email);
        $apr_data_details1 = $employee->get_employee_data($where,$data,$list);
        $apr_data_details1=(array_filter($apr_data_details1));
        $style = 'margin-left: 49px';$color = "color:red";
        //print_r($apr_data_details);die();
             if(isset($apr_data_details) && $apr_data_details !='' && count($apr_data_details)>0)
            {
                //echo "hi";die();
                for($j=0;$j<count($apr_data_details);$j++)
                {
                        //echo "hiw";
                        $where = 'where Reporting_officer1_id = :Reporting_officer1_id';
                        $list = array('Reporting_officer1_id');
                        $data = array($apr_data_details[$j]['Email_id']);
                        $apr_data_details2 = $employee->get_employee_data($where,$data,$list);
                        // //echo "<lable style='color:green'>".$apr_data_details['0']['Emp_fname']." ".$apr_data_details['0']['Emp_lname']."</lable>";  echo "<br>"; 
                        $apr_data_details2=(array_filter($apr_data_details2));
                        if($apr_data_details2 !='' && count($apr_data_details2)>0)
                        {
                          echo "hi";
                          $model1=new KpiAutoSaveForm;	
                            $where = 'where Employee_id = :Employee_id';
                            $list = array('Employee_id');
                            $data = array($apr_data_details[$j]['Email_id']);
                            $kpi_data_details = $model1->get_kpi_list($where,$data,$list);
                            $kpi_data_details = (array_filter($kpi_data_details));
                            $color = "color:red";
                            if(isset($kpi_data_details['0']['final_kra_status']) && $kpi_data_details['0']['final_kra_status'] !='' ){
	                            if($kpi_data_details['0']['final_kra_status'] == 'Approved')
	                            {
	                               $color = "color:green";
	                            }
	                            }
	                            if($apr_data_details[$j]['Email_id'] != $apr_data_details1['0']['Email_id'])
	                            {
	                                
	                                echo "<a href='".Yii::app()->createUrl('index.php/Directreport/appraiser_end_review',array('Employee_id'=>$apr_data_details[$j]['Employee_id'],'apr_data'=>$apr_data_details[$j]['Reporting_officer1_id']))."'  target='_new' style='".$color."'><lable style='".$style."'>".$apr_data_details[$j]['Emp_fname']." ".$apr_data_details[$j]['Emp_lname']."</a></lable>";  echo "<br>"; 
	                            }
                            
                            //print_r(count($apr_data_details2));die();
                            for($l=0;$l<count($apr_data_details2);$l++)
                            {
                               //  echo $apr_data_details2[$l]['Employee_id'];die();
                                if(isset($apr_data_details2) && count($apr_data_details2)>0 && $apr_data_details2 != ''){
                                $val = 1;
                           		$this->actionchart('employee.kritva@gmail.com','123456',$val); 

                                }
                                 //employee.kritva@gmail.com
                                 //demo.appraisel@gmail.com
                                 //drtey@gffg.gh
                                 //manish.gudekar@kritva.com
                                 //123456
                                 //456789
                                 //dddd
                                 //1004
                            }die();
                            
                        }
                        // else
                        // {
                            
                        //     //echo $apr_data_details[$j]['Emp_fname']." ".$apr_data_details[$j]['Emp_lname']; echo "<br>";
                        //     $this->actionchart($apr_data_details[$j]['Email_id'],$apr_data_details[$j]['Employee_id'],$val);  
                        // }
                }
            }
            else if($apr_data_details1 !='' && count($apr_data_details1)>0)
            {
            	echo "hwwi";die();
                $model1=new KpiAutoSaveForm;	
                $where = 'where Employee_id = :Employee_id';
                $list = array('Employee_id');
                $data = array($apr_data_details1['0']['Employee_id']);
                $kpi_data_details = $model1->get_kpi_list($where,$data,$list);
                $color = "color:red";
                if($kpi_data_details['0']['final_kra_status'] == 'Approved')
                {
                   $color = "color:green";
                }
                if($val>0)
                {
                    $style = 'margin-left: 135px';
                }
               
                echo "<a href='".Yii::app()->createUrl('index.php/Directreport/appraiser_end_review',array('Employee_id'=>$apr_data_details1['0']['Employee_id'],'apr_data'=>$apr_data_details1['0']['Reporting_officer1_id']))."'  target='_new' style='".$color."'><lable style='".$style."'>".$apr_data_details1['0']['Emp_fname']." ".$apr_data_details1['0']['Emp_lname']."</lable>";  echo "<br>"; 
            }
      
       //echo $html;
       //$this->actionchart($apr_data_details2['0']['Reporting_officer1_id'],$apr_data_details2['0']['Employee_id'],$val);  
     }

	public function actionappraiser_end_review($Employee_id = null,$apr_data = null)
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
		$data = array($Employee_id,Yii::app()->user->getState("employee_email"));
		$emp_data_report = $employee->get_employee_data($where,$data,$list);

$where = 'where Employee_id = :Employee_id and year_end_review_of_manager =:year_end_review_of_manager';
		$list = array('Employee_id','year_end_review_of_manager');
		$data = array($Employee_id,Yii::app()->user->getState("employee_email"));
		$emp_data_report1 = $employee->get_employee_data($where,$data,$list);

                 $IDPForm =new IDPForm;	 
                $where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

                $program_data =new ProgramDataForm;
                $program_data_result = $program_data->get_data();
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
		$data = array($apr_data);
		$as_apr_data = $employee->get_employee_data($where,$data,$list);

                $where = 'where Employee_id = :Employee_id and Reporting_officer1_id =:Reporting_officer1_id';
		$list = array('Employee_id','Reporting_officer1_id');
		$data = array($Employee_id,$apr_data);
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
		$this->render('//site/sub_emp_direct',array('kpi_data' => $kpi_data,'emp_data' => $emp_data,'as_apr_data'=>$as_apr_data,'IDP_data'=>$IDP_data,'program_data_result'=>$program_data_result,'emp_promotion_data'=>$emp_promotion_data,'show_idp'=>$show_idp,'emp_data_report'=>$emp_data_report,'chk_admin_assign'=>$chk_admin_assign,'chk_manager_diff'=>$chk_manager_diff,'num_days'=>$num_days));	
		$this->render('//site/footer_view_layout');		
	}

        public function actionappraiser_end_review1($Employee_id = null)
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

	function actionyear_end_reviewlist()
	{
		$model=new KpiAutoSaveForm;	
		$employee=new EmployeeForm;
		$KRA_status_flag = '3';
		$emp_data = '';
		$selected_option = 'year end review';
		$kpi_data = $model->get_emp_list_new(Yii::app()->user->getState("employee_email"));
                $kpi_data2 = $employee->get_distinct_list('Employee_id',"where year_end_review_of_manager = '".Yii::app()->user->getState("employee_email")."'");
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
for ($i=count($kpi_data); $i < count($kpi_data2); $i++) { 
			$emp_id = $kpi_data2[$i]['Employee_id'];
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
//print_r($emp_data);die();
                
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/directlist',array('emp_data' => $emp_data));
		$this->render('//site/footer_view_layout');		
	}

function actionupdatereview()
	{
//echo "hi"	; die();
$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		
		

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
$total_upload = explode(';',$_POST['kpi_file_value']);
$kpi_total_list = explode(';',$_POST['kpi_value_id']);
$year_end_rva = explode('^',$_POST['year_end_reviewa']);
$year_end_rcmnt = explode('^',$_POST['year_end_achieve']);
//print_r($year_end_rva);die();

for($j=0;$j<count($kpi_total_list);$j++)
{
$model=new KpiAutoSaveForm;
$where = 'where KPI_id = :KPI_id';
$list = array('KPI_id');
$data1 = array($kpi_total_list[$j]);
$kpi_data = $model->get_kpi_list($where,$data1,$list);
$kpi_list = explode(';',$kpi_data['0']['kpi_list']);
//print_r(count($kpi_list));die();
$mg_name="";
$squ_number="";
for($i=0;$i<count($kpi_list);$i++)
{

if(isset($_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name']) && $_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name'] != '')
{

		$image_data = CUploadedFile::getInstanceByName('employee_csv'.$i.$kpi_total_list[$j]);
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/'.$_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name']);
	    	$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/'.$_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name']);
if($mg_name == '')
{
$mg_name=$_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name'];
}
else
{
$mg_name=$mg_name.';'.$_FILES['employee_csv'.$i.$kpi_total_list[$j]]['name'];
}
//print_r($mg_name);die();
if($squ_number == '')
{
$squ_number = $kpi_total_list[$j].$i;
}
else
{
$squ_number = $squ_number.';'.$kpi_total_list[$j].$i;
}
		
}
else
{
if($kpi_data['0']['seq_number'] != '')
{
$file = explode(';',$kpi_data['0']['document_proof']);
$seq = explode(';',$kpi_data['0']['seq_number']);
for($f = 0;$f<count($seq);$f++)
{
if($seq_number[$f] == $i)
{
if($mg_name == '')
{
$mg_name=$file[$f];
}
else
{
$mg_name=$mg_name.';'.$file[$f];
}
if($squ_number == '')
{
$squ_number = $seq[$f];
}
else
{
$squ_number = $squ_number.';'.$seq[$f];
}
}
}
}
}

}

//print_r($year_end_rcmnt);die();
	$data = array(
                        'year_end_reviewa' => $year_end_rva[$j],
			'year_end_achieve' => $year_end_rcmnt[$j], 
			'KRA_status_flag' => '3',		
			'document_proof' => $mg_name,
                        'seq_number' => $squ_number,
		);
//print_r($data);die();

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_total_list[$j]));
}

//print_r($_FILES['employee_csv'.$_POST['kpi_list_value_id']]['name']);die();
//print_r($update);die();
//print_r($_POST['kpi_file_value']);die();
$IDPForm =new IDPForm;	
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($kpi_data['0']['Employee_id'],'2016-2017');
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

    if (isset($_FILES['proof3']['name'])) {
			$filenamekey = $kpi_data['0']['Employee_id']."-"."proof3"; 
			$Fileext = pathinfo($_FILES['proof3']['name'], PATHINFO_EXTENSION);
			$IDPForm->proof3=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof3');
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/year_end_idp_proofs/'.$IDPForm->proof3);
$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_idp_proofs/'.$IDPForm->proof3);
		}
		else
		{
if($IDP_data['0']['proof3'] != '')
{
$IDPForm->proof3 = $IDP_data['0']['proof3'];
}
else
{
$IDPForm->proof3 = '';
}
			
		}


		$data = array(	
 'proof3' => $IDPForm->proof3,
                        'Year_end_prg_status'=>$_POST['Year_end_prg_status'],
            'Year_end_prg_comments'=>$_POST['Year_end_prg_comments'],
            'Extra_year_end_prg_status'=>$_POST['Extra_year_end_prg_status'],
            'Extra_year_end_prg_comments'=>$_POST['Extra_year_end_prg_comments'],
            'Relationship_year_end_status'=>$_POST['Relationship_year_end_status'],
            'Relationship_year_end_comments'=>$_POST['Relationship_year_end_comments'],
            'Year_end_prog_status'=>$_POST['Year_end_prog_status'],
            'Year_end_prog_comments'=>$_POST['Year_end_prog_comments']
		);

		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));
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
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array(Yii::app()->user->getState("Employee_id"));
		$employee_review_data = $model1->get_employee_data($where,$data,$list);
                
                if (isset($_FILES['proof2']['name'])) {
			$filenamekey = $employee_review_data['0']['Employee_id']."-"."proof2"; 
			$Fileext = pathinfo($_FILES['proof2']['name'], PATHINFO_EXTENSION);
			$model1->proof2=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof2');
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/year_end_proofs/'.$model1->proof2);
$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/'.$model1->proof2);
		}
		else
		{
			if($employee_review_data['0']['proof2'] != '')
{
$model1->proof2 = $employee_review_data['0']['proof2'];
}
else
{
$model1->proof2 = '';
}
		}

    if (isset($_FILES['proof1']['name'])) {
			$filenamekey = $employee_review_data['0']['Employee_id']."-"."proof1"; 
			$Fileext = pathinfo($_FILES['proof1']['name'], PATHINFO_EXTENSION);
			$model1->proof1=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof1');
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/year_end_proofs/'.$model1->proof1);
$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/'.$model1->proof1);
		}
		else
		{
if($employee_review_data['0']['proof1'] != '')
{
$model1->proof1 = $employee_review_data['0']['proof1'];
}
else
{
$model1->proof1 = '';
}
			
		}
//print_r($model1->proof1);die();

 if (isset($_FILES['proof_2']['name'])) {
			$filenamekey = $employee_review_data['0']['Employee_id']."-"."proof3"; 
			$Fileext = pathinfo($_FILES['proof_2']['name'], PATHINFO_EXTENSION);
			$model1->proof_2=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof_2');
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/year_end_proofs/'.$model1->proof_2);
$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/data(proof)/year_end_proofs/'.$model1->proof_2);
		}
		else
		{
			if($employee_review_data['0']['proof_2'] != '')
{
$model1->proof_2 = $employee_review_data['0']['proof_2'];
}
else
{
$model1->proof_2 = '';
}
		}

 if (isset($_FILES['proof_1']['name'])) {
			$filenamekey = $employee_review_data['0']['Employee_id']."-"."proof4"; 
			$Fileext = pathinfo($_FILES['proof_1']['name'], PATHINFO_EXTENSION);
			$model1->proof_1=$filenamekey.'.'.$Fileext;
			$image_data = CUploadedFile::getInstanceByName('proof_1');
	    	$image_data->saveAs(Yii::getPathOfAlias('webroot').'/data(proof)/year_end_proofs/'.$model1->proof_1);
$image_data->saveAs('http://kritvainvestments.com/pmsuser/data(proof)/year_end_proofs/'.$model1->proof_1);
		}
		else
		{
			if($employee_review_data['0']['proof_1'] != '')
{
$model1->proof_1 = $employee_review_data['0']['proof_1'];
}
else
{
$model1->proof_1 = '';
}
		}

	$command = Yii::app()->db->createCommand();
//$query_result1 = $command->delete('yearend_reviewb', 'Employee_id=:Employee_id', array(':Employee_id'=>''));
//print_r($employee_review_data);die();
		if (count($employee_review_data)>0) {


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

//print_r($review_data);die();

			$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$review_data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
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
$model1->proof_1= $_POST['proof_1'];
                        $model1->proof_2= $_POST['proof_2'];
			$model1->review_date = date('Y-m-d');
			$model1->goal_set_year = '2016-2017';
$model1->year_end_reviewb_status = 1;
//print_r($model1->attributes);die();
$model1->save();
			
			
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


		function actionupdatereview1()
	{
//echo "hi"	; die();
$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		
		

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
$total_upload = explode(';',$_POST['kpi_file_value']);
$kpi_total_list = explode(';',$_POST['kpi_value_id']);
$year_end_rva = explode('^',$_POST['year_end_reviewa']);
$year_end_rcmnt = explode('^',$_POST['year_end_achieve']);
//print_r($year_end_rva);die();

for($j=0;$j<count($kpi_total_list);$j++)
{
$model=new KpiAutoSaveForm;
$where = 'where KPI_id = :KPI_id';
$list = array('KPI_id');
$data1 = array($kpi_total_list[$j]);
$kpi_data = $model->get_kpi_list($where,$data1,$list);
$kpi_list = explode(';',$kpi_data['0']['kpi_list']);
//print_r(count($kpi_list));die();
$mg_name="";
$squ_number="";


//print_r($year_end_rcmnt);die();
	$data = array(
                        'year_end_reviewa' => $year_end_rva[$j],
			'year_end_achieve' => $year_end_rcmnt[$j], 
			'KRA_status_flag' => '3',		
			//'document_proof' => $mg_name,
                        //'seq_number' => $squ_number,
		);
//print_r($data);die();

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_total_list[$j]));
}

//print_r($_FILES['employee_csv'.$_POST['kpi_list_value_id']]['name']);die();
//print_r($update);die();
//print_r($_POST['kpi_file_value']);die();
$IDPForm =new IDPForm;	
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($kpi_data['0']['Employee_id'],'2016-2017');
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);

   

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
//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));
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
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array(Yii::app()->user->getState("Employee_id"));
		$employee_review_data = $model1->get_employee_data($where,$data,$list);
                
           
$command = Yii::app()->db->createCommand();
//$query_result1 = $command->delete('yearend_reviewb', 'Employee_id=:Employee_id', array(':Employee_id'=>''));
//print_r($employee_review_data);die();
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

			$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$review_data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
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
			$model1->goal_set_year = '2016-2017';
//print_r($model1->attributes);die();
$model1->save();
			
			
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

function actionfinal_goal_review1()
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

			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id));
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
       //echo "hi";die();
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
			
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));			
                 
}
else
{
$data = array(
				'update_flag' => '0'
			);
			
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));	
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
                        $normalize->goal_set_year = '2016-2017';
                        $normalize->save();			
		}
$update_flag1 = array(
			'idp_final_status' => 'Approved',
		);
		$update = Yii::app()->db->createCommand()->update('IDP',$update_flag1,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id'])); 
                $update_flag2 = array(
			'year_end_b_appr_status' => '1',
		);
		$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$update_flag2,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));

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
                $update_flag1 = array(
			'idp_final_status' => 'Pending',
		);
		$update = Yii::app()->db->createCommand()->update('IDP',$update_flag1,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id)); 
                $update_flag2 = array(
			'year_end_reviewb_status' => '1',
		);
		$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$update_flag2,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id));
    	Yii::import('ext.yii-mail.YiiMailMessage');
		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($Employee_id);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($employee_data1['0']['Reporting_officer1_id']);
		$employee_data_rqt = $emploee_data->get_employee_data($where1,$data2,$list1); 

		  $message = new YiiMailMessage;
		  $message->view = "year_end_approval_pending";
		  $params = array('mail_data'=>$employee_data1,'mail_data1'=>$employee_data_rqt);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Year end review approval pending';
		  $message->addTo($employee_data1['0']['Reporting_officer1_id']);
		  $message->addCC($Employee_id);  
		  $message->from = $Employee_id;
Yii::app()->mail->send($message);
		  	$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($employee_data1['0']['Reporting_officer1_id']);
			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  $notification_data->notification_type = 'Year end review(A) submitted.';
		  $notification_data->Employee_id = $employee_data1['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		    	
    }

function actiondel_promo_form()
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

function actionget_promo_form()
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
function actionupdatereview_delfile1()
{
$Employee_id = Yii::app()->user->getState("Employee_id");
$IDPForm =new IDPForm;
$data = array(
			$_POST['id'] => '',
			);
			$update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$Employee_id));

}
function actionupdatereview_delfile()
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
			'appraiser_avrage_end' => $sum_score[$i],
                        'final_kra_status' => 'Approved'
		);
}
		

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

        $update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data_yearB,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));  
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
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2016-2017'));
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


	function actionupdatereview_appraiser1()
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

        $update = Yii::app()->db->createCommand()->update('yearend_reviewb',$data_yearB,'Employee_id=:Employee_id',array(':Employee_id'=>$kpi_data['0']['Employee_id']));  
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
		$update = Yii::app()->db->createCommand()->update('IDP',$data,'Employee_id=:Employee_id and goal_set_year=:goal_set_year',array(':Employee_id'=>$kpi_data['0']['Employee_id'],':goal_set_year'=>'2016-2017'));
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

function actionsubmit_data()
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
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));
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
	
}	
