<?php

class Admin_DashboardController extends Controller
{
	function actionarray_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( !array_key_exists($columnKey, $value)) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            }
            else {
                if ( !array_key_exists($indexKey, $value)) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
	public function actionIndex()
	{
	    
		$set_dates=new SettingsForm;
		$idp= new IDPForm;
		$set_dates=$set_dates->get_all_data();
		$model = new KpiAutoSaveForm;
		$employee_data =new EmployeeForm;
		$recent_ac= new NotificationsForm;
       
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);

		if (isset($settings_data['0']['setting_type'])) {
			$year1=$settings_data['0']['setting_type'];
		}
		
		
		$today_date_val = date('Y').'-03-'.'31';
		
		$where = "where last_working_date != :last_working_date and last_working_date != :last_working_date and last_working_date > :last_working_date";
		$list = array('last_working_date','last_working_date','last_working_date');
		$data = array('','0',$today_date_val);
		$resign_emp = $employee_data->get_employee_data($where,$data,$list);
		
		for($j=0;$j<count($resign_emp);$j++)
		{
		    $data=array(
				'pms_status'=>'Inactive',
		        );
		    $update = Yii::app()->db->createCommand()->update('Employee',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$resign_emp[$j]['Employee_id']));
		}
		
		
		
		$recent_act=$recent_ac->get_notificationdata();
		$recent_act1=$recent_ac->get_pending_notificationdata();
		$recent_act2=$recent_ac->get_approve_notificationdata();
		$recent_act3=$recent_ac->get_submitted_notificationdata();
                if(isset($recent_act1) && count($recent_act1)>0)
{
for($i=0;$i<count($recent_act1);$i++){
		$Employee_id=$recent_act1[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act1[$i]['Employee_id']);
		$recent_emp1[$i]=$employee_data->get_employee_data($where,$data,$list);
		
		}
}
		
		
if(isset($recent_act2) && count($recent_act2)>0)
{
for($i=0;$i<count($recent_act2);$i++){
		$Employee_id=$recent_act2[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act2[$i]['Employee_id']);
		$recent_emp2[$i]=$employee_data->get_employee_data($where,$data,$list);
		
		}
}
		

		if(isset($recent_act3) && count($recent_act3)>0)
{
for($i=0;$i<count($recent_act3);$i++){
		$Employee_id=$recent_act3[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act3[$i]['Employee_id']);
		$recent_emp3[$i]=$employee_data->get_employee_data($where,$data,$list);
		
		}
}

		$kpi_sub = $model->get_distinct_list('Employee_id','where `goal_set_year`="'.$year1.'"');
		
		$kpi_data1 = array( );
		for($i=0;$i<count($kpi_sub);$i++){
				$Employee_id=$kpi_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_sub[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}

		$kpi_pending=$model->get_pending_goal($year1);
		

		
			$kpi_appr_data=array();
		$kpi_appr=$model->get_disinct_kra_appr($year1);
		$cnt = 0;

			for($i=0;$i<count($kpi_appr);$i++){

				$Employee_id=$kpi_appr[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id AND pms_status != :pms_status ';
				$list = array('Employee_id');
				$data = array($kpi_appr[$i]['Employee_id']);
				$kpi_appr_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
                               if(!($kpi_appr_data1[$i]['0']['pms_status'] == 'Inactive'))
{
$kpi_appr_data[$cnt] = $kpi_appr_data1[$i];
$cnt++;
}


			}

//print_r($kpi_appr_data);
//die();
			$kpi_emp_not_sub=array();
	//	$emp_list = $model->get_distinct_list('Employee_id','where ((`goal_set_year`="'.$year1.'") AND (`KRA_status`= "" OR `KRA_status` ="Pending") AND  `KRA_status_flag` > "0") ');
	$emp_list = $model->get_distinct_list('Employee_id','where ((`goal_set_year`="'.$year1.'") ) ');		
			$emp_all_data = $employee_data->get_distinct_emplist();
			$emp_id_array = '';
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}
		$kpi_emp_not_sub = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status != "Inactive" and Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();
//print_r($kpi_emp_not_sub);
//die();
		$mid_sub_data=array();
		$mid_not_sub=array();
		$mid_sub=$model->get_mid_review_submitted($year1);

		for($i=0;$i<count($mid_sub);$i++){
				$Employee_id=$mid_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($mid_sub[$i]['Employee_id']);
				$mid_sub_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(isset($mid_sub_data1[$i]['0']['pms_status']) && isset($mid_sub_data1[$i]) && $mid_sub_data1[$i]['0']['pms_status'] != 'Inactive')
{
	$mid_sub_data[$i] = $mid_sub_data1[$i];
}

				
			}
			
$mid_sub_data=count(array_filter($mid_sub_data1));

		$emp_mid_list = $model->get_mid_review_submitted($year1);
		$emp_all_data = $employee_data->get_distinct_emplist();
		$emp_id_array = '';
		for ($m=0; $m < count($emp_mid_list); $m++) { 
				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_mid_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_mid_list[$m]['Employee_id'].'"';
				}
				
			}
		$mid_not_sub = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status !="Inactive" and  Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();

			
		$all_emp= implode(', ', $this->actionarray_column($emp_all_data, 'Employee_id'));
		$data=$all_emp;
		$array = $all_emp;
		$array = explode( ',', $array );
		foreach ($array as &$value){
		    $value = "'" . trim($value)."'";
		}
		$array = implode(', ', $array);
		
		
		//Total head count

		$tot_count=array();
		$tot_count=$employee_data->getdata();

		//Total head count
		
		
		//IDP submitted status begin
		$idp_sub=array();
		$idp_sub=$idp->get_emp_idp_submitted($array,$year1);
		
		//IDP submitted status end
		

		//IDP not submitted status begin
		$emp_not_idp= implode(', ', $this->actionarray_column($idp_sub, 'Employee_id'));
		$data=$emp_not_idp;
		$emp_not_sub_idp = $emp_not_idp;
		$emp_not_sub_idp = explode( ',', $emp_not_sub_idp );
		foreach ($emp_not_sub_idp as &$value){
		    $value = "'" . trim($value)."'";
		}
		$emp_not_sub_idp = implode(', ', $emp_not_sub_idp);

		$idp_not_sub=array();
		$idp_not_sub=$employee_data->get_emp_idp_not_submitted($emp_not_sub_idp);
$code_idp = 0;
for ($i=0; $i < count($idp_not_sub); $i++)
{
  $where = 'where Employee_id = :Employee_id ';
  $list = array('Employee_id');
  $data = array($idp_not_sub[$i]['Employee_id']);
  $idp_not_sub1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(!($idp_not_sub1[$i] == ''))
{
$idp_not_sub[$i] = $idp_not_sub1[$i];
}
  
}
//$idp_not_sub = $code_idp; 
//print_r($idp_not_sub_count);die();
		//print_r($idp_not_sub);die();
		//IDP not submitted status end
//print_r($idp_not_sub);die();
		//IDP Pending for approval begin
		$idp_pending=array();
		$idp_pending=$idp->get_emp_idp_staus('Pending',$array,$year1);
