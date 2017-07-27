<?php

class MidreviewController extends Controller
{
	function actionIndex()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and mid_KRA_status = :mid_KRA_status';
		$list = array('appraisal_id1','mid_KRA_status');
		$data = array($id,'Pending');
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$cnt = 0;$employee_data = '';
		//print_r($kpi_data);die();
		foreach ($kpi_data as $row) {
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($row['Employee_id']);
			$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
			$cnt++;
		}

		$mid_review = '1';
		//print_r($employee_data);die();
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'mid_review'=>$mid_review));
		$this->render('//site/footer_view');
	}

// 	function actionupdategoal()
// 	{
// 		//print_r($_POST['KPI_id']);
// 		$data = array(
// 			'mid_review' => $_POST['mid_review'],
// 			'review_comments' => $_POST['review_comments'],	
// 			'mid_review_date' => date('Y-m-d'),
// 		);
// //print_r($data);die();
// 		$update = Yii::app()->db->createCommand()->update('KPI_structure',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
// 		//print_r($_POST['KPI_id']);die();
// 		if ($update) {
// 			//echo "Update Done";
// 			$this->actionsendmail($_POST['KPI_id']);
// 		}
// 		// else
// 		// {
// 		// 	echo "error occured";
// 		// }
// 	}	

	function actionmidupdategoal()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		
		$final_status = 'Pending';
		$all_status = explode(';',$_POST['mid_KRA_status']);
		for ($i=0; $i < count($all_status); $i++) { 
			if($all_status[$i] == 'Approved')
			{
				$final_status = 'Approved';
			}
			else
			{
				$final_status = 'Pending';
			}
		}
		
		$data = array(
			'appraiser_comment' => $_POST['appraiser_comment'],	
			'mid_review_date' => date('Y-m-d'),
			'mid_KRA_status' => $final_status
		);
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		//print_r($employee_data);die();
		$update = Yii::app()->db->createCommand()->update('KPI_structure',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		//print_r($update);die();
		if ($update) {
			$this->actionsendmail($_POST['KPI_id']);
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
		//print_r($model->attributes);
	}

	function actionget_idp()
	{
		$model=new IDPForm;
		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_idp_data($where,$data1,$list);
		echo json_encode($kpi_data);die();
		//print_r($model->attributes);
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
		print_r($update);die();
		//print_r($model->attributes);
	}

	function actionsetbyemployee()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$mid_review = '1';
		$mid_review_by_employee = '1';
		//print_r($kpi_data);die();
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/employee_mid_review',array('kpi_data'=>$kpi_data,'mid_review'=>$mid_review,'mid_review_by_employee'=>$mid_review_by_employee));
		$this->render('//site/footer_view');
	}

	function actionemployee_mid_review()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;		
		
		$data = array(
			'employee_comment' => $_POST['review_comments'],	
			'mid_review_by_employee_date' => date('Y-m-d'),	
			'mid_KRA_status' => 'Pending',		
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

		//print_r($employee_data);die();
		$update = Yii::app()->db->createCommand()->update('KPI_structure',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		//print_r($update);die();
		if ($update) {

			$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id']);
		}
		else
		{
			echo "error occured";
		}
	}

	function actiongoalnotification($mail_id = NULL)
    {
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	//print_r($mail_id);die();
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->setBody('Please Check appraisal list.', 'text/html');
		  $message->subject = 'Appraisal Request Approve';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($mail_id);
		  //$message->addCC($appriaser_2);  
		  $message->from = $Employee_id;
		  $notification_data->notification_type = 'Goal Approval';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }
    }

	function actionsendmail($KPI_id = NULL)
    {
    	$model=new KPIStructureForm;
    	$emploee_data =new EmployeeForm;
    	$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data = array($KPI_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		//print_r($kpi_data['0']['Employee_id']);die();
		/////////////////////////////////////////////////////////
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
    	
    	/////////////////////////////////////////////////////////
    // 	$appriaser_1 = '';
    // 	if(Yii::app()->user->getState("appriaser_1"))
    // 	{
    // 		$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    // 	}
    // 	print_r($appriaser_1);die();
    	//print_r($employee_data['0']['Email_id']);die();
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->setBody('Please Check appraisal list.', 'text/html');
		  $message->subject = 'Mid Year Review';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo('mssadafule@gmail.com');
		  $message->addCC('mssadafule@gmail.com');  
		  $message->from = 'mssadafule@gmail.com';
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Mid Year Review Updation Done";die();
		  }
    }
}