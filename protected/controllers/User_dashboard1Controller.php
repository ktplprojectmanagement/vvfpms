<?php

class User_dashboard1Controller extends Controller
{
	
	public function actionarray_column(array $input, $columnKey, $indexKey = null) {
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


	    //print_r(Yii::app()->user->getState('financial_year_check'));die();
		$set_dates=new SettingsForm;$Reporting_officer1_id='';

		$set_dates=$set_dates->get_all_data();
		$Employee_id = Yii::app()->user->getState("Employee_id");
		
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);          
		//print_r($settings_data);die();
		$curr_year=date("Y");
		$team_kra_appr=array();
		$Employee_id = Yii::app()->user->getState("Employee_id");
		$kra_info=new KpiAutoSaveForm;
		$emp_data = new EmployeeForm;
		$cluster = new ClusterForm;
		if (isset($settings_data['0']['setting_type'])) {
			$year1=$settings_data['0']['setting_type'];
		}
		
		$idp=new IDPForm;
		$where='where Employee_id = :Employee_id && goal_set_year = :goal_set_year';
		$list=array('Employee_id','goal_set_year');
		$data=array($Employee_id,$year1);
		$emp_sub_idp=$idp->get_idp_data($where,$data,$list);
		//print_r($emp_sub_idp);die();
		$emp_sub=array()		;
		$where='where Employee_id = :Employee_id && goal_set_year = :goal_set_year and KRA_status_flag >:KRA_status_flag';
		$list=array('Employee_id','goal_set_year','KRA_status_flag');
		$data=array($Employee_id,Yii::app()->user->getState('financial_year_check'),'0');
		$emp_sub=$kra_info->get_emp_id_list($where,$data,$list);
		

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
		//print_r($emp_data_desc);die();
		if (isset($emp_data_desc['0']['Email_id'])) 
		{
			$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
		}
		
		$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
		$list= array('Reporting_officer1_id');
		$data= array($Reporting_officer1_id);
		$team_members=$emp_data->get_employee_data($where,$data,$list);
		$team=$emp_data->get_employee_data($where,$data,$list);

		$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));

		$data=$team_members;
		$array = $team_members;
		$array = explode( ',', $array );
		foreach ($array as &$value){
		    $value = "'" . trim($value)."'";
		}
		$array = implode(', ', $array);

		
		//team submitted idp
		$team_sub_idp=array();
		$team_sub_idp=$idp->get_emp_idp_submitted($array,$year1);
		//team submitted idp

		//team idp pending
		$team_idp_pending=array();
		$status="Pending";
		$team_idp_pending=$idp->get_emp_idp_staus($status,$array,$year1);
		//team idp pending
		
		//team_idp_approved
		$team_idp_aprroved=array();
		$status="Approved";
		$team_idp_aprroved=$idp->get_emp_idp_staus($status,$array,$year1);
		//team_idp_approved end

		
		//team submitted idp mid yaer
		$team_sub_mididp=array();
		$team_sub_mididp=$idp->get_emp_mididp_submitted($array,$year1);
		//print_r($team_sub_mididp);die();
		//team submitted idp mid yaer

		//team not submitted idp mid year

		//changes to be made here	
		$team_notsub_mididp=array();
		//$team_notsub_mididp=$idp->get_emp_mididp_notsubmitted($array,$year1);

		$emp_list1 = $idp->get_emp_mididp_submitted($array,$year1);
		
			$emp_id_array1 = '';
$array1="'".$Employee_id."'";
		$yearEnd_idp_stat=$idp->get_emp_yearEndidp_submitted($array1,$year1);
		
		$yearEnd=New Yearend_reviewbForm;
		$yearEndStat=$yearEnd->get_yearEnd_submitted_team($array1,$year1);
