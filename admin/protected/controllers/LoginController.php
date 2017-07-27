<?php

class LoginController extends Controller
{
	
	public function actionIndex()
	{
		//print_r("adasds");die();
		$model = new LoginForm;	
		//$this->render('//site/session_check_view');

		if (Yii::app()->user->getState("Employee_id")!='') {	
			//$this->redirect(Yii::app()->createUrl('Login/dashboard'));
			//$this->redirect(Yii::app()->createUrl('User_dashboard'));
                        //$this->render('//site/admin_login',array('model'=>$model));
                         $this->actiongetprofile();
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
		
		
	}

       public function actionUser()
	{
		$model = new LoginForm;	
		$this->render('//site/session_check_view');

		$this->render('//site/admin_login',array('model'=>$model));
		
		
	}

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
		public function actiongetprofile()
	{


	
		$set_dates=new SettingsForm;

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
		$year1=$settings_data['0']['setting_type'];
		$idp=new IDPForm;

		$where='where Employee_id = :Employee_id && goal_set_year = :goal_set_year';
		$list=array('Employee_id','goal_set_year');
		$data=array($Employee_id,$year1);
		$emp_sub_idp=$idp->get_idp_data($where,$data,$list);
		//print_r($emp_sub_idp);die();
		$emp_sub=array()		;
		$where='where Employee_id = :Employee_id && goal_set_year = :goal_set_year and KRA_status_flag =:KRA_status_flag';
		$list=array('Employee_id','goal_set_year','KRA_status_flag');
		$data=array($Employee_id,$year1,'1');
		$emp_sub=$kra_info->get_emp_id_list($where,$data,$list);
		

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data_desc =$emp_data->get_employee_data($where,$data,$list);
	
		$Reporting_officer1_id=$emp_data_desc['0']['Email_id'];
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
		
		$is_my_gaol_pending=array();
		$array1="'".$Employee_id."'";
		$is_my_gaol_pending=$kra_info->get_pending_goal_team($array1,$year1);
		

		$team_pend_appr=array();
		$team_pend_appr=$kra_info->get_pending_goal_team($array,$year1);


				
		if (isset($emp_data_desc) && count($emp_data_desc)>0) {
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($emp_data_desc['0']['cluster_appraiser']);
			$cluster_head =$emp_data->get_employee_data($where,$data,$list);
		}
		
		$Employee_id = Yii::app()->user->getState("Employee_id");
		if (isset($emp_data_desc) && count($emp_data_desc)>0) {
			$where = 'where cluster_name = :cluster_name';
			$list = array('cluster_name');
			$data = array($emp_data_desc['0']['cluster_name']);
			$emp_data_desc =$cluster->get_cluster_data($where,$data,$list,'department');
		}
		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year';
		$list = array('Employee_id','goal_set_year');
		$data = array($Employee_id,$settings_data['0']['setting_type']);
		$kra_data=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && KRA_Status=:KRA_Status ';
		$list = array('Employee_id','goal_set_year','KRA_Status');
		$data = array($Employee_id,$settings_data['0']['setting_type'],"Pending");
		$kra_data_pending=$kra_info->get_kpi_data($where,$data,$list);


		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && KRA_status=:KRA_status ';
		$list = array('Employee_id','goal_set_year','KRA_status');
		$data = array($Employee_id,$settings_data['0']['setting_type'],"Approved");
		$kra_data_appr=$kra_info->get_kpi_data($where,$data,$list);

	
		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && mid_KRA_final_status!=:mid_KRA_final_status ';
		$list = array('Employee_id','goal_set_year','mid_KRA_final_status');
		$data = array($Employee_id,$settings_data['0']['setting_type'],"");
		$kra_mid_sub=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id && goal_set_year = :goal_set_year && mid_KRA_final_status=:mid_KRA_final_status ';
		$list = array('Employee_id','goal_set_year','mid_KRA_final_status');
		$data = array($Employee_id,$settings_data['0']['setting_type'],"Pending");
		$kra_mid_pending=$kra_info->get_kpi_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id  && mid_KRA_status !=:mid_KRA_status && goal_set_year = :goal_set_year ';
		$list = array('Employee_id','mid_KRA_status','goal_set_year');
		$data = array($Employee_id,"",$settings_data['0']['setting_type']);
		$kra_mid_appr =$kra_info->get_kpi_data($where,$data,$list);
		



		
		
		$team_set=array();
		$team_set=$kra_info->get_team_members_kra_sub($array,$year1);
		
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
		// print_r($my_recent_act);die();
		// echo "</pre>";

	 	$this->render('//site/script_file');	
		$this->render('//site/header_view_layout');
		$this->render('//site/user_dashboard',
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
			'mid_idp_stat'=>$mid_idp_stat
			));
		$this->render('//site/footer_view_layout');	
	}