$code_idp1 = 0;
for ($i=0; $i < count($idp_pending); $i++)
{
  $where = 'where Employee_id = :Employee_id ';
  $list = array('Employee_id');
  $data = array($idp_pending[$i]['Employee_id']);
  $idp_pending1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(!($idp_pending1[$i] == ''))
{
$idp_pending[$i] = $idp_pending1[$i];
}
  
}
//$idp_pending = $code_idp1; 
		//print_r($idp_pending_count);die();
		//IDP Pending for approval begin

		//IDP Approved begin
		$idp_approved=array();
		$idp_approved=$idp->get_emp_idp_staus('Approved',$array,$year1);
$code_idp2 = 0;
$cnt = 0;
for ($i=0; $i < count($idp_approved); $i++)
{

$where = 'where Employee_id = :Employee_id';
  $list = array('Employee_id');
  $data = array($idp_approved[$i]['Employee_id']);
  $idp_approved1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(!($idp_approved1[$i]['0']['pms_status'] == 'Inactive'))
{
$idp_approved[$cnt] = $idp_approved1[$i];
$cnt++;
 
}
 
}
//die();
//$idp_approved = $code_idp2;
//print_r($idp_approved);die();
		//IDP Approved begin
		//IDP initial status end

		//IDP mid year review begin

		//Mid year IDP submitted begin
		$mid_idp_sub=array();
		$mid_idp_sub=$idp->get_emp_mididp_submitted($array,$year1);


		//Mid year IDP submitted end

		//Mid year IDP not submitted begin 
		$mid_idp_not_sub=array();
		$emp_not_mididp= implode(', ', $this->actionarray_column($mid_idp_sub, 'Employee_id'));
		$data=$emp_not_mididp;
		$emp_not_subMid_idp = $emp_not_mididp;
		$emp_not_subMid_idp = explode( ',', $emp_not_subMid_idp );
		foreach ($emp_not_subMid_idp as &$value){
		    $value = "'" . trim($value)."'";
		}
		$emp_not_subMid_idp = implode(', ', $emp_not_subMid_idp);
		$mid_idp_not_sub=$employee_data->get_midEmp_idp_not_submitted($emp_not_subMid_idp);
for ($i=0; $i < count($mid_idp_not_sub); $i++)
{
  $where = 'where Employee_id = :Employee_id';
  $list = array('Employee_id');
  $data = array($mid_idp_not_sub[$i]['Employee_id']);
  $mid_idp_not_sub1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(!($mid_idp_not_sub1[$i] == ''))
{
$mid_idp_not_sub[$i] = $mid_idp_not_sub1[$i];
}
//print_r(count($mid_idp_sub[$i]));
}	
		
		//Mid year IDP not submitted end

		//IDP mid year review begin

		//IDP

$code_idp2 = 0;
//print_r($mid_idp_sub);die();
for ($i=0; $i < count($mid_idp_sub); $i++)
{
  $where = 'where Employee_id = :Employee_id ';
  $list = array('Employee_id');
  $data = array($mid_idp_sub[$i]['Employee_id']);
  $mid_idp_sub1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(!($mid_idp_sub1[$i] == ''))
{
$mid_idp_sub[$i] = $mid_idp_sub1[$i];
}
//print_r(count($mid_idp_sub[$i]));
}		
//print_r($mid_idp_sub);die();
//print_r($kpi_emp_not_sub);die();

$kpi_pend=array();
$cnt = 0;
		for ($i=0; $i < count($kpi_pending); $i++) { 
			
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_pending[$i]['Employee_id']);
				$kpi_pend1[$i] = $employee_data->get_employee_data($where,$data,$list);
if(isset($kpi_pend1[$i]['0']['pms_status']) && !($kpi_pend1[$i]['0']['pms_status'] == 'Inactive'))
{
$kpi_pend[$cnt] = $kpi_pend1[$i];
$cnt++;
}

				
			}

$yearEnd=new Yearend_reviewbForm;
//$where='where  goal_set_year = :goal_set_year AND Employee_id != :Employee_id';
		//$list = array('goal_set_year','Employee_id');
		//$data = array($year1,"");
	//	$yearEnd_rev = $yearEnd->get_kpi_list($where,$data,$list);