$team_sub_yearEnd=array();
		$team_sub_yearEnd=$yearEnd->get_yearEnd_submitted_team($array,$year1);

		$team_pendingAppr_yearEnd=array();
		$team_pendingAppr_yearEnd=$yearEnd->get_pending_yearEnd_team($array,$year1);

		$team_Approved_yearEnd=array();
		$team_Approved_yearEnd=$yearEnd->get_Approved_yearEnd_team($array,$year1);

		$yearEndIDP=new IDPForm;

		$team_sub_yearEndIDP=array();
		$team_sub_yearEndIDP=$yearEndIDP->get_yearEndIDP_submitted_team($array,$year1);
		
		$team_pendingAppr_yearEndIDP=array();
		$team_pendingAppr_yearEndIDP=$yearEndIDP->get_pending_yearEndIDP_team($array,$year1);
		
		$team_Approved_yearEndIDP=array();
		$team_Approved_yearEndIDP=$yearEndIDP->get_approved_yearEndIDP_team($array,$year1);
			for ($m=0; $m < count($emp_list1); $m++) { 

				if($emp_id_array1 == '')
				{
					$emp_id_array1= '"'.$emp_list1[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array1 = $emp_id_array1.','.'"'.$emp_list1[$m]['Employee_id'].'"';
				}
				
			}
		//print_r($emp_id_array);die();
			
			$idp_mid_not_sub=$emp_data->get_mid_review_notbmitted_team($array,$emp_id_array1);
			//print_r($mid_not_sub);die();
				for($i=0;$i<count($idp_mid_not_sub);$i++){
					
				$Employee_id=$idp_mid_not_sub[$i]['Employee_id'];
				//print_r($array);die();
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				
				$data = array($idp_mid_not_sub[$i]['Employee_id']);
				
				$team_notsub_mididp[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}


			//changes to be made here
		$my_mid=array();
		$my_mid=$kra_info->get_mid_review_submitted();
		//$my_emp_id = 
		// print_r($my_mid);die();
		$mid_flag = 0;
		for ($i=0; $i < count($my_mid); $i++) {
			if ($my_mid[$i]['Employee_id'] == $Employee_id) {
			 	$mid_flag = 1;
			 } 
		}
		//my mid review status
		//my year idp status
		$array1="'".$Employee_id."'";
		$mid_idp_stat=$idp->get_emp_mididp_submitted($array1,$year1);
		//print_r($mid_idp_stat);die();
		//my year idp status


		$year1=$settings_data['0']['setting_type'];
		$set_goal_sub=$kra_info->get_team_members_kra_sub($array,$year1);
		$employee_data =new EmployeeForm;
		
		//print_r($array1);die();
		$is_my_gaol_pending=array();
		$array1="'".Yii::app()->user->getState("Employee_id")."'";
		$is_my_gaol_pending=$kra_info->get_pending_goal_team($array1,$year1);
	//	print_r($array1);die();

		$team_pend_appr=array();
		$team_pend_appr=$kra_info->get_pending_goal_team($array,$year1);

		$cluster_head = '';
				
		if (isset($emp_data_desc) && count($emp_data_desc)>0  && isset($emp_data_desc['0']['cluster_appraiser'])) {
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data_desc['0']['cluster_appraiser']);
			$cluster_head =$emp_data->get_employee_data($where,$data,$list);
		}
		
		$Employee_id = Yii::app()->user->getState("Employee_id");
		if (isset($emp_data_desc) && count($emp_data_desc)>0 && isset($emp_data_desc['0']['cluster_name'])) {
			$where = 'where cluster_name = :cluster_name';
			$list = array('cluster_name');
			$data = array($emp_data_desc['0']['cluster_name']);
			$emp_data_desc =$cluster->get_cluster_data($where,$data,$list,'department');
		}
		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'));
		$kra_data=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && KRA_Status=:KRA_Status ';
		$list = array('Employee_id','goal_set_year','KRA_Status');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),"Pending");
		$kra_data_pending=$kra_info->get_kpi_data($where,$data,$list);


		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && KRA_status=:KRA_status ';
		$list = array('Employee_id','goal_set_year','KRA_status');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),"Approved");
		$kra_data_appr=$kra_info->get_kpi_data($where,$data,$list);

	
		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && mid_KRA_final_status!=:mid_KRA_final_status ';
		$list = array('Employee_id','goal_set_year','mid_KRA_final_status');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),"");
		$kra_mid_sub=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && mid_KRA_final_status=:mid_KRA_final_status ';
		$list = array('Employee_id','goal_set_year','mid_KRA_final_status');
		$data = array($Employee_id,Yii::app()->user->getState('financial_year_check'),"Pending");
		$kra_mid_pending=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id  && mid_KRA_status !=:mid_KRA_status && goal_set_year = :goal_set_year ';
		$list = array('Employee_id','mid_KRA_status','goal_set_year');
		$data = array($Employee_id,"",Yii::app()->user->getState('financial_year_check'));
		$kra_mid_appr =$kra_info->get_kpi_data($where,$data,$list);
		
		
		$team_set=array();
		$team_set=$kra_info->get_team_members_kra_sub($array,$year1);
		//print_r($year1);die();
		$team_kra_appr=$kra_info->get_disinct_kra_appr_team($array,$year1);
			
		$mid_sub=array();
		$mid_kra_team_sub=array();
		$mid_kra_team_sub=$kra_info->get_mid_review_submitted_team($array,$year1);
			



			$emp_list = $kra_info->get_mid_review_submitted_team($array,$year1);
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
			$mid_not_sub=array();
			$mid_team_not_sub=array();
			$mid_not_sub=$emp_data->get_mid_review_notbmitted_team($array,$emp_id_array);
			for($i=0;$i<count($mid_not_sub);$i++){
				$Employee_id=$mid_not_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($mid_not_sub[$i]['Employee_id']);
				$mid_team_not_sub[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}			
				
		$my_activity=new NotificationsForm;
		$where ='where Employee_id = :Employee_id order by id desc';
		$list=array('Employee_id');
		$data=array($Employee_id);
		$my_recent_act=$my_activity->get_notifications($where,$data,$list);
		// echo "<pre>";
		// print_r($kra_mid_sub);die();
		// echo "</pre>";

	 // 	$this->render('//site/script_file');	
		// $this->render('//site/header_view_layout');
		$this->render('//site/user_dashboard1',
		array(

			'emp_sub'=>$emp_sub,
			'is_my_gaol_pending'=>$is_my_gaol_pending,
			'kra_data'=>$kra_data,
			'kra_data_pending'=>$kra_data_pending,
			'kra_data_appr'=>$kra_data_appr,
			'kra_mid_sub'=>$kra_mid_sub,
			'kra_mid_pending'=>$kra_mid_pending,
			'kra_mid_appr'=>$kra_mid_appr,
			'my_recent_act'=>$my_recent_act,
			'emp_data_desc'=>$emp_data_desc,
			'cluster_head'=>$cluster_head,
			'selected_option'=>'my_profile',
			'set_dates'=>$set_dates,
			'team'=>$team,
			'team_set'=>$team_set,
			'team_pend_appr'=>$team_pend_appr,
			'team_kra_appr'=>$team_kra_appr,
			'mid_kra_team_sub'=>$mid_kra_team_sub,
			'mid_team_not_sub'=>$mid_team_not_sub,
			'emp_sub_idp'=>$emp_sub_idp,
			'team_sub_idp'=>$team_sub_idp,
			'team_idp_pending'=>$team_idp_pending,
			'team_idp_aprroved'=>$team_idp_aprroved,
			'team_sub_mididp'=>$team_sub_mididp,
			'team_notsub_mididp'=>$team_notsub_mididp,
			'mid_flag'=>$mid_flag,
			'mid_idp_stat'=>$mid_idp_stat,
'yearEnd_idp_stat'=>$yearEnd_idp_stat,
			'yearEndStat'=>$yearEndStat,
			'team_sub_yearEnd'=>$team_sub_yearEnd,
			'team_pendingAppr_yearEnd'=>$team_pendingAppr_yearEnd,
			'team_Approved_yearEnd'=>$team_Approved_yearEnd,
			'team_sub_yearEndIDP'=>$team_sub_yearEndIDP,
			'team_pendingAppr_yearEndIDP'=>$team_pendingAppr_yearEndIDP,
			'team_Approved_yearEndIDP'=>$team_Approved_yearEndIDP
			));
		$this->render('//site/footer_view_layout');	
	}
	

	


		function actionteamSetgoalstatus()
	{
		//echo "hi";die();
		$status = $_POST['status'];
		$value = explode('_',$status);
		//print_r($value);die();
		$Employee_id = Yii::app()->user->getState("Employee_id");
		$kra_info=new KpiAutoSaveForm;
		$emp_data=new EmployeeForm;
		$employee_data=new EmployeeForm;
		$curr_year=date("Y");
		$kra_all_data=$kra_info->getdata();
//print_r($kra_all_data);die();
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
		



		$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
		$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
		$list= array('Reporting_officer1_id');
		$data= array($Reporting_officer1_id);
		$team_members=$emp_data->get_employee_data($where,$data,$list);
		$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
		$data=$team_members;
		$array = $team_members;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1= "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);
		$year1=Yii::app()->user->getState('financial_year_check');
		$set_goal_sub=$kra_info->get_team_members_kra_sub($array,$year1);
//print_r($set_goal_sub);die();
		if ($value[1] =='Submitted') {	
		for($i=0;$i<count($set_goal_sub);$i++){
				$Employee_id=$set_goal_sub[$i]['Employee_id'] ;
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($set_goal_sub[$i]['Employee_id']);
				$kra_data[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pending')
		{
		     	$kra_team_pend=$kra_info->get_pending_goal_team($array,$year1);
		     	for ($i=0; $i < count($kra_team_pend); $i++) { 
				$Employee_id=$kra_team_pend[$i]['Employee_id'];
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kra_team_pend[$i]['Employee_id']);
				$kra_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}

		}
		else if($value[1] == 'Approved')
		{
		    //echo "hi";die();
				$kpi_appr=$kra_info->get_disinct_kra_appr_team($array,$year1);
				//print_r($array);die();
				for($i=0;$i<count($kpi_appr);$i++){
				$Employee_id=$kpi_appr[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_appr[$i]['Employee_id']);
				$kra_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		
		$content = '';
			if (isset($kra_data) && count($kra_data)>0) {
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($kra_data); $i++) { 
					
						if($value[1]=="Submitted")
						{
							if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
						}


					}
					else if($value[1]=="Pending")
						{

						if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>	'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
						}


					}
					else if($value[1]=="Approved")
						{

						if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Approved".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$kra_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$kra_data[$i]['0']['Emp_fname']."  ".$kra_data[$i]['0']['Emp_lname'].'</td>'.
							'<td>'."Approved".'</td>'.'<td>'.CHtml::textField('emp_id',$kra_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data'))

								.'</td>'.'</tr>';
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

function actionteamIdpstatus()
	{
		
		$status = $_POST['status'];
		$value = explode('_',$status);
		
		$Employee_id = Yii::app()->user->getState("Employee_id");
		$idp=new IDPForm;
		$emp_data=new EmployeeForm;
		$employee_data=new EmployeeForm;
		
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
		

		$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
		$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
		$list= array('Reporting_officer1_id');
		$data= array($Reporting_officer1_id);
		$team_members=$emp_data->get_employee_data($where,$data,$list);
		$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
		$data=$team_members;
		$array = $team_members;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1= "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);
		$year1=$settings_data['0']['setting_type'];

		
		$team_sub_idp=array();
		$team_sub_idp=$idp->get_emp_idp_submitted($array,$year1);
		if ($value[1] =='Submitted') {	
		for($i=0;$i<count($team_sub_idp);$i++){
				$Employee_id=$team_sub_idp[$i]['Employee_id'] ;
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_sub_idp[$i]['Employee_id']);
				$idp_data[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}//print_r($idp_data);die();
		}
		else if($value[1] == 'Pending')
		{
				$team_idp_pending=array();
				$status="Pending";
				$team_idp_pending=$idp->get_emp_idp_staus($status,$array,$year1);
		       	for ($i=0; $i < count($team_idp_pending); $i++) { 
				$Employee_id=$team_idp_pending[$i]['Employee_id'];
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_idp_pending[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}//print_r($idp_data);die();

		}
		else if($value[1] == 'Approved')
		{
				$team_idp_aprroved=array();
				$status="Approved";
				$team_idp_aprroved=$idp->get_emp_idp_staus($status,$array,$year1);
				//$kpi_appr=$kra_info->get_disinct_kra_appr_team($array,$year1);
				for($i=0;$i<count($team_idp_aprroved);$i++){
				$Employee_id=$team_idp_aprroved[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_idp_aprroved[$i]['Employee_id']);
				$idp_data[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}//print_r($idp_data);die();
		}
		
		$content = '';
			if (isset($idp_data) && count($idp_data)>0) {
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($idp_data); $i++) { 
					
						if($value[1]=="Submitted")
						{
						if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
						}


					}
					else if($value[1]=="Pending")
						{

						if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
						}


					}
					else if($value[1]=="Approved")
						{

						if($content == '')
						{
							
							// print_r($base_url);die();
							
							$content = '<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Approved".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
						}
						else
						{	
							$content = $content.'<tr>'.'<td>'.$idp_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_data[$i]['0']['Emp_fname']."  ".$idp_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Approved".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data1'))

								.'</td>'.'</tr>';
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
	

function actionteamMidstatusget()
	{
		//echo "hi";die();
		$status = $_POST['status'];
		$value = explode('_',$status);
		//print_r($value);die();
		$Employee_id = Yii::app()->user->getState("Employee_id");
		//echo $Employee_id;die();
		$kra_info=new KpiAutoSaveForm;
		$emp_data=new EmployeeForm;
		$curr_year=date("Y");
		
		$settings_data=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $settings_data->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
		

		$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
		$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
		$list= array('Reporting_officer1_id');
		$data= array($Reporting_officer1_id);
		$team_members=$emp_data->get_employee_data($where,$data,$list);
		$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
	

		$data=$team_members;
		$array = $team_members;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1= "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);

	
		
		$mid_sub=$kra_info->get_mid_review_submitted_team($array,$year1);
		//print_r($mid_sub);die();
		if ($value[1] == 'Submitted') {	
			//print_r($mid_sub);die();
				for($i=0;$i<count($mid_sub);$i++){
					
				$Employee_id=$mid_sub[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($mid_sub[$i]['Employee_id']);
				$mid_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
				
		}
		else if ($value[1] == 'Pending') {	
			
			$emp_list = $kra_info->get_mid_review_submitted_team($array,$year1);
		
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
	
			
			$mid_not_sub=$emp_data->get_mid_review_notbmitted_team($array,$emp_id_array);
			//print_r($mid_not_sub);die();
				for($i=0;$i<count($mid_not_sub);$i++){
					
				$Employee_id=$mid_not_sub[$i]['Employee_id'];
				//print_r($array);die();
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				
				$data = array($mid_not_sub[$i]['Employee_id']);
				
				$mid_data[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}
			
		}
		
		
		$content = '';
			if (isset($mid_data) && count($mid_data)>0) {
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($mid_data); $i++) { 

					if($value[1] == 'Submitted')
					{
						//print_r($kpi_data1);
						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data2'))

								.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data2'))

								.'</td>'.'</tr>';
						}
						
					}
					else if($value[1] == 'Pending')
					{
						
						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data2'))

								.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$mid_data[$i]['0']['Emp_fname']."  ".$mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data2'))

								.'</td>'.'</tr>';
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

function actionteamMidIdpstatusget()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);

		$Employee_id = Yii::app()->user->getState("Employee_id");
		$emp_data=new EmployeeForm;
		$curr_year=date("Y");
		$idp= new IDPForm;
		$settings_data=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $settings_data->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
		

		$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
		$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
		$list= array('Reporting_officer1_id');
		$data= array($Reporting_officer1_id);
		$team_members=$emp_data->get_employee_data($where,$data,$list);
		$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
	

		$data=$team_members;
		$array = $team_members;
		$array = explode( ',', $array );
		foreach ($array as &$value1){
		    $value1= "'" . trim($value1)."'";
		}
		$array = implode(', ', $array);

		$team_sub_mididp=array();
		$team_sub_mididp=$idp->get_emp_mididp_submitted($array,$year1);
		
		if ($value[1] == 'Submitted') {	
				for($i=0;$i<count($team_sub_mididp);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_sub_mididp[$i]['Employee_id']);
				$idp_mid_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}//print_r($idp_mid_data);die();
				
		}
		//changes to be made here	


else if ($value[1] == 'Pending') {	
			
			$emp_list = $idp->get_emp_mididp_submitted($array,$year1);
		
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
		//print_r($emp_id_array);die();
			
			$mid_not_sub=$emp_data->get_mid_review_notbmitted_team($array,$emp_id_array);
			//print_r($mid_not_sub);die();
				for($i=0;$i<count($mid_not_sub);$i++){
					
				$Employee_id=$mid_not_sub[$i]['Employee_id'];
				//print_r($array);die();
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				
				$data = array($mid_not_sub[$i]['Employee_id']);
				
				$idp_mid_data[$i] = $emp_data->get_employee_data($where,$data,$list);
				
			}//print_r($array);die();
			}
		//print_r($idp_mid_data);die();
		

//changes to be made here	


		
		
		$content = '';
			if (isset($idp_mid_data) && count($idp_mid_data)>0) {
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($idp_mid_data); $i++) { 

					if($value[1] == 'Submitted')
					{
						//print_r($idp_mid_data);die();
						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$idp_mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_mid_data[$i]['0']['Emp_fname']."  ".$idp_mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data3'))

								.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$idp_mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_mid_data[$i]['0']['Emp_fname']."  ".$idp_mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data3'))

								.'</td>'.'</tr>';
						}
						
					}
					else if($value[1] == 'Pending')
					{
						
						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$idp_mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_mid_data[$i]['0']['Emp_fname']."  ".$idp_mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data3'))

								.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$idp_mid_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$idp_mid_data[$i]['0']['Emp_fname']."  ".$idp_mid_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.CHtml::textField('emp_id',$idp_mid_data[$i]['0']['Employee_id'],array('style'=>'display:none')).
                                                                  CHtml::Button('Check',array('style'=>'background-color:#337AB7;color:white','class'=>'get_list_data3'))

								.'</td>'.'</tr>';
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

		function actionTeamYearEndstatus(){
			$status = $_POST['status'];
			$value = explode('_',$status);
			$Employee_id = Yii::app()->user->getState("Employee_id");

			$emp_data=new EmployeeForm;
			$settings_data=new SettingsForm;
			$yearEnd=new Yearend_reviewbForm;
			$curr_year=date("Y");

			$where = 'where setting_content = :setting_content and year = :year';
			$list = array('setting_content','year');
			$data = array('PMS_display_format',date('Y'));             
			$settings_data = $settings_data->get_setting_data($where,$data,$list);

			$year1=$settings_data['0']['setting_type'];

			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
			
			$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
			$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
			$list= array('Reporting_officer1_id');
			$data= array($Reporting_officer1_id);
			$team_members=$emp_data->get_employee_data($where,$data,$list);
			$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
		

			$data=$team_members;
			$array = $team_members;
			$array = explode( ',', $array );
			foreach ($array as &$value1){
			    $value1= "'" . trim($value1)."'";
			}
			$array = implode(', ', $array);
			//print_r($value1);die();
			$team_sub_yearEnd=array();
			$team_sub_yearEnd=$yearEnd->get_yearEnd_submitted_team($array,$year1);

			$team_pendingAppr_yearEnd=array();
			$team_pendingAppr_yearEnd=$yearEnd->get_pending_yearEnd_team($array,$year1);

			$team_Approved_yearEnd=array();
			$team_Approved_yearEnd=$yearEnd->get_Approved_yearEnd_team($array,$year1);
			
			if ($value[1] == 'Submitted') {	
				for($i=0;$i<count($team_sub_yearEnd);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_sub_yearEnd[$i]['Employee_id']);
				$yearEnd_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
//print_r($yearEnd_data);die();
		}

			else if($value[1] == 'Pending'){
				//print_r($team_pendingAppr_yearEnd);die();
				for($i=0;$i<count($team_pendingAppr_yearEnd);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_pendingAppr_yearEnd[$i]['Employee_id']);
				$yearEnd_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
//print_r($yearEnd_data);die();
			
		}
				
		else if($value[1] == 'Approved'){
				//kl,.print_r($team_pendingAppr_yearEnd);die();
				for($i=0;$i<count($team_Approved_yearEnd);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_Approved_yearEnd[$i]['Employee_id']);
				$yearEnd_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
			
		}


		$content = '';
			if (isset($yearEnd_data) && count($yearEnd_data)>0) {
				//print_r($yearEnd_data);die();
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($yearEnd_data); $i++) { 

					if($value[1] == 'Submitted')
					{
						//print_r($yearEnd_data);die();
						if($content == '')
						{	
							// $content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.'<input type="button" value="back" class="btn" onclick="document.location.href="google.com";"/>'.'</td>'.'</tr>';
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1"  style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						
					}
					else if($value[1] == 'Pending')
					{
						
						if($content == '')
						{	
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
					}	
					else if($value[1] == 'Approved')
					{
						
						if($content == '')
						{	
							$content = '<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Approved".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEnd_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEnd_data[$i]['0']['Emp_fname']."  ".$yearEnd_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Approved".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEnd_data[$i]['0']['Employee_id'].'"><input type="button" value="Check" class=" btn1" style="background-color:#337AB7;width:56px;color:#fff" /></a>'.'</td>'.'</tr>';
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


			function actionTeamYearEndsIDPtatus(){
			$status = $_POST['status'];
			$value = explode('_',$status);
			$Employee_id = Yii::app()->user->getState("Employee_id");

			$emp_data=new EmployeeForm;
			$settings_data=new SettingsForm;
			$yearEndIDP=new IDPForm;
			$curr_year=date("Y");

			$where = 'where setting_content = :setting_content and year = :year';
			$list = array('setting_content','year');
			$data = array('PMS_display_format',date('Y'));             
			$settings_data = $settings_data->get_setting_data($where,$data,$list);

			$year1=$settings_data['0']['setting_type'];

			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
			
			$yearEndIDP_data=array();

			$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
			$where= 'where Reporting_officer1_id=:Reporting_officer1_id';
			$list= array('Reporting_officer1_id');
			$data= array($Reporting_officer1_id);
			$team_members=$emp_data->get_employee_data($where,$data,$list);
			$team_members= implode(', ', $this->actionarray_column($team_members, 'Employee_id'));
		
			//print_r($value[1]);die();
			$data=$team_members;
			$array = $team_members;
			$array = explode( ',', $array );
			foreach ($array as &$value1){
			    $value1= "'" . trim($value1)."'";
			}
			$array = implode(', ', $array);
			//print_r($array);die();
			$team_sub_yearEndIDP=array();
			$team_sub_yearEndIDP=$yearEndIDP->get_yearEndIDP_submitted_team($array,$year1);
			//print_r($team_sub_yearEndIDP);die();
			$team_pendingAppr_yearEndIDP=array();
			$team_pendingAppr_yearEndIDP=$yearEndIDP->get_pending_yearEndIDP_team($array,$year1);
			//print_r($team_pendingAppr_yearEndIDP);die();
			$team_Approved_yearEndIDP=array();
			$team_Approved_yearEndIDP=$yearEndIDP->get_approved_yearEndIDP_team($array,$year1);
			//print_r($team_Approved_yearEndIDP);die();
			if ($value[1] == 'Submitted') {	
				for($i=0;$i<count($team_sub_yearEndIDP);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_sub_yearEndIDP[$i]['Employee_id']);
				$yearEndIDP_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}

		}

			else if($value[1] == 'Pending'){
				//print_r($team_pendingAppr_yearEndIDP);die();
				for($i=0;$i<count($team_pendingAppr_yearEndIDP);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_pendingAppr_yearEndIDP['0']['Employee_id']);
				$yearEndIDP_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
			//print_r($yearEndIDP_data);die();
		}
				
		else if($value[1] == 'Approved'){
				
				for($i=0;$i<count($team_Approved_yearEndIDP);$i++){
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($team_Approved_yearEndIDP['0']['Employee_id']);
				$yearEndIDP_data[$i] = $emp_data->get_employee_data($where,$data,$list);
			
			}
			
		}


		$content = '';
		//print_r($yearEndIDP_data);die();
			if (isset($yearEndIDP_data) && count($yearEndIDP_data)>0) {
				
				$folder_path = Yii::app()->request->baseUrl;
				for ($i=0; $i < count($yearEndIDP_data); $i++) { 

					if($value[1] == 'Submitted')
					{
						//print_r($yearEnd_data);die();
						if($content == '')
						{	
							$content = '<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Submitted".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						
					}
					else if($value[1] == 'Pending')
					{
						
						if($content == '')
						{	
							$content = '<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
						}
					}	
					else if($value[1] == 'Approved')
					{
						
						if($content == '')
						{	
							$content = '<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff" /></a>'.'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$yearEndIDP_data[$i]['0']['Employee_id'].'</td>'.'<td>'.$yearEndIDP_data[$i]['0']['Emp_fname']."  ".$yearEndIDP_data[$i]['0']['Emp_lname'].'</td>'.'<td>'."Pending".'</td>'.'<td>'.'<a href="Year_endreview/appraiser_end_review/Employee_id/'.$yearEndIDP_data[$i]['0']['Emp_fname'].'"><input type="button" value="Check" class="btn btn1" style="background-color:#337AB7;width:56px;color:#fff"/></a>'.'</td>'.'</tr>';
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
?>
