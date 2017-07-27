<?php

class SetgoalsController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');		
		$date = date('d/m/Y');
		$date = str_replace('/', '-', $date);

		//echo $date;
		// print_r(strtotime($date*0.69));
		// date('Y-m-d', strtotime($date*0.69));
		// die();
// 		$date = date('d/m/Y');date('Y-m-d', strtotime('-7 days'))
// $date = str_replace('/', '-', $date);
// // echo strtotime($date);
// $begin= strtotime($date);
// $now = time();
// $percent = 1.05;
// // // //$end = strtotime('+2 weeks');
// $strt_date = strtotime(date('Y-m-d', strtotime('+40 days')));
// //$end_date = strtotime(date('Y-m-d', strtotime('+1 days')));


// //$percent = (($now-$strt_date) / ($end_date-$strt_date))*100;
// $end = ceil((($now-$strt_date)/$percent)+$strt_date);
// echo "current : ".date('Y-m-d', strtotime('+40 days'));echo "<br>";
// print_r($end);echo "<br>";print_r(date('Y-m-d', $end));
// // print_r(date('Y-m-d'));echo "<br>";
// // print_r(date('Y-m-d', strtotime('10 days')));echo "<br>";
// // print_r(($now-$strt_date)/30);
// // // $percent = 0.69;

// // // $begin = ($now-$end);
// // // print_r($begin);die();
// // //echo date('d/m/Y',(strtotime(date('d-m-Y'))*0.70-strtotime($date)*0.70));
// // 		$end_date = date('Y-m-d', strtotime('-7 days'));