$where='where year_end_reviewb_status =:year_end_reviewb_status AND goal_set_year = :goal_set_year ';
		$list = array('year_end_reviewb_status','goal_set_year');
		$data = array('1',$year1);
		$yearEnd_rev222 = $yearEnd->get_kpi_list($where,$data,$list);

		//print_r($yearEnd_rev);die();
		for($i=0;$i<count($yearEnd_rev222);$i++){
					
				$Employee_id=$yearEnd_rev222[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id AND pms_status = :pms_status';
				$list = array('Employee_id','pms_status');
				$data = array($Employee_id,'Active');
				$yearEnd_rev[$i] = $employee_data->get_employee_data($where,$data,$list);
		}
	

	$where='where year_end_reviewb_status =:year_end_reviewb_status AND year_end_b_appr_status != :year_end_b_appr_status AND goal_set_year = :goal_set_year';
		$list = array('year_end_reviewb_status','year_end_b_appr_status','goal_set_year');
		$data = array('1','1',$year1);
		$yearEnd_rev1 = $yearEnd->get_kpi_list($where,$data,$list);
                 //echo count($yearEnd_rev1) ;die();  
//print_r($yearEnd_rev1 )          ;die();

$where='where year_end_b_appr_status = :year_end_b_appr_status  AND goal_set_year = :goal_set_year AND Employee_id !=:Employee_id';
		$list = array('year_end_b_appr_status','goal_set_year','Employee_id');
		$data = array('1',$year1,"");
		$yearEnd_rev2 = $yearEnd->get_kpi_list($where,$data,$list); 

        
        $emp_list = $model->get_q1_review_submitted($year1);

		//	print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			$emp_id_array = '';
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}
		$q1_pending = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status != "Inactive" and Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();
		
		//print_r($q1_data1);die();
        $q1_appr=$model->get_disinct_q1_appr($year1);
	    $q1_pend=$model->get_q1_pending_rev($year1);
	    if (!isset($yearEnd_rev)) {
	    	$yearEnd_rev = '';
	    }
        //print_r($yearEnd_rev);die();
		$this->render('//site/script_file');
		$this->render('//site/admin_header_view');
		$this->render('//site/baseurl');
		$this->render('//site/admin_dashboard',array(
			'kpi_data1'=>$kpi_data1,
			'kpi_pend'=>$kpi_pend,
			'kpi_appr_data'=>$kpi_appr_data,
			'kpi_emp_not_sub'=>$kpi_emp_not_sub,
			'mid_sub_data'=>$mid_sub_data,
			'mid_not_sub'=>$mid_not_sub,
			'recent_emp1'=>$recent_emp1,
			'recent_emp2'=>$recent_emp2,
			'recent_emp3'=>$recent_emp3,
			'recent_act1'=>$recent_act1,
			'recent_act2'=>$recent_act2,
			'recent_act3'=>$recent_act3,
			'set_dates'=>$set_dates,
			'idp_sub'=>$idp_sub,
			'idp_not_sub'=>$idp_not_sub,
			'idp_pending'=>$idp_pending,
			'idp_approved'=>$idp_approved,
			'mid_idp_sub'=>$mid_idp_sub,
			'mid_idp_not_sub'=>$mid_idp_not_sub,
			'tot_count'=>$tot_count,
                        'yearEnd_rev' =>$yearEnd_rev,
                        'yearEnd_rev1' =>$yearEnd_rev1,
                        'yearEnd_rev2'=>$yearEnd_rev2,
                        'q1_pending'=>$q1_pending,
                        'q1_appr'=>$q1_appr,
                        'q1_pend'=>$q1_pend,
			));
		$this->render('//site/admin_footer_view');
		
	}

	function actionidp_prgStat()
	{
		//print_r("hi");die();
	$status = $_POST['status'];
	$value=explode('_', $status);
		
    $setting_date=new SettingsForm;
    $where = 'where setting_content = :setting_content and year = :year';
    $list = array('setting_content','year');
    $data = array('PMS_display_format',date('Y'));             
    $settings_data = $setting_date->get_setting_data($where,$data,$list);
    $year1=$settings_data['0']['setting_type'];

	$program_data =new ProgramDataForm;  
	$where = 'where  goal_set_year =:goal_set_year';
	$list = array('goal_set_year');
	$data = array($year1);
	$program_data_result = $program_data->get_kpi_data($where,$data,$list); 
	
	for ($i=0; $i < count($program_data_result); $i++) { 
		if($i == $value['1']){

			$idp=new IDPForm;
			$employee_data =new EmployeeForm;
			$idp_sub=array();
			//SELECT * FROM `IDP` WHERE `program_comment` LIKE '%6?%' AND `goal_set_year` = '2017-2018' 
			$where = "where program_comment LIKE '%".$i."?%' AND goal_set_year =:goal_set_year";
			$list = array('goal_set_year');
			$data = array($year1);
			$idp_prg=$idp->get_idp_data($where,$data,$list);

			
			//print_r($idp_prg);die();
			//echo $program_data_result[$i]['program_name'];die();
		}

		// $where = 'where Employee_id = :Employee_id ';
		// 	$list = array('Employee_id');
		// 	$data = array($idp_prg[$i]['Employee_id']);
		// 	$prg_list = $employee_data->get_employee_data($where,$data,$list);
	}
// print_r($idp_prg);die();
			
			
			for ($j=0; $j < count($idp_prg); $j++) { 
			$where = 'where Employee_id = :Employee_id ';
			$list = array('Employee_id');
			$data = array($idp_prg[$j]['Employee_id']);
			$prg_list[$j] = $employee_data->get_employee_data($where,$data,$list);
	}

 $content = '';
 if (isset($prg_list) && count($prg_list)>0) {
	for ($j=0; $j < count($program_data_result); $j++) { 
		
		if ($value[1] == $j) {
		//print_r($value[1])	;die();
						for ($i=0; $i < count($prg_list); $i++) { 
				
								if(isset($prg_list[$i]['0']['Reporting_officer1_id']) && $prg_list[$i]['0']['Reporting_officer1_id']!=''){
								$where = 'where Email_id = :Email_id';
								$list = array('Email_id');
								$data = array($prg_list[$i]['0']['Reporting_officer1_id']);
								$apr_name = $employee_data->get_employee_data($where,$data,$list);	
								}
			
								if(isset($prg_list[$i]) && $prg_list[$i]!=array()){
					
									if($content == '')
									{	

										$apr_name_data = '';
										if (isset($apr_name['0']['Emp_fname'])) {
											$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
										}
										$content = '<tr>'.'<td>'.$prg_list[$i]['0']['Employee_id'].'</td>'.'<td>'.$prg_list[$i]['0']['Emp_fname']." ".$prg_list[$i]['0']['Emp_mname']."  ".$prg_list[$i]['0']['Emp_lname'].'</td>'.'<td>'.$prg_list[$i]['0']['Gender'].'</td>'.'<td>'.$prg_list[$i]['0']['Designation'].'</td>'.'<td>'.$prg_list[$i]['0']['Department'].'<td>'.$prg_list[$i]['0']['Cadre'].'</td>'.'<td>'.$prg_list[$i]['0']['joining_date'].'</td>'.'<td>'.$prg_list[$i]['0']['DOB'].'</td>'.'<td>'.$prg_list[$i]['0']['Present_address'].'<td>'.$prg_list[$i]['0']['state'].'</td>'.'<td>'.$prg_list[$i]['0']['PAN_number'].'</td>'.'<td>'.$prg_list[$i]['0']['Email_id'].'</td>'.'<td>'.$prg_list[$i]['0']['cluster_name'].'</td>'.'<td>'.$prg_list[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$prg_list[$i]['0']['company_location'].'</td>'.'</tr>';
										
									}
									else
									{

										$apr_name_data = '';
										if (isset($apr_name['0']['Emp_fname'])) {
											$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
										}
										$content = $content.'<tr>'.'<td>'.$prg_list[$i]['0']['Employee_id'].'</td>'.'<td>'.$prg_list[$i]['0']['Emp_fname']." ".$prg_list[$i]['0']['Emp_mname']."  ".$prg_list[$i]['0']['Emp_lname'].'</td>'.'<td>'.$prg_list[$i]['0']['Gender'].'</td>'.'<td>'.$prg_list[$i]['0']['Designation'].'</td>'.'<td>'.$prg_list[$i]['0']['Department'].'<td>'.$prg_list[$i]['0']['Cadre'].'</td>'.'<td>'.$prg_list[$i]['0']['joining_date'].'</td>'.'<td>'.$prg_list[$i]['0']['DOB'].'</td>'.'<td>'.$prg_list[$i]['0']['Present_address'].'<td>'.$prg_list[$i]['0']['state'].'</td>'.'<td>'.$prg_list[$i]['0']['PAN_number'].'</td>'.'<td>'.$prg_list[$i]['0']['Email_id'].'</td>'.'<td>'.$prg_list[$i]['0']['cluster_name'].'</td>'.'<td>'.$prg_list[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$prg_list[$i]['0']['company_location'].'</td>'.'</tr>';
										
									}
								}

							}
			// }
			// else
			// {
			// 	$content = "No Record Found";
			// }
			print_r($content);die();

		}
}
}
}

	function actionstatusget()
	{
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];

		$status = $_POST['status'];
		$value = explode('_',$status);
		$model = new KpiAutoSaveForm;
		$employee_data =new EmployeeForm;
		$kpi_sub = $model->get_distinct_list('Employee_id','where `goal_set_year`="'.$year1.'"');
		$apr_name = '';
		//print_r($kpi_sub);die();
		//print_r($value[1]);die();
		/*if ($value[1] == 'Submitted') {	
			
		for($i=0;$i<count($kpi_sub);$i++){
				$Employee_id=$kpi_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				
				$list = array('Employee_id');
				$data = array($kpi_sub[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
				$where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($kpi_data1[$i]['0']['Reporting_officer1_id']);
				$apr_name = $employee_data->get_employee_data($where,$data,$list);
			}
			//print_r($apr_name);die();
			//print_r($kpi_data1);die();
		}*/
                  $tot_count=array();
		$tot_count=$employee_data->getdata();
		if ($value[1] == 'Submitted') {	
                       $kpi_data1 = $tot_count;
                      //print_r($kpi_data1);die();
			
		}
		else if($value[1] == 'Pending')
		{
			$kpi_pending=$model->get_pending_goal($year1);
			for ($i=0; $i < count($kpi_pending); $i++) { 
			
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($kpi_pending[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
                                if(isset($kpi_data1[$i]['0']['Reporting_officer1_id']) && $kpi_data1[$i]['0']['Reporting_officer1_id'] != '')
{
$where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($kpi_data1[$i]['0']['Reporting_officer1_id']);
				$apr_name = $employee_data->get_employee_data($where,$data,$list);
}
				
				
			}
			//print_r($kpi_data1);die();
		}
		else if($value[1] == 'Approved')
		{  
			$kpi_appr=$model->get_disinct_kra_appr($year1);
			//print_r($kpi_appr);die();
            $kpi_appr = array_filter($kpi_appr);
			//print_r($kpi_appr);die();
			for($i=0;$i<count($kpi_appr);$i++){
                if($kpi_appr[$i] != "" && count($kpi_appr[$i])>0){
				$Employee_id=$kpi_appr[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($kpi_appr[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);

				$where = 'where Email_id = :Email_id AND pms_status != :pms_status' ;
				$list = array('Email_id' , 'pms_status');
				$data = array($kpi_data1[$i]['0']['Reporting_officer1_id'] , 'Inactive');
				$apr_name = $employee_data->get_employee_data($where,$data,$list);
				}
			}
       // print_r($kpi_data1);die();

		}
		
		else if($value[1] == 'Pendingemp')
		{
			$model = new KpiAutoSaveForm;
	//	where (`goal_set_year`="'.$year1.'") AND (`KRA_status`='Pending' OR `KRA_status`='') AND (`KRA_status_flag` > '0')	
		//	$emp_list = $model->get_distinct_list('Employee_id','where ((`goal_set_year`="'.$year1.'") AND (`KRA_status`= ""  OR `KRA_status`= "Pending" ) AND  `KRA_status_flag` >"0") ');
            $emp_list = $model->get_distinct_list('Employee_id','where (`goal_set_year`="'.$year1.'") ');
		//	print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			$emp_id_array = '';
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}
		$kpi_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status != "Inactive" and Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();
		
		}
		$content = '';
			if (isset($kpi_data1) && count($kpi_data1)>0) {

				for ($i=0; $i < count($kpi_data1); $i++) { 	

					if ($value[1] == 'Pendingemp') {
				$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($kpi_data1[$i]['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);				
						
						//print_r($apr_name);die();
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
						$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']." ".$kpi_data1[$i]['Emp_mname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['Department'].'</td><td>'.$kpi_data1[$i]['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['Present_address'].'</td><td>'.$kpi_data1[$i]['state'].'</td>'.'<td>'.$kpi_data1[$i]['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']." ".$kpi_data1[$i]['Emp_mname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['Department'].'</td><td>'.$kpi_data1[$i]['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['Present_address'].'</td><td>'.$kpi_data1[$i]['state'].'</td>'.'<td>'.$kpi_data1[$i]['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['company_location'].'</td>'.'</tr>';
						}
					}
					/*else if($value[1] == 'Submitted')
					{
$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($kpi_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);	
						//print_r($kpi_data1);die();
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}	*/

                                         else if($value[1] == 'Submitted')
					{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($kpi_data1[$i]['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
					//print_r($value[1]);die();
						//print_r($kpi_data1);
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							//print_r($apr_name_data);die();
							
							
				
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']." ".$kpi_data1[$i]['Emp_mname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['Department'].'<td>'.$kpi_data1[$i]['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['Present_address'].'</td>'.'<td>'.$kpi_data1[$i]['state'].'</td>'.'<td>'.$kpi_data1[$i]['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['company_location'].'</td>'.'</tr>';
							
							/*'<tr>'.'<td>'."10001832".'</td>'.'<td>'."Rakesh S.N.  Sharma".'</td>'.'<td>'."M".'</td>'.'<td>'."Assistant General Manager".'</td>'.'<td>'."Human Resources".'<td>'."MMC".'</td>'.'<td>'."18/10/2010".'</td>'.'<td>'."20/09/1973".'</td>'.'<td>'."fgh".'</td>'.'<td>'."dfgdfg".'</td>'.'<td>'."AUTPK2806P".'</td>'.'<td>'."rakesh.sharma@vvfltd.com".'</td>'.'<td>'."HR/Security/Admin".'</td>'.'<td>'."Corporate Shared Services".'</td>'.'<td>'."Ramadhi Sen".'</td>'.'<td>'."Baddi".'</td>'.'</tr>';*/
							
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']." ".$kpi_data1[$i]['Emp_mname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['Department'].'<td>'.$kpi_data1[$i]['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['Present_address'].'</td>'.'<td>'.$kpi_data1[$i]['state'].'</td>'.'<td>'.$kpi_data1[$i]['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['company_location'].'</td>'.'</tr>';
						}
					}	



					else if($value[1] == 'Pending')
					{
if(isset($kpi_data1[$i]['0']['Reporting_officer1_id']))
{
$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($kpi_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);
}
						
if($kpi_data1[$i]['0']['Employee_id'] != '')
{
						//print_r($apr_name);die();
						if($content == '')
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}	
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
}
					}	
					else if($value[1] == 'Approved')
					{
						$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($kpi_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);
if($kpi_data1[$i]['0']['Employee_id'] != '')
{
if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']." ".$kpi_data1[$i]['0']['Emp_mname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Gender'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Designation'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Department'].'<td>'.$kpi_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$kpi_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$kpi_data1[$i]['0']['DOB'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Present_address'].'<td>'.$kpi_data1[$i]['0']['state'].'</td>'.'<td>'.$kpi_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$kpi_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$kpi_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
}
						
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();
			
		
		
		
	}

	function actionstatusgetIdp()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];
		$employee_data=new EmployeeForm;
		$emp_all_data = $employee_data->get_distinct_emplist();

		$all_emp= implode(', ', $this->actionarray_column($emp_all_data, 'Employee_id'));
		$data=$all_emp;
		$array = $all_emp;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1 = "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);
		
		$idp=new IDPForm;
		$idp_sub=array();
		$idp_sub=$idp->get_emp_idp_submitted($array,$year1);
		$apr_name = '';

		/*if ($value[1] == 'Submitted') {	
		for($i=0;$i<count($idp_sub);$i++){
				$Employee_id=$idp_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($idp_sub[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);

				// $where = 'where Email_id = :Email_id';
				// $list = array('Email_id');
				// $data = array($idp_data[$i]['0']['Reporting_officer1_id']);
				// $apr_name = $emplo$tot_count=array();
		$tot_count=$employee_data->getdata();
		if ($value[1] == 'Submitted') {	
                       $idp_data = $tot_count;
                      // print_r(count($idp_data));die();
			
		}yee_data->get_employee_data($where,$data,$list);
				
			}
			
		}*/
		$tot_count=array();
		$tot_count=$employee_data->getdata();
		if ($value[1] == 'Submitted') {	
                       $idp_data = $tot_count;
                      // print_r(count($idp_data));die();
			
		}
		else if($value[1] == 'Pending')
		{
			$idp_pending=array();
			$idp_pending=$idp->get_emp_idp_staus('Pending',$array,$year1);


			for ($i=0; $i < count($idp_pending); $i++) { 			
				
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($idp_pending[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);

				// $where = 'where Email_id = :Email_id';
				// $list = array('Email_id');
				// $data = array($idp_data[$i]['0']['Reporting_officer1_id']);
				// $apr_name = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Approved')
		{  
			$idp_approved=array();
			$idp_approved=$idp->get_emp_idp_staus('Approved',$array,$year1);
			for($i=0;$i<count($idp_approved);$i++){
				$Employee_id=$idp_approved[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($idp_approved[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);

				// $where = 'where Email_id = :Email_id';
				// $list = array('Email_id');
				// $data = array($idp_data[$i]['0']['Reporting_officer1_id']);
				// $apr_name = $employee_data->get_employee_data($where,$data,$list);
				
			}

		}
		else if($value[1] == 'Pendingemp')
		{

		$emp_not_idp= implode(', ', $this->actionarray_column($idp_sub, 'Employee_id'));
		$data=$emp_not_idp;
		$emp_not_sub_idp = $emp_not_idp;
		$emp_not_sub_idp = explode( ',', $emp_not_sub_idp );
		foreach ($emp_not_sub_idp as &$val){
		    $val = "'" . trim($val)."'";
		}
		$emp_not_sub_idp = implode(', ', $emp_not_sub_idp);

		$idp_not_sub=array();
		$idp_not_sub=$employee_data->get_emp_idp_not_submitted($emp_not_sub_idp);

		//print_r($idp_not_sub);die();	

		for($i=0;$i<count($idp_not_sub);$i++){

if($idp_not_sub[$i]['Employee_id']!=""){
				$Employee_id=$idp_not_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($idp_not_sub[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);

				} 

			}
	}

		$content = '';
			if (isset($idp_data) && count($idp_data)>0) {
				for ($i=0; $i < count($idp_data); $i++) { 
						
					//print_r($apr_name);die();
					 if($value[1] == 'Pendingemp'){
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($idp_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
						//print_r($idp_data[$i]['0']['Employee_id']);die();
						if($content == '')
						{

							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}
					else if($value[1] == 'Submitted')
					{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($idp_data[$i]['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
					//print_r($value[1]);die();
						//print_r($kpi_data1);
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							//print_r($apr_name_data);die();
							
							
				
							$content = '<tr>'.'<td>'.$idp_data[$i]['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['Emp_fname']." ".$idp_data[$i]['Emp_mname']."  ".$idp_data[$i]['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['Gender'].'</td>'.'<td>'.$idp_data[$i]['Designation'].'</td>'.'<td>'.$idp_data[$i]['Department'].'<td>'.$idp_data[$i]['Cadre'].'</td>'.'<td>'.$idp_data[$i]['joining_date'].'</td>'.'<td>'.$idp_data[$i]['DOB'].'</td>'.'<td>'.$idp_data[$i]['Present_address'].'</td>'.'<td>'.$idp_data[$i]['state'].'</td>'.'<td>'.$idp_data[$i]['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['Email_id'].'</td>'.'<td>'.$idp_data[$i]['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['company_location'].'</td>'.'</tr>';
							
							/*'<tr>'.'<td>'."10001832".'</td>'.'<td>'."Rakesh S.N.  Sharma".'</td>'.'<td>'."M".'</td>'.'<td>'."Assistant General Manager".'</td>'.'<td>'."Human Resources".'<td>'."MMC".'</td>'.'<td>'."18/10/2010".'</td>'.'<td>'."20/09/1973".'</td>'.'<td>'."fgh".'</td>'.'<td>'."dfgdfg".'</td>'.'<td>'."AUTPK2806P".'</td>'.'<td>'."rakesh.sharma@vvfltd.com".'</td>'.'<td>'."HR/Security/Admin".'</td>'.'<td>'."Corporate Shared Services".'</td>'.'<td>'."Ramadhi Sen".'</td>'.'<td>'."Baddi".'</td>'.'</tr>';*/
							
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['Emp_fname']." ".$idp_data[$i]['Emp_mname']."  ".$idp_data[$i]['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['Gender'].'</td>'.'<td>'.$idp_data[$i]['Designation'].'</td>'.'<td>'.$idp_data[$i]['Department'].'<td>'.$idp_data[$i]['Cadre'].'</td>'.'<td>'.$idp_data[$i]['joining_date'].'</td>'.'<td>'.$idp_data[$i]['DOB'].'</td>'.'<td>'.$idp_data[$i]['Present_address'].'</td>'.'<td>'.$idp_data[$i]['state'].'</td>'.'<td>'.$idp_data[$i]['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['Email_id'].'</td>'.'<td>'.$idp_data[$i]['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['company_location'].'</td>'.'</tr>';
						}
					}	
					else if($value[1] == 'Pending')
					{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($idp_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
						
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}	
					else if($value[1] == 'Approved')
					{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($idp_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
						if($idp_data[$i]['0']['Employee_id'] != '')
{
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']." ".$idp_data[$i]['0']['Emp_mname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$idp_data[$i]['0']['Department'].'<td>'.$idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$idp_data[$i]['0']['Present_address'].'<td>'.$idp_data[$i]['0']['state'].'</td>'.'<td>'.$idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}					
				}
}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();
	}


function actionstatq1rev()
	{
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];

		$status = $_POST['status'];
		$value = explode('_',$status);
		$model = new KpiAutoSaveForm;
		$employee_data =new EmployeeForm;
		$q1_sub = $model->get_q1_review_submitted($year1);
		//print_r($q1_sub);die();
		$apr_name = '';
		$tot_count=array();
		$tot_count=$employee_data->getdata();
		if ($value[1] == 'Submitted') {	
                       $q1_data1 = $tot_count;
                      //print_r($kpi_data1);die();
			
		}
		else if($value[1] == 'Pending')
		{
			$q1_pending=$model->get_q1_pending_rev($year1);
			for ($i=0; $i < count($q1_pending); $i++) { 
			
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($q1_pending[$i]['Employee_id']);
				$q1_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
                                if(isset($q1_data1[$i]['0']['Reporting_officer1_id']) && $q1_data1[$i]['0']['Reporting_officer1_id'] != '')
{
                $where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($q1_data1[$i]['0']['Reporting_officer1_id']);
				$apr_name = $employee_data->get_employee_data($where,$data,$list);
}
				
				
			}
			//print_r($q1_data1);die();
		}
		else if($value[1] == 'Approved')
		{  
			$q1_appr=$model->get_disinct_q1_appr($year1);
			//print_r($kpi_appr);die();
            $kpi_appr = array_filter($q1_appr);
			//print_r($q1_appr);die();
			for($i=0;$i<count($kpi_appr);$i++){
                if($q1_appr[$i] != "" && count($q1_appr[$i])>0){
				$Employee_id=$q1_appr[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($q1_appr[$i]['Employee_id']);
				$q1_data1[$i] = $employee_data->get_employee_data($where,$data,$list);

				$where = 'where Email_id = :Email_id AND pms_status != :pms_status' ;
				$list = array('Email_id' , 'pms_status');
				$data = array($q1_data1[$i]['0']['Reporting_officer1_id'] , 'Inactive');
				$apr_name = $employee_data->get_employee_data($where,$data,$list);
				}
			}
        //print_r($q1_data1);die();

		}
		
				
		else if($value[1] == 'Pendingemp')
		{
			$model = new KpiAutoSaveForm;
			$emp_list = $model->get_q1_review_submitted($year1);

		//	print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			$emp_id_array = '';
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}
		$q1_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status != "Inactive" and Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();
		
		}
		$content = '';
			if (isset($q1_data1) && count($q1_data1)>0) {

				for ($i=0; $i < count($q1_data1); $i++) { 	

					if ($value[1] == 'Pendingemp') {
				$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($q1_data1[$i]['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);				
						
						//print_r($apr_name);die();
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
						$content = '<tr>'.'<td>'.$q1_data1[$i]['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['Emp_fname']." ".$q1_data1[$i]['Emp_mname']."  ".$q1_data1[$i]['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['Gender'].'</td>'.'<td>'.$q1_data1[$i]['Designation'].'</td>'.'<td>'.$q1_data1[$i]['Department'].'</td><td>'.$q1_data1[$i]['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['DOB'].'</td>'.'<td>'.$q1_data1[$i]['Present_address'].'</td><td>'.$q1_data1[$i]['state'].'</td>'.'<td>'.$q1_data1[$i]['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$q1_data1[$i]['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['Emp_fname']." ".$q1_data1[$i]['Emp_mname']."  ".$q1_data1[$i]['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['Gender'].'</td>'.'<td>'.$q1_data1[$i]['Designation'].'</td>'.'<td>'.$q1_data1[$i]['Department'].'</td><td>'.$q1_data1[$i]['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['DOB'].'</td>'.'<td>'.$q1_data1[$i]['Present_address'].'</td><td>'.$q1_data1[$i]['state'].'</td>'.'<td>'.$q1_data1[$i]['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['company_location'].'</td>'.'</tr>';
						}
					}
					/*else if($value[1] == 'Submitted')
					{
$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($q1_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);	
						//print_r($q1_data1);die();
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}	*/

                                         else if($value[1] == 'Submitted')
					{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($q1_data1[$i]['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
					//print_r($value[1]);die();
						//print_r($q1_data1);
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							//print_r($apr_name_data);die();
							
							
				
							$content = '<tr>'.'<td>'.$q1_data1[$i]['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['Emp_fname']." ".$q1_data1[$i]['Emp_mname']."  ".$q1_data1[$i]['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['Gender'].'</td>'.'<td>'.$q1_data1[$i]['Designation'].'</td>'.'<td>'.$q1_data1[$i]['Department'].'<td>'.$q1_data1[$i]['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['DOB'].'</td>'.'<td>'.$q1_data1[$i]['Present_address'].'</td>'.'<td>'.$q1_data1[$i]['state'].'</td>'.'<td>'.$q1_data1[$i]['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['company_location'].'</td>'.'</tr>';
							
							/*'<tr>'.'<td>'."10001832".'</td>'.'<td>'."Rakesh S.N.  Sharma".'</td>'.'<td>'."M".'</td>'.'<td>'."Assistant General Manager".'</td>'.'<td>'."Human Resources".'<td>'."MMC".'</td>'.'<td>'."18/10/2010".'</td>'.'<td>'."20/09/1973".'</td>'.'<td>'."fgh".'</td>'.'<td>'."dfgdfg".'</td>'.'<td>'."AUTPK2806P".'</td>'.'<td>'."rakesh.sharma@vvfltd.com".'</td>'.'<td>'."HR/Security/Admin".'</td>'.'<td>'."Corporate Shared Services".'</td>'.'<td>'."Ramadhi Sen".'</td>'.'<td>'."Baddi".'</td>'.'</tr>';*/
							
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$q1_data1[$i]['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['Emp_fname']." ".$q1_data1[$i]['Emp_mname']."  ".$q1_data1[$i]['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['Gender'].'</td>'.'<td>'.$q1_data1[$i]['Designation'].'</td>'.'<td>'.$q1_data1[$i]['Department'].'<td>'.$q1_data1[$i]['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['DOB'].'</td>'.'<td>'.$q1_data1[$i]['Present_address'].'</td>'.'<td>'.$q1_data1[$i]['state'].'</td>'.'<td>'.$q1_data1[$i]['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['company_location'].'</td>'.'</tr>';
						}
					}	



					else if($value[1] == 'Pending')
					{
if(isset($q1_data1[$i]['0']['Reporting_officer1_id']))
{
$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($q1_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);
}
						
if($q1_data1[$i]['0']['Employee_id'] != '')
{
						//print_r($apr_name);die();
						if($content == '')
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}	
							$content = '<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
}
					}	
					else if($value[1] == 'Approved')
					{
						$where = 'where Email_id = :Email_id';
						$list = array('Email_id');
						$data = array($q1_data1[$i]['0']['Reporting_officer1_id']);
						$apr_name = $employee_data->get_employee_data($where,$data,$list);
if($q1_data1[$i]['0']['Employee_id'] != '')
{
if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$q1_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['Emp_fname']." ".$q1_data1[$i]['0']['Emp_mname']."  ".$q1_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$q1_data1[$i]['0']['Gender'].'</td>'.'<td>'.$q1_data1[$i]['0']['Designation'].'</td>'.'<td>'.$q1_data1[$i]['0']['Department'].'<td>'.$q1_data1[$i]['0']['Cadre'].'</td>'.'<td>'.$q1_data1[$i]['0']['joining_date'].'</td>'.'<td>'.$q1_data1[$i]['0']['DOB'].'</td>'.'<td>'.$q1_data1[$i]['0']['Present_address'].'<td>'.$q1_data1[$i]['0']['state'].'</td>'.'<td>'.$q1_data1[$i]['0']['PAN_number'].'</td>'.'<td>'.$q1_data1[$i]['0']['Email_id'].'</td>'.'<td>'.$q1_data1[$i]['0']['cluster_name'].'</td>'.'<td>'.$q1_data1[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$q1_data1[$i]['0']['company_location'].'</td>'.'</tr>';
						}
}
						
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();
			
		
		
		
	}


	function actionstatusgetMid(){
		$status = $_POST['status'];
		$value = explode('_',$status);
		$model=new KpiAutoSaveForm();
		$employee_data= new EmployeeForm();
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];
		$apr_name = '';
		$mid_sub=$model->get_mid_review_submitted($year1);
		
		if ($value[1] == 'Submitted') {	
			
				for($i=0;$i<count($mid_sub);$i++){
					
				$Employee_id=$mid_sub[$i]['Employee_id'];
				
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				//print_r($list);die();
				$data = array($mid_sub[$i]['Employee_id']);
				
				$mid_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				//print_r($mid_data);die();
			}
				
		}
		else if($value[1] == 'Pendingemp')
		{
			
			$emp_list = $model->get_mid_review_submitted($year1);
			//print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			$emp_id_array = '';
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}
		$mid_data = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('pms_status != "Inactive" and Employee_id NOT IN ('.$emp_id_array.') ')->queryAll();
				
		
		}
		$content = '';
			if (isset($mid_data) && count($mid_data)>0) {

				for ($i=0; $i < count($mid_data); $i++) { 
					$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($mid_data[$i]['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);					
					if ($value[1] == 'Pendingemp') {
						if($mid_data[$i]['Employee_id'] != '')
{
						if($content == '')
						{
						$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}	
						
						$content = '<tr>'.'<td>'.$mid_data[$i]['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['Emp_fname']." ".$mid_data[$i]['Emp_mname']."  ".$mid_data[$i]['Emp_lname'].'</td>'.'<td>'.$mid_data[$i]['Gender'].'</td>'.'<td>'.$mid_data[$i]['Designation'].'</td>'.'<td>'.$mid_data[$i]['Department'].'<td>'.$mid_data[$i]['Cadre'].'</td>'.'<td>'.$mid_data[$i]['joining_date'].'</td>'.'<td>'.$mid_data[$i]['DOB'].'</td>'.'<td>'.$mid_data[$i]['Present_address'].'<td>'.$mid_data[$i]['state'].'</td>'.'<td>'.$mid_data[$i]['PAN_number'].'</td>'.'<td>'.$mid_data[$i]['Email_id'].'</td>'.'<td>'.$mid_data[$i]['cluster_name'].'</td>'.'<td>'.$mid_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_data[$i]['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$mid_data[$i]['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['Emp_fname']." ".$mid_data[$i]['Emp_mname']."  ".$mid_data[$i]['Emp_lname'].'</td>'.'<td>'.$mid_data[$i]['Gender'].'</td>'.'<td>'.$mid_data[$i]['Designation'].'</td>'.'<td>'.$mid_data[$i]['Department'].'<td>'.$mid_data[$i]['Cadre'].'</td>'.'<td>'.$mid_data[$i]['joining_date'].'</td>'.'<td>'.$mid_data[$i]['DOB'].'</td>'.'<td>'.$mid_data[$i]['Present_address'].'<td>'.$mid_data[$i]['state'].'</td>'.'<td>'.$mid_data[$i]['PAN_number'].'</td>'.'<td>'.$mid_data[$i]['Email_id'].'</td>'.'<td>'.$mid_data[$i]['cluster_name'].'</td>'.'<td>'.$mid_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_data[$i]['company_location'].'</td>'.'</tr>';
						}
}
					}
					else if($value[1] == 'Submitted')
					{
                                        $where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($mid_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);
						//print_r($mid_data);die();
                                        if($mid_data[$i]['0']['Employee_id'] != '')
{
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']." ".$mid_data[$i]['0']['Emp_mname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_data[$i]['0']['Department'].'<td>'.$mid_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_data[$i]['0']['Present_address'].'<td>'.$mid_data[$i]['0']['state'].'</td>'.'<td>'.$mid_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']." ".$mid_data[$i]['0']['Emp_mname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_data[$i]['0']['Department'].'<td>'.$mid_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_data[$i]['0']['Present_address'].'<td>'.$mid_data[$i]['0']['state'].'</td>'.'<td>'.$mid_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}	
									
}				
}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();
	}


	function actiongetMidIdpStat(){
		$status = $_POST['status'];
		$value = explode('_',$status);
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];
		$employee_data=new EmployeeForm;
		$emp_all_data = $employee_data->get_distinct_emplist();

		$all_emp= implode(', ', $this->actionarray_column($emp_all_data, 'Employee_id'));
		$data=$all_emp;
		$array = $all_emp;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1 = "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);
		
		$idp=new IDPForm;
		$mid_idp_sub=array();
		$mid_idp_sub=$idp->get_emp_mididp_submitted($array,$year1);
		//print_r($mid_idp_sub);die();
		if ($value[1] == 'Submitted') {	
			
				for($i=0;$i<count($mid_idp_sub);$i++){
					
				$Employee_id=$mid_idp_sub[$i]['Employee_id'];
				
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				
				$data = array($mid_idp_sub[$i]['Employee_id']);
				
				$mid_idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}//print_r($mid_idp_data);die();
				
		}
		else if($value[1] == 'Pendingemp')
		{
			$mid_idp_not_sub=array();
			$emp_not_mididp= implode(', ', $this->actionarray_column($mid_idp_sub, 'Employee_id'));
			$data=$emp_not_mididp;
			$emp_not_subMid_idp = $emp_not_mididp;
			$emp_not_subMid_idp = explode( ',', $emp_not_subMid_idp );
			foreach ($emp_not_subMid_idp as &$value1){
			    $value1 = "'" . trim($value1)."'";
			}
			$emp_not_subMid_idp = implode(', ', $emp_not_subMid_idp);
			$mid_idp_not_sub=$employee_data->get_midEmp_idp_not_submitted($emp_not_subMid_idp);
			//print_r($mid_idp_not_sub);die();
			for($i=0;$i<count($mid_idp_not_sub);$i++){
					
				$Employee_id=$mid_idp_not_sub[$i]['Employee_id'];
				
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				
				$data = array($mid_idp_not_sub[$i]['Employee_id']);
				$mid_idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
			//print_r($mid_idp_data);die();
		
				
		
		}
		$content = '';
			if (isset($mid_idp_data) && count($mid_idp_data)>0) {

				for ($i=0; $i < count($mid_idp_data); $i++) { 

if($mid_idp_data[$i] != "" && count($mid_idp_data[$i])>0){
					$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($mid_idp_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);					
					if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$mid_idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Emp_fname']." ".$mid_idp_data[$i]['0']['Emp_mname']."  ".$mid_idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Department'].'<td>'.$mid_idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Present_address'].'<td>'.$mid_idp_data[$i]['0']['state'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$mid_idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Emp_fname']." ".$mid_idp_data[$i]['0']['Emp_mname']."  ".$mid_idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Department'].'<td>'.$mid_idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Present_address'].'<td>'.$mid_idp_data[$i]['0']['state'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
					}
					else if($value[1] == 'Submitted')
					{
						//print_r($kpi_data1);
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = '<tr>'.'<td>'.$mid_idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Emp_fname']." ".$mid_idp_data[$i]['0']['Emp_mname']."  ".$mid_idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Department'].'<td>'.$mid_idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Present_address'].'<td>'.$mid_idp_data[$i]['0']['state'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname'])) {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
							$content = $content.'<tr>'.'<td>'.$mid_idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Emp_fname']." ".$mid_idp_data[$i]['0']['Emp_mname']."  ".$mid_idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Gender'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Designation'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Department'].'<td>'.$mid_idp_data[$i]['0']['Cadre'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['joining_date'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['DOB'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Present_address'].'<td>'.$mid_idp_data[$i]['0']['state'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['PAN_number'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['Email_id'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$mid_idp_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$mid_idp_data[$i]['0']['company_location'].'</td>'.'</tr>';
						}
						}
					}
}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();

	}

function actiongetYearEndStat(){
		$status = $_POST['status'];
		//echo $status;die();
		$value=explode('_', $status);
		//print_r($value);die();
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		//print_r($settings_data);die();
		$year1=$settings_data['0']['setting_type'];
		$yearEnd=new Yearend_reviewbForm;
		$employee_data=new EmployeeForm;
		$yearEnd_data=array();
		$where='where year_end_reviewb_status =:year_end_reviewb_status AND goal_set_year = :goal_set_year ';
		$list = array('year_end_reviewb_status','goal_set_year');
		$data = array('1',$year1);
		$yearEnd_sub=$yearEnd->get_kpi_list($where,$data,$list);
//print_r($yearEnd_sub);die();
                $tot_count=array();
		$tot_count=$employee_data->getdata();
//print_r(count($tot_count));die();
if($value[1]=="allsub"){

		$where='where year_end_reviewb_status =:year_end_reviewb_status AND goal_set_year = :goal_set_year ';
		$list = array('year_end_reviewb_status','goal_set_year');
		$data = array('1',$year1);
		$yearEnd_rev = $yearEnd->get_kpi_list($where,$data,$list);
		//print_r($yearEnd_rev);die();
		for($i=0;$i<count($yearEnd_rev);$i++){
					
				$Employee_id=$yearEnd_rev[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($Employee_id);
				$yearEnd_data[$i] = $employee_data->get_employee_data($where,$data,$list);

	}
//	print_r($yearEnd_data);die();

}




		else if($value[1]=="Pending"){
		$where='where year_end_reviewb_status =:year_end_reviewb_status AND year_end_b_appr_status != :year_end_b_appr_status AND goal_set_year = :goal_set_year';
		$list = array('year_end_reviewb_status','year_end_b_appr_status','goal_set_year');
		$data = array('1','1',$year1);
		$yearEnd_rev = $yearEnd->get_kpi_list($where,$data,$list);
		//print_r($yearEnd_rev);die();
		for($i=0;$i<count($yearEnd_rev);$i++){
					
				$Employee_id=$yearEnd_rev[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($Employee_id);
				$yearEnd_data[$i] = $employee_data->get_employee_data($where,$data,$list);

	}
//	print_r($yearEnd_data);die();

}
	else if($value[1]=="Approved"){
		$where='where year_end_b_appr_status = :year_end_b_appr_status AND goal_set_year = :goal_set_year';
		$list = array('year_end_b_appr_status','goal_set_year');
		$data = array('1',$year1);
		$yearEnd_rev = $yearEnd->get_kpi_list($where,$data,$list);
		//print_r($yearEnd_rev);die();
		for($i=0;$i<count($yearEnd_rev);$i++){
					
				$Employee_id=$yearEnd_rev[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($Employee_id);
				$yearEnd_data[$i] = $employee_data->get_employee_data($where,$data,$list);

	}
//print_r($yearEnd_data);die();

}
else if ($value[1] == 'Submitted1') {	
                       $yearEnd_data = $tot_count;
                      //print_r($yearEnd_data);die();
			
		}



else if($value[1] == 'Pendingemp')
		{
			
			$yearEnd_not_sub=array();
			$emp_not_yearEnd= implode(', ', $this->actionarray_column($yearEnd_sub, 'Employee_id'));
			//print_r($emp_not_yearEnd);die();
			$data=$emp_not_yearEnd;
			//print_r($data);die();
			$emp_not_subyearEnd = $emp_not_yearEnd;
			$emp_not_subyearEnd = explode( ',', $emp_not_subyearEnd );
			//print_r($emp_not_subyearEnd);die();
			foreach ($emp_not_subyearEnd as &$value1){
			    $value1 = "'" . trim($value1)."'";
			}
			$emp_not_subyearEnd = implode(', ', $emp_not_subyearEnd);
			$yearEnd_not_sub=$employee_data->get_yearEnd_not_submitted($emp_not_subyearEnd);
			
			for($i=0;$i<count($yearEnd_not_sub);$i++){
				if($yearEnd_not_sub[$i] != "" && count($yearEnd_not_sub[$i])>0){
				$Employee_id=$yearEnd_not_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id ';
				$list = array('Employee_id');
				$data = array($yearEnd_not_sub[$i]['Employee_id']);
				$yearEnd_data[$i] = $employee_data->get_employee_data($where,$data,$list);}
				
			}
			//echo count($yearEnd_data);die();
		
		}

$content = '';
			if (isset($yearEnd_data) && count($yearEnd_data)>0) {

				for ($i=0; $i < count($yearEnd_data); $i++) { 
if($yearEnd_data[$i] != "" && count($yearEnd_data[$i])>0){

					$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['0']['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);	



					$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['0']['cluster_appraiser']);
					$clusterapr_name = $employee_data->get_employee_data($where,$data,$list);	
                                    
                                        $where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['0']['bu_head_email']);
					$bu_head_name = $employee_data->get_employee_data($where,$data,$list);	
                                
                         if($yearEnd_data[$i]['0']['Reporting_officer2_id'] != '')
{
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['0']['Reporting_officer2_id']);
					$reporting2_head_name = $employee_data->get_employee_data($where,$data,$list);	
}               


//print_r($yearEnd_data[$i]['0']['Reporting_officer2_id']);die();

if($value[1]=="allsub"){

						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='') {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}
                                                        else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname'])) {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='' ) {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}

else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer2_id'] != '') {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}



}			
					else if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='') {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}
                                                        else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname'])) {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='' ) {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}

else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer2_id'] != '') {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}


					}
					else if($value[1] == 'Approved')
					{
						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='') {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}
                                                        else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname'])) {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='' ) {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}

else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer2_id'] != '') {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}

						}

else if($value[1] == 'Submitted1')
				{
	
$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['Reporting_officer1_id']);
					$apr_name = $employee_data->get_employee_data($where,$data,$list);	
//print_r($apr_name);die();

					$where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['cluster_appraiser']);
					$clusterapr_name = $employee_data->get_employee_data($where,$data,$list);	
                                    
                                        $where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['bu_head_email']);
					$bu_head_name = $employee_data->get_employee_data($where,$data,$list);	
                                
                                        $where = 'where Email_id = :Email_id';
					$list = array('Email_id');
					$data = array($yearEnd_data[$i]['Reporting_officer2_id']);
					$reporting2_head_name = $employee_data->get_employee_data($where,$data,$list);	

						if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['cluster_appraiser']!='') {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}
                                                        else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname'])) {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['Emp_fname']." ".$yearEnd_data[$i]['Emp_mname']."  ".$yearEnd_data[$i]['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['Department'].'<td>'.$yearEnd_data[$i]['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['cluster_appraiser']!='' ) {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}

else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['Reporting_officer2_id'] != '') {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['Emp_fname']." ".$yearEnd_data[$i]['Emp_mname']."  ".$yearEnd_data[$i]['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['Department'].'<td>'.$yearEnd_data[$i]['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						}

						else if($value[1] == 'Pending')
					{
						
if($content == '')
						{	
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='') {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}
                                                        else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname'])) {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						else
						{
							$apr_name_data = '';
							if (isset($apr_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer1_id']!='') {
								$apr_name_data = $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname'];
							}
else{
$apr_name_data="";
}
							if (isset($clusterapr_name['0']['Emp_fname'])  && $yearEnd_data[$i]['0']['cluster_appraiser']!='' ) {
								$clusterapr_name_data = $clusterapr_name['0']['Emp_fname']." ".$clusterapr_name['0']['Emp_lname'];
							}
else{
$clusterapr_name_data="";
}
                                                        if (isset($bu_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['bu_head_email'] != '') {
								$bu_head_name_data = $bu_head_name['0']['Emp_fname']." ".$bu_head_name['0']['Emp_lname'];
							}

else{
                                                      $bu_head_name_data="";
}
                                                        if (isset($reporting2_head_name['0']['Emp_fname']) && $yearEnd_data[$i]['0']['Reporting_officer2_id'] != '') {
								$reporting2_head_name_data = $reporting2_head_name['0']['Emp_fname']." ".$reporting2_head_name['0']['Emp_lname'];
							}
else{
$reporting2_head_name_data="";
}
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']." ".$yearEnd_data[$i]['0']['Emp_mname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Designation'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Department'].'<td>'.$yearEnd_data[$i]['0']['Cadre'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['joining_date'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['cluster_name'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['BU'].'</td>'.'<td>'.$apr_name_data.'</td>'.'<td>'.$yearEnd_data[$i]['0']['company_location'].'</td>'.'<td>'.$bu_head_name_data.'</td>'.'<td>'.$reporting2_head_name_data.'</td>'.'<td>'.$clusterapr_name_data.'</td>'.'</tr>';
						}
						}

}
					}
			}
			else
			{
				$content = "No Record Found";
			}
			print_r($content);die();
			

}
}