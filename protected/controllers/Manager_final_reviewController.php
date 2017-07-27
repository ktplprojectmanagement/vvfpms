<?php

class Manager_final_reviewController extends Controller
{
	
	public function actionIndex()
	{
		$model = new Yearend_reviewbForm;
		$settings_data = new SettingsForm;
		$where1 = 'where setting_content = :setting_content and year = :year';
		$list1 = array('setting_content','year');
		$data2 = array('min_kra_required',date('Y'));
		$kra_data = $settings_data->get_setting_data($where1,$data2,$list1);

		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/partb_review',array('kra_data' => $kra_data));
		$this->render('//site/footer_view_layout');		
		
	}

	function actiongoalnotification($mail_id = NULL)
    {
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->setBody('Please Check appraisal list.', 'text/html');
		  $message->subject = 'Appraisal Request Approve';
		  $message->addTo($mail_id);
		 $message->addCC('mssadafule@gmail.com');  
		  $message->from = $Employee_id;
		  	$where1 = 'where Email_id = :Email_id';
			$list1 = array('Email_id');
			$data2 = array($mail_id);
			$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
		  $notification_data->notification_type = 'Year end Review(B) submmited.';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }
    }

	function actionsave_data()
	{
		$model =new NormalizeRatingForm;
		
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['Employee_id']);
		$normalize_data = $model->get_setting_data($where1,$data2,$list1);

		if (count($normalize_data)>0) {
			$data = array(
				'KRA_score' => $_POST['KRA_score'],
				'Score_comment' => $_POST['Score_comment'], 
				'Tota_score' => $_POST['Tota_score'],
				'performance_rating' => $_POST['performance_rating'],
				'career_planning' => $_POST['career_planning']
			);
			//print_r($_POST['Employee_id']);die();
			
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
			if($update!=0)
			{
				$this->actiongoalnotification($normalize_data['0']['Reporting_officer1_id']);
			}
			else
			{
				print_r("error occured");die();
			}
		}
		else
		{
			$model->Employee_id = $_POST['Employee_id'];
			$model->Reporting_officer1_id = $_POST['Reporting_officer1_id'];
			$model->KRA_score = $_POST['KRA_score'];
			$model->Score_comment = $_POST['Score_comment'];
			$model->Tota_score = $_POST['Tota_score'];
			$model->performance_rating = $_POST['performance_rating'];	
			$model->KRA_id = $_POST['KRA_id'];
			if ($model->validate()) {
				if ($model->save()) {
					print_r("Success");die();
				}
			}
			else
			{
				print_r("error occured");die();
			}
		}
	}
}