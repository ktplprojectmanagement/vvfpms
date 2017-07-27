<?php

class CheckmailController extends Controller
{
	
	public function actionIndex()
	{

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

    	$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array('vvf57e264fd8d3ef');
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$mail_id = $employee_data1['0']['Email_id'];
    	//print_r($Employee_id);die();
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
			$data2 = array('vvf57e264fd8d3ef',$settings_data['0']['setting_type']);
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);	
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data2 = array('vvf57e264fd8d3ef',$settings_data1['0']['setting_type']);
				$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
        	} 
		}
		else
		{			
			$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array('vvf57e264fd8d3ef',date('Y'));
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
		}
		for ($i=0; $i < count($kra_data); $i++) { 
			$data = array(
			'KRA_status' => 'Approved',
			);
			$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_data[$i]['KPI_id']));
		}
		
    	//print_r($kra_data);die();
$notification_data->notification_type = 'Updated Goalsheet';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();		 
       if($employee_data['0']['invalid_email'] != '1')
       {
        
		  
       }
       else
       {
          echo "Notification Send";die();
       }
Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
		  $message->view = "goal_set_page";
		  $params = array('mail_data'=>$employee_data,'kpi_data'=>$kra_data,'employee_data1'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'IDP & Goalsheet Approved';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($mail_id);
		  $message->addTo($Employee_id);  		  
		  $message->from = 'pmstest@vvf.kritva.in';
                  $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/Goalsheet_docs/goalsheet_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));
		   $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/IDP_docs/IDP_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));
		  
		//print_r($kra_data);die(); 
		  if(Yii::app()->mail->send($message))
		  {	  		
		  		echo "Notification Send";die();
		  }
	}
}