// die();
		$model=new KPIStructureForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		//print_r($Employee_id);die();
		$kra_types_array = '';$data = '';
		// $data = array(
		// // foreach ($kra_types as $row) {
		// // 	if ($kra_types_array == '') {
		// // 		$kra_types_array = $row['KRA_category'] => $row['KRA_category'];
		// // 		echo $kra_types_array;				
		// // 	}
		// // 	else
		// // 	{
		// // 		$kra_types_array = $kra_types_array.','.$row['KRA_category'] => $row['KRA_category'];
		// // 		echo $kra_types_array;
		// // 	}
		// // }
		// );
		// //$data = array($kra_types_array);
		// print_r($data);die();
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		//$this->render('//site/notification_view');
		$this->render('//site/set_goal',array('model'=>$model,'kra_list'=>$kra_types,'kpi_data'=>$kpi_data));
		//$this->render('//site/footer');
		//$this->render('//site/emp',array('model'=>$model));
	}

	function actionapprovegoal_list()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'Approved');
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		//print_r($kpi_data);die();
		$kpi_data_count = '';
		if (count($kpi_data)>0) {
			$kpi_data_count = $kpi_data;
		}
		else
		{
			$kpi_data_count = '';
		}
		$cnt = 0;$emp_count = 0;$employee_data = '';	
		
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
		$this->render('//site/header_view');
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'approved_list'=>'approved_list'));
	}

	function actionkpi_list()
	{
		$model=new KpiListForm;
		$result = $model->get_seach($_POST['kpi_value']);
		if (count($result)>0) {
			$cnt = 0;
			foreach ($result as $row) {
			echo '<div style="border: 1px solid rgb(177, 178, 178);padding: 5px;cursor: pointer;" id="list_'.$cnt.'" class="listdata">'.$row['kpi_name'].'</div>';
			$cnt++;
			}
		}
		else
		{
			echo "No result found";
		}
		

		//print_r($result);die();
		//SELECT * FROM `kpi_list` WHERE `kpi_description` like 'Measures%' 
	}

	function actiongettarget_value()
	{
		$kra=new KRAStructureForm;
		if (isset($_POST['kra_category'])) {
			$kra->KRA_category = $_POST['kra_category'];
			$where = 'where KRA_category = :KRA_category';
			$list = array('KRA_category');
			$data = array($_POST['kra_category']);
			$result = $kra->get_kra_data($where,$data,$list); 
			$record = '';
			//print_r($_POST['kra_category']);die();
			$format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage');
			//echo $result;
			//print_r($result);			
				//$list=$kra_list->get_list(); 
                // $cities = CHtml::listData($result,'Weightage','Weightage');               
                // echo CHtml::dropDownList("Weightage",'',$cities,$htmlOptions=array('class'=>"form-control Weightage",'style'=>"width: 186px;"));
			for ($i=0; $i < $result['0']['No_of_KPI']; $i++) { 
				//print_r($result['0']['No_of_KPI']);die();
				if($record == '')
				{
					$record = '<tr><td id="kpilist_'.$i.'">
                        <input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list','',array('class'=>'form-control kpi_list','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control value_field','id'=>'unit_value-'.$i.'')).'</td><td>'.CHtml::textField('target_value1','',array('class'=>'form-control fields target_value1'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value2','',array('class'=>'form-control fields target_value2'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value3','',array('class'=>'form-control fields target_value3'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value4','',array('class'=>'form-control fields target_value4'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value5','',array('class'=>'form-control fields target_value5'.$i.'','disabled' => true)).'</td></tr>';
				}
				else
				{
					$record = $record.'<tr><td id="kpilist_'.$i.'">
                        <input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list','',array('class'=>'form-control kpi_list','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control value_field','id'=>'unit_value-'.$i.'')).'</td><td>'.CHtml::textField('target_value1','',array('class'=>'form-control fields target_value1'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value2','',array('class'=>'form-control fields target_value2'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value3','',array('class'=>'form-control fields target_value3'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value4','',array('class'=>'form-control fields target_value4'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value5','',array('class'=>'form-control fields target_value5'.$i.'','disabled' => true)).'</td></tr>';
				}
				
			}
			$result_data = array();
			$result_data[0] = $record;
			$result_data[1] = $result['0']['No_of_KPI'];
			
			echo json_encode($result_data);
		}
			// $arr = array();
			// $arr[0] = "Mark Reed";
			// $arr[1] = "34";
			// $arr[2] = "Australia";
			// echo json_encode($arr);
	}

	function actionsave_kpi()
	{
		$model=new KPIStructureForm;
		//print_r($_POST['kpi_list']);
		$model->KPI_id = uniqid();
		//$model->attributes = $_POST;
		$model->target = $_POST['target'];
		$model->target_value1 = $_POST['target_value1'];
		$model->target_unit = $_POST['target_unit'];
		$model->KRA_category = $_POST['KRA_category'];
		$model->KRA_description = $_POST['KRA_description'];
		$model->kpi_list = $_POST['kpi_list'];
		$model->KRA_date = date('Y-m-d');
		$model->KRA_status = "Pending";
		$model->appraisal_id1 = Yii::app()->user->getState("appriaser_1");
		//$model->appraisal_id2 = Yii::app()->user->getState("appriaser_2");
		$model->Employee_id = Yii::app()->user->getState("Employee_id");
		//print_r($_POST);
		//$model->KPI_id = '4';
		//$model->save();
		//print_r($model->attributes);die();
		if($model->save())
		{
			//$this->actionsendmail();
			print_r("Success");die();
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionupdate_kpi()
	{
		$model=new KPIStructureForm;
		//print_r($_POST['kpi_list']);
		//$model->KPI_id = uniqid();
		//$model->attributes = $_POST;
		
		$data = array(
			'target' => $_POST['target'], 
			'target_value1' => $_POST['target_value1'], 
			'target_unit' => $_POST['target_unit'], 
			'KRA_category' => $_POST['KRA_category'], 
			'KRA_description' => $_POST['KRA_description'], 
			'kpi_list' => $_POST['kpi_list'], 
			'KRA_date' => date('Y-m-d'), 
			'KRA_status' => 'Pending'
		);
		//print_r($_POST['KPI_id']);die();
		//$model->KPI_id = '4';
		//$model->save();
		
		$update = Yii::app()->db->createCommand()->update('KPI_structure',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		//print_r($_POST['KPI_id']);die();
		if($update!=0)
		{
			//$this->actionsendmail();
			print_r("success");die();
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionupdate_notificationflag()
	{
		//$model=new NotificationsForm;
		
		$data = array(
			'chk_flag' => $_POST['chk_flag'],			
		);
		//print_r("hghj");die();
		$update = Yii::app()->db->createCommand()->update('notifications',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
		//print_r($_POST['KPI_id']);die();
		if($update!=0)
		{
			//$this->actionsendmail();
			print_r("success");die();
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionkpi_edit($KPI_id = NULL)
	{
		$model=new KPIStructureForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		////////////////////////////////////////////////////
		$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data1 = array($KPI_id);
		$kpi_data_edit = $model->get_kpi_list($where1,$data1,$list1);

		$this->render('//site/script_file');
		$this->render('//site/header_view');
		//$this->render('//site/notification_view');
		$this->render('//site/set_goal',array('model'=>$model,'kra_list'=>$kra,'kpi_data'=>$kpi_data,'kpi_data_edit'=>$kpi_data_edit,'edit_flag'=>'1'));
	}

	function actionkpi_del()
	{
		$model=new KPIStructureForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");	
		$KPI_id = $_POST['KPI_id'];	
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);		

		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('KPI_structure', 'KPI_id=:KPI_id', array(':KPI_id'=>$KPI_id));
		if($query_result == 1)
		{
			echo 'success';
		}
		else
		{
			echo 'error occured';
		}
		//print_r($query_result);die();
		// print_r($query_result);die();

		// $this->render('//site/script_file');
		// $this->render('//site/header_view');
		// //$this->render('//site/notification_view');		
		// $this->render('//site/set_goal',array('model'=>$model,'kra_list'=>$kra,'kpi_data'=>$kpi_data));
	}

	function actiongetlist()
	{
		//print_r($_POST['number_of_kra']);die();
		$kra_list = $_POST['number_of_kra'];
		$this->render('//site/goal_sheet',array('kra_list'=>$kra_list));
	}

	function actionapprovegoals()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status and KRA_status_flag = :KRA_status_flag';
		$list = array('appraisal_id1','KRA_status','KRA_status_flag');
		$data = array($id,'Pending','1');
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		//print_r($kpi_data);die();
		$kpi_data_count = '';
		if (count($kpi_data)>0) {
			$kpi_data_count = $kpi_data;
		}
		else
		{
			$kpi_data_count = '';
		}
		//print_r($kpi_data_count);die();
		$cnt = 0;$emp_count = 0;$employee_data = '';
		// for ($i=0; $i < count($kpi_data); $i++) { 
		// 	for ($j=$i; $j < count($kpi_data); $j++) { 
					
		// 	}
		// 	$where = 'where Employee_id = :Employee_id';
		// 	$list = array('Employee_id');
		// 	$data = array($kpi_data[$i]['Employee_id']);
		// 	$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
		// 	$cnt++;
		// }
		//print_r($id);die();
		$notification_data = '';
		if (isset($kpi_data) && count($kpi_data)>0) {
				foreach ($kpi_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				$cnt++;
			}
			$notification_data = array(
				'notication_count' => count($kpi_data), 
				'notication_type' => "KRA Approval Pending",
			);
		}	

		
		$this->render('//site/script_file');
		$this->render('//site/header_view',array('notication_count'=>$notification_data));
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data));
		$this->render('//site/footer_view');
	}

	


	function actionupdategoal()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		//print_r($_POST['KPI_id']);
		$final_status = 'Pending';
		$all_status = explode(';',$_POST['review_status']);
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
			'review_status' => $_POST['review_status'],
			'review_comments' => $_POST['review_comments'],	
			'goal_approve_date' => date('Y-m-d'),
			'KRA_status' => $final_status
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

		
		$update = Yii::app()->db->createCommand()->update('KPI_structure',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		//print_r($_POST['KPI_id']);die();
		if ($update != 0) {

			$this->actiongoalnotification($employee_data['0']['Email_id']);
		}
		else
		{
			echo "error occured";
		}
	}



	function actiongoalnotification($mail_id = NULL)
    {
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
    	//print_r($mail_id);die();
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "appraiser_to_emp";
		  $params = array('mail_data'=>$employee_data);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Goal Approve';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($mail_id);
		  $message->addCC($Employee_id);  
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

	function actionsendmail()
    {
    	$employee_email = '';$appriaser_1 = '';
    	
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($appriaser_1);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
    	//print_r($mail_id);die();
    	Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "email_appraiser";
		  $params = array('mail_data'=>$employee_data);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Approval Pending';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($appriaser_1);
		  $message->addCC($Employee_id);  		  
		  $message->from = $Employee_id;
		  $notification_data->notification_type = 'Goal Approval_pending';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
		  $kra_update = array(
		  	'KRA_status_flag' => '1', 
		  );
		  //print_r(Yii::app()->user->getState("Employee_id"));die();
		  if(Yii::app()->mail->send($message))
		  {
		  		$update = Yii::app()->db->createCommand()->update('KPI_structure',$kra_update,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));		  		
		  		echo "Notification Send";die();
		  }
    }

	public function actionfetch_field()
	{
		$format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage');
		if (isset($_POST['unit_type'])) {
			if($_POST['unit_type'] == 'Units' || $_POST['unit_type'] == 'Weight' || $_POST['unit_type'] == 'Value')
			{
				//print_r($_POST['unit_type']);die();
				$date_str = $_POST['unit_value'];
				
				$field_1 = round($date_str*0.69,2);
				$field_2 = round($date_str*0.69,2)+0.01." to ".round($date_str*0.95,2);
				$field_3 = round($date_str*0.95,2)+0.01." to ".round($date_str*1.05,2);
				$field_4 = round($date_str*1.05,2)+0.01." to ".round($date_str*1.29,2);
				$field_5 = " > ".round($date_str*1.29,2);
				echo $field_1.','.$field_2.','.$field_3.','.$field_4.','.$field_5;
			}
			
		}

	}
	
}	