	public function actionreset_link()
	{
		$model = new LoginForm;	
		$this->render('//site/email_link_send',array('model'=>$model));
	}

	function actioncheck_time()
	{
		date_default_timezone_set("Asia/Kolkata");
		$current_time = time();
		$diff = '';
		if (Yii::app()->user->getState("session_current_time")) {
			$diff = $current_time-Yii::app()->user->getState("session_current_time");
		}
		if (Yii::app()->user->getState("session_time") && ($diff>Yii::app()->user->getState("session_time"))) {			
			$data = array(
					'login_flag' => 0, 
					);
			$update = Yii::app()->db->createCommand()->update('login',$data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('role_id','');
			Yii::app()->user->setState('Employee_name','');
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('employee_email','');
			Yii::app()->user->setState('appriaser_1','');
			Yii::app()->user->setState('session_current_time','');
		}
		print_r($diff);
	}
	
	function actionreset_password()
	{
		$model = new LoginForm;	
		$where1 = 'where username = :username';
		$list1 = array('username');
		$data2 = array($_POST['email_id_reset']);
		$employee_data = $model->get_login_data($where1,$data2,$list1);
		if (count($employee_data)>0) {
			$emploee_data1 =new EmployeeForm;
			$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($_POST['email_id_reset']);
			$Email_id_data = $emploee_data1->get_employee_data($where1,$data2,$list1);
	    	$notification_data =new NotificationsForm;
	    	$Employee_id = Yii::app()->user->getState("employee_email");
	    	Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
			  $message->setBody('Please Click on this link to reset password : '.'https://vvf.kritva.in'.Yii::app()->createUrl("index.php/Reset_password/Index",array("employee_id"=>$Email_id_data['0']["Employee_id"])), 'text/html');
			  $message->subject = 'Password Reset';
			  $message->addTo($_POST['email_id_reset']);			
			  $message->from = 'vvf.pms@vvfltd.com';
			  if(Yii::app()->mail->send($message))
			  {
				Yii::app()->user->setState('employee_email',$_POST['email_id_reset']);
                                Yii::app()->user->setState('Employee_id',$Email_id_data['0']['Employee_id']);
			  		echo "Notification Send";die();
           
			  }
		}
		else
		{
			echo "User Not exist in system";die();
		}
	}

	function actionreset_user_password()
	{
		$model = new LoginForm;	
		$where1 = 'where username = :username';
		$list1 = array('username');
		$data2 = array($_POST['email_id_reset']);
		$employee_data = $model->get_login_data($where1,$data2,$list1);
		if (count($employee_data)>0) {
			$emploee_data1 =new EmployeeForm;
			$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($_POST['email_id_reset']);
			$Email_id_data = $emploee_data1->get_employee_data($where1,$data2,$list1);
	    	$notification_data =new NotificationsForm;
	    	$Employee_id = Yii::app()->user->getState("employee_email");
	    	Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
			  $message->setBody('Please Click on this link to reset password : '.'https://vvf.kritva.in'.Yii::app()->createUrl("index.php/Reset_user_password/Index",array("employee_id"=>$Email_id_data['0']["Employee_id"])), 'text/html');
			  $message->subject = 'Password Reset';
			  $message->addTo($_POST['email_id_reset']);			
			  $message->from = 'vvf.pms@vvfltd.com';
			  if(Yii::app()->mail->send($message))
			  {
				Yii::app()->user->setState('employee_email',$_POST['email_id_reset']);
			  		echo "Notification Send";die();
			  }
		}
		else
		{
			echo "User Not exist in system";die();
		}
	}	

	public function actioncheck()
	{
		$model = new LoginForm;
		 session_start();
		
		if (isset($_POST)) {
			$role_id_array = $model->check_role($_POST);
			$role_id_array1 = $model->check_role1($_POST);
			if ($role_id_array != '' && $role_id_array1 != '') {
			$session = Yii::app()->user->getState("employee_email");
			//print_r( $_SESSION['number']);die();

				if (isset($_SESSION['number']) && $_SESSION['number'] == $_POST['username'] && $role_id_array['login_flag'] == 1) {
					echo "already_login";
				}				
				else if(!isset($_SESSION['number']))
				{
					$data = array(
					'login_flag' => 1, 
					);
					$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username and password=:password',array(':username'=>$role_id_array['username'],':password'=>$role_id_array['password']));				
					$result = $model->check_login($_POST);
//print_r($result);die();
					Yii::app()->user->setState('role_id',$role_id_array['role_id']);
					Yii::app()->user->setState('Employee_name',$result['Emp_fname']);
					Yii::app()->user->setState('Employee_id',$result['Employee_id']);
					Yii::app()->user->setState('employee_email',$result['Email_id']);
					Yii::app()->user->setState('appriaser_1',$result['Reporting_officer1_id']);
					$data = array(
						'Employee_id' => $result['Employee_id'], 
					);
					$update = Yii::app()->db->createCommand()->update('login',$data,'username=:username and password=:password',array(':username'=>$role_id_array['username'],':password'=>$role_id_array['password']));
					if( isset( $_SESSION['number'] ) ) {
					      $_SESSION['number'] = $_POST['username'];
					   }else {
					      $_SESSION['number'] = '';
					   }
					date_default_timezone_set("Asia/Kolkata");
					Yii::app()->user->setState('session_time','1800');
					Yii::app()->user->setState('session_current_time',time());
					echo "Valid";
				}
				
			}
			else if($role_id_array != '' && $role_id_array1 == '')
			{
                                Yii::app()->user->setState('Employee_id',$role_id_array['Employee_id']);
                                Yii::app()->user->setState('employee_email',$role_id_array['username']);
				echo "reset_pending";
			}
			else
			{
				echo "invalid";
			}
			
		}
	}

	function actionreport_head()
	{
		
		$reporting_list = new EmployeeForm();
		$department_value =$_POST['department_value'];
		$where = 'where Department = :department_value';
		$list = array('department_value');
		$data = array($department_value);
		$records = $reporting_list->get_employee_data($where,$data,$list);
       	//print_r($records) ;die();                            
		$report_id = array();                                 
           	for ($l=0; $l < count($records); $l++) { 
          	$report_id[$records[$l]['Reporting_officer1_id']]=$records[$l]['Emp_fname']." ".$records[$l]['Emp_lname'];
               
        }
		    	//print_r($report_id) ;  die();

		echo CHtml::activeDropDownList($reporting_list,'Reporting_officer1_id',$report_id,array('class'=>'form-control repoting_officer'));                           
       
	}

	function actioncluster_head()
	{
		$cluster = new ClusterForm;
		$reporting_list = new EmployeeForm();
		$cluster_name = $_POST['cluster_value'];
		 
		$where = 'where cluster_name = :cluster_name';
		$list = array('cluster_name');
		$data = array($cluster_name);
		$records1 = $cluster->get_employee_data($where,$data,$list);
		$Cadre_id = array(); 
                for ($l=0; $l < count($records1); $l++) { 
          	$Cadre_id[$records1[$l]['cluster_appraiser']]=$records1[$l]['clusterhead_name'];
              
       		}
                                        
		                               
        echo CHtml::activeDropDownList($cluster,'cluster_appraiser',$Cadre_id,array('class'=>'form-control cluster_appraiser'));
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
		
		$selected_option = 'PMS';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view',array('notication_data'=>$notifications,'notifications_count'=>$notifications_count,'employee_data'=>$employee_data,'selected_option'=>$selected_option));
		$this->render('//site/employee_profile',array('employee_data'=>$employee_data,'model'=>$model,'Reporting_officer_name'=>$Reporting_officer_name));
		$this->render('//site/footer_view');
		
	}

	function actionemployee_profile($Employee_id = null)
	{
		$model=new EmployeeForm;
		$reporting_list = new ClusterForm();
                
		$notification_data=new NotificationsForm;
		$id = $Employee_id;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($id);
		$employee_data = $model->get_employee_data($where,$data,$list);
		//print_r($employee_data);die();
		$appriaser_1 = $employee_data['0']['Reporting_officer1_id'];
		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array($appriaser_1);
		$Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
		$Reporting_officer_name = '';
		if (isset($Reporting_officer_data['0']['headname'])) {
			$Reporting_officer_name = $Reporting_officer_data['0']['headname'];
		}
		//print_r($Reporting_officer_name);die();
		
		$selected_option = 'PMS';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/admin_header_view',array('employee_data'=>$employee_data,'selected_option'=>$selected_option));
		$this->render('//site/employee_profile',array('employee_data'=>$employee_data,'model'=>$model,'Reporting_officer_name'=>$Reporting_officer_name));
		$this->render('//site/admin_footer_view');
		
	}

	public function actiondashboard()
	{
		$model=new KpiAutoSaveForm;
		$kra_data=new KRAStructureForm;
		$notification_data=new NotificationsForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");
		
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

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($id);
		$notification = $notification_data->get_notifications($where1,$data2,$list1);

		$kpi_auto = new KpiAutoSaveForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_auto = $kpi_auto->get_kpi_data($where,$data,$list);
		//print_r($kpi_auto);die();	
		$emploee_data =new EmployeeForm;
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);	

		$report =new EmployeeForm;
		$Reporting_officer1_id = $employee_data[0]['Reporting_officer1_id'];
		$where = 'where Email_id =:Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array($Reporting_officer1_id);
		$report = $report->get_employee_data($where,$data,$list);

		$Department = $employee_data[0]['Department'];
		$where = 'where Department = :Department';
		$list = array('Department');
		$data = array($Department);
		$dept1 = $emploee_data->get_employee_data($where,$data,$list);

		$set_dates=new SettingsForm;
		$set_dates=$set_dates->get_all_data();

		$yerB = new Yearend_reviewbForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$yerB = $yerB->get_employee_data($where,$data,$list);
		
		
		$selected_option = 'Dashboard';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('notication_data'=>$notifications,'notifications_count'=>$notifications_count,'selected_option'=>$selected_option));	
		$this->render('//site/user_profile',array('employee_data' => $employee_data,'report'=>$report,'dept1'=>$dept1,'kpi'=>$kpi_auto,'yerB'=>$yerB,'set_dates'=>$set_dates));
		$this->render('//site/footer_view_layout');
	}

	function actionUpdateEmp_profile()
	{
		$model = new EmployeeForm;
			$data=array(

				'Employee_id'=>$_POST['Employee_id'],
				'Employee_atd_code'=>$_POST['Employee_atd_code'],
				'Emp_fname'=>$_POST['Emp_fname'],
				'Emp_mname'=>$_POST['Emp_mname'],
				'Emp_lname'=>$_POST['Emp_lname'],
				'DOB'=>$_POST['DOB'],
				'Email_id'=>$_POST['Email_id'],
				'mobile_number'=>$_POST['mobile_number'],
				'PAN_number'=>$_POST['PAN_number'],
				'Designation'=>$_POST['Designation'],
				//'Designation'=>$_POST['Designation'],
				'Cadre'=>$_POST['Cadre'],
				'Gender'=>$_POST['Gender'],
				'Nationality'=>$_POST['Nationality'],
				'Employee_status'=>$_POST['Employee_status'],
				'Present_address'=>$_POST['Present_address'],
				'Permanent_address'=>$_POST['Permanent_address'],
				'Blood_group'=>$_POST['Blood_group'],
				'Department'=>$_POST['Department'],
				'joining_date'=>$_POST['joining_date'],
				'Cadre'=>$_POST['Cadre'],
				'cluster_name'=>$_POST['cluster_name'],
				'Reporting_officer1_id'=>$_POST['Reporting_officer1_id'],
				'cluster_appraiser'=>$_POST['cluster_appraiser'],
				'company_location'=>$_POST['company_location'],
				'BU'=>$_POST['BU'],
				'pms_status'=>$_POST['pms_status'],
'reporting_1_change'=>$_POST['reporting_1_change'],
				'reporting_1_effective_date'=>date('Y-m-d', strtotime($_POST['reporting_1_effective_date'])),
				'reporting_2_change'=>$_POST['reporting_2_change'],
				'reporting_2_effective_date'=>date('Y-m-d', strtotime($_POST['reporting_2_effective_date'])),
				'bu_head_email'=>$_POST['bu_head_email'],
				'plant_head_email'=>$_POST['plant_head_email'],
'retire_date'=>$_POST['retire_date'],
				);
				$model->Employee_id = $_POST['Employee_id'];
				$model->Employee_atd_code = $_POST['Employee_atd_code'];
				$model->Emp_fname = $_POST['Emp_fname'];
				$model->Emp_lname = $_POST['Emp_lname'];
				$model->DOB = $_POST['DOB'];
				$model->joining_date = $_POST['joining_date']; 
				$model->mobile_number = $_POST['mobile_number'];
				$model->PAN_number = $_POST['PAN_number'];
				$model->Email_id = $_POST['Email_id'];
				$model->Present_address = $_POST['Present_address'];
				$model->Department = $_POST['Department'];
				$model->Gender = $_POST['Gender'];
				$model->Nationality = $_POST['Nationality'];
				$model->Designation=$_POST['Designation'];
				$model->Cadre = $_POST['Cadre'];
				$model->Employee_status=$_POST['Employee_status'];
				$model->Present_address = $_POST['Present_address'];
				$model->Permanent_address = $_POST['Permanent_address'];
				$model->cluster_name = $_POST['cluster_name'];
				$model->Reporting_officer1_id = $_POST['Reporting_officer1_id'];
				
				$model->cluster_appraiser =$_POST['cluster_appraiser'];
				$model->company_location=$_POST['company_location'];
				$model->BU=$_POST['BU'];
				$model->pms_status=$_POST['pms_status'];
				//print_r($data);die();	
				if($model->validate())
				{
					
							if($_POST['Department']=='Select')
			        		{
			        			print_r("Please Select Department");die();
			        		}
			        		else if($_POST['Designation']=='Select'){
			        			print_r("Please Select Designation");die();
			        		}
			        		else if($_POST['pms_status']=='Select'){
			        			print_r("Please Select PMS status");die();
			        		}

					$update = Yii::app()->db->createCommand()->update('Employee',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
					$qry=     Yii::app()->db->createCommand()->update('kpi_auto_save', ['appraisal_id1' => $data['Reporting_officer1_id']],'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
					$qry1=	  Yii::app()->db->createCommand()->update('IDP', ['Reporting_officer1_id' => $data['Reporting_officer1_id']],'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
$qry1=	  Yii::app()->db->createCommand()->update('login', ['status' => $_POST['pms_status']],'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
					if ($update!=0) {
						print_r("success");die();

					}

				}
				else
				{
					print_r(json_encode($model->getErrors()));die();
				}
	}

	public function actionadmindashboard()
	{
		$model=new KPIStructureForm;
		$kra_data=new KRAStructureForm;
		$notification_data=new NotificationsForm;
		if (Yii::app()->user->getState("Employee_id")!='') {
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
			
			$selected_option = 'dashboard';
			$this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('notication_data'=>$notifications,'notifications_count'=>$notifications_count,'selected_option'=>$selected_option));
			$this->render('//site/admin_dashboard');
			$this->render('//site/admin_footer_view');
		}
		else
		{
			$model=new LoginForm;
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	function actiondel_Emp_profile(){


		$model = new EmployeeForm;
		$data=array(

				'Employee_id'=>$_POST['Employee_id']
			);
		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('Employee', 'Employee_id=:Employee_id', array(':Employee_id'=>$_POST['Employee_id']));
		if ($query_result) {
			print_r($query_result);
		}
	}

function actionreport_head1()
	{
		
		$reporting_list = new ClusterForm();
		$reporting_list1 = new EmployeeForm();
		$department_value =$_POST['department_value'];
		$where = 'where department = :department';
		$list = array('department');
		$data = array($department_value);
		$records = $reporting_list->get_employee_data($where,$data,$list);
       	             //print_r($records);die();               
		$report_id = array();                                 
           	for ($l=0; $l < count($records); $l++) { 
		
          	$report_id[$records['0']['Reporting_officer1_id']]=$records['0']['headname'];
               
        }
		    	//print_r($report_id) ;  die();

		echo CHtml::activeDropDownList($reporting_list,'cluster_appraiser',$report_id,array('class'=>'form-control repoting_officer'));                           
       
	}

	public function actionemployee_logout()
	{
		$model=new LoginForm;
		$data = array(
					'login_flag' => 0, 
					);
			$update = Yii::app()->db->createCommand()->update('login',$data,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('role_id','');
			Yii::app()->user->setState('Employee_name','');
			Yii::app()->user->setState('Employee_id','');
			Yii::app()->user->setState('employee_email','');
			Yii::app()->user->setState('appriaser_1','');
			Yii::app()->user->setState('session_current_time','');unset($_SESSION['number']);session_destroy();
		return $this->redirect(['index.php/Login']);
	}
	
}
