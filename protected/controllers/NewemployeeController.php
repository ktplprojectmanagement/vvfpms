<?php

class NewemployeeController extends Controller
{
	public function actionIndex()
	{
		$model=new EmployeeForm;
		$cluster = new ClusterForm;
		
			$cluster_name = $cluster->get_list('cluster_name');
		$dept_name = $cluster->get_list('department');
		$grade = $cluster->get_list('grade');
		$setting_data =new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('emp_id-Automatic',date('Y'));
		$emp_id_data = $setting_data->get_setting_data($where,$data,$list);
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('emp_id-Manual',date('Y'));
		$emp_id_data1 = $setting_data->get_setting_data($where,$data,$list);
		$prefix_value = '';$post_value = '';
		if (count($emp_id_data)>0) {
			$emp_data = explode(';', $emp_id_data['0']['setting_type']);
			$prefix = explode('-',$emp_data[0]);
			$postfix = explode('-',$emp_data[1]);
			if($prefix[1] != '')
			{
				$prefix_value = $prefix[1];
			}
			if ($postfix[1] != '') {
				$post_value = $postfix[1];
			}
		}
		else if (count($emp_id_data1)>0) {
			$prefix_value = 'manual';
		}

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('emp_atd_code-Automatic',date('Y'));
		$emp_atd_id_data = $setting_data->get_setting_data($where,$data,$list);
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('emp_atd_code-Manual',date('Y'));
		$emp_atd_id_data1 = $setting_data->get_setting_data($where,$data,$list);
		$atd_prefix_value = '';$atd_post_value = '';
		if (count($emp_atd_id_data)>0) {
			$emp_data = explode(';', $emp_atd_id_data['0']['setting_type']);
			$prefix = explode('-',$emp_data[0]);
			$postfix = explode('-',$emp_data[1]);
			if($prefix[1] != '')
			{
				$atd_prefix_value = $prefix[1];
			}
			if ($postfix[1] != '') {
				$atd_post_value = $postfix[1];
			}
		}
		else if(count($emp_atd_id_data1)>0)
		{
			$atd_post_value = 'manual';
		}

		$selected_option = 'newemployee';
		$this->render('//site/script_file');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/employee_registration',array('model'=>$model,'prefix_value'=>$prefix_value,'post_value'=>$post_value,'atd_prefix_value'=>$atd_prefix_value,'atd_post_value'=>$atd_post_value));
		$this->render('//site/admin_footer_view');
		
		
	}

	function actioncity_list()
	{
		$city_state = new StateCityForm;
		$city = '';
		$where = 'where state = :state';
		$list = array('state');
		$data = array($_POST['state_name']);
		$city_state_record = $city_state->get_city_data($where,$data,$list,'city');
		$list_data = CHtml::listData($city_state_record,'city', 'city');
		echo CHtml::dropDownList("city",'',$list_data,$htmlOptions=array('class'=>'form-control format_list city'));
	}

	public function actionorg_chart()
	{
		$model=new KRAStructureForm;
		$employee = new EmployeeForm;
		$employee_result = $employee->getdata();
		$kra_result = $model->get_all_kra();
		$appraiser_list = $employee->get_appraiser_list();
		$appraiser_list_data = '';
		$employee_list = '';
		$cnt = 0;
		if (count($appraiser_list)>0) {
			for ($i=0; $i < count($appraiser_list); $i++) {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
			$list = array('Reporting_officer1_id');
			$data = array($appraiser_list[$i]['Reporting_officer1_id']);
			$employee_list[$i] = $employee->get_employee_data($where,$data,$list);
			}
		}
		if (count($appraiser_list)>0) {
			$cnt = 0;
			for ($i=0; $i < count($appraiser_list); $i++) {
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($appraiser_list[$i]['Reporting_officer1_id']);
			$appraiser_list_data[$cnt] = $employee->get_employee_data($where,$data,$list);
			$cnt++;
			}
		}

		$diff_Department = $employee->get_department_list();
		$diff_cluster = $employee->get_distinct_list('cluster_name','where 1');

		
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$model=new EmployeeForm;
		$result = $model->get_JD();
		$this->render('//site/org_chart',array('model'=>$model,'employee_list'=>$employee_result,'kra_result'=>$kra_result,'employee_list_data'=>$employee_list,'appraiser_list'=>$appraiser_list_data,'diff_Department'=>$diff_Department,'diff_cluster'=>$diff_cluster));
		$this->render('//site/footer');
	}

	public function actionemployee_master()
	{
		
			$model=new EmployeeForm;
			$data = $model->getdata();
			$selected_option = 'employee_master';
			$this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/employee_record',array('model'=>$data));
			$this->render('//site/admin_footer_view');
		
		
	}

	public function actionnotification()
	{
		$this->render('//site/script_file');
		$this->render('//site/notification_view');
		$this->render('//site/footer');
	}

	public function actionimportdata()
	{
		$upload = 0;
		$file_name = $_FILES['employee_csv']['tmp_name'];
		$fp = fopen($file_name, 'r');
		while(! feof($fp))
		  {
		  	$line = fgetcsv($fp);
		  	$model=new EmployeeForm;
		  	$model->Employee_id  = uniqid();
		  	$model->Emp_lname  = $line[1];
		  	if($model->save())
		  	{
		  		$upload++;
		  	}
		  }
		  if($upload>0)
		  {
		  	print_r("Success");
		  }
		  else
		  {
		  	print_r("error");
		  }
	}

	public function actionsave()
	{
		//echo "Hiiii";die();
//echo $_POST['reporting_1_effective_date'];;die();
		$model=new EmployeeForm();
		$model->Employee_id=$_POST['Employee_id'];
		$model->Employee_atd_code=$_POST['Employee_atd_code'];
		$model->Emp_fname=$_POST['Emp_fname'];
		$model->Emp_mname=$_POST['Emp_mname'];
		$model->Emp_lname=$_POST['Emp_lname'];
		$model->DOB=$_POST['DOB'];
		$model->Email_id=$_POST['Email_id'];
		$model->joining_date=$_POST['joining_date'];
		$model->mobile_number=$_POST['mobile_number'];
		$model->PAN_number=$_POST['PAN_number'];
		$model->Gender=$_POST['Gender'];
		$model->Nationality=$_POST['Nationality'];
		$model->Cadre=$_POST['Cadre'];
		$model->Reporting_officer1_id=$_POST['Reporting_officer1_id'];
		$model->Employee_status	=$_POST['Employee_status'];
		$model->Present_address=$_POST['Present_address'];
		$model->Permanent_address=$_POST['Permanent_address'];
		$model->Department=$_POST['Department'];
		$model->Designation=$_POST['Designation'];
		$model->state=$_POST['state'];
		$model->city=$_POST['city'];
		$model->other_city=$_POST['other_city'];
		$model->Blood_group=$_POST['Blood_group'];
		$model->cluster_name=$_POST['cluster_name'];
		$model->cluster_appraiser=$_POST['cluster_appraiser'];
		$model->company_location=$_POST['company_location'];
		$model->BU=$_POST['BU'];
                $model->BU=$_POST['bu_head_name'];
                $model->BU=$_POST['bu_head_email'];
                $model->BU=$_POST['plant_head_name'];
                $model->BU=$_POST['plant_head_email'];
		$model->pms_status=$_POST['pms_status'];
		$model->reporting_1_change=$_POST['reporting_1_change'];
		$model->reporting_1_effective_date=$_POST['reporting_1_effective_date'];
		$model->reporting_2_change=$_POST['reporting_2_change'];
		$model->reporting_2_effective_date=$_POST['reporting_2_effective_date'];
		//print_r($model->attributes);die();
		$imagename = '';
		if (isset($_FILES['Image']['name'])) {
			$model->Image=CUploadedFile::getInstanceByName('Image');
			$filenamekey = md5(uniqid($_FILES['Image']['name'], true)); 
			$Fileext = pathinfo($_FILES['Image']['name'], PATHINFO_EXTENSION);
			$model->Image=$filenamekey.'.'.$Fileext;	
			$imagename = $filenamekey.'.'.$Fileext;	
			$image_data = CUploadedFile::getInstanceByName('Image');
    		$image_data->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$model->Image);
    		$model->Image=$filenamekey.'.'.$Fileext;
		}
		
		

		$login_save =new LoginForm;
 		$login_save->username = $_POST['Email_id'];
 		$login_save->password = md5('123456');
 		$login_save->role_id = '3';
 			 if($model->validate())
        	{ 
	        	  	
	     //print_r($model->attributes);die();
        		$gender='';$nationality='';$bld_grp='';
        		if ($_POST['Nationality'] == 'Indian' && ($_POST['state']=='Select' || $_POST['state']=='')) {
        			print_r("Please Select State.");die();
        		}
        		else if($_POST['state']!='Select' && ($_POST['city']=='' || $_POST['city']=='--Select--'))
        		{
        			print_r("Please Select City.");die();
        		}
        		else if ($_POST['Nationality'] == 'Other' && $_POST['other_city']=='') {
        			print_r("Please Enter City.");die();
        		}
                        else if ($_POST['cluster_appraiser'] == 'Select' || $_POST['cluster_appraiser']=='') {
        			print_r("Please Select Cluster Appraisel.");die();
        		}
        		else if ($_POST['Employee_status'] == 'Select') {
        			print_r("Please Select Employee Status");die();
        		}
        		else if($_POST['pms_status']=='Select')
        		{
        			print_r("Please Select PMS status");die();
        		}
        		else
        		{ //print_r($model->attributes);die();
        			if ($model->Image == '') {
        				$model->Image = 'NULL';
        			}
        			if ($model->invalid_email == '') {
        				$model->invalid_email = '0';
        			}
        			if ($model->company_location == '') {
        				$model->company_location = 'NULL';
        			}
        			if ($model->BU == '') {
        				$model->BU = 'NULL';
        			}
        		
        			if($model->save()) {
        	
        	//print_r($model->attributes);die();
	        		print_r('success');die();
	        		}
	        		else{
	        			//print_r($model->attributes);die();
	        			print_r('ERROR');
	        		}
        		}       		
        		
        	}
        	else if(!$model->validate())
        	{
        		print_r(json_encode($model->getErrors()));die();
        	}

	}

	public function actiongetmail($mail_id = NULL)
	{
		$model=new EmployeeForm();
		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $model->get_employee_data($where1,$data2,$list1);
		$message            = new YiiMailMessage;
		$message->view = 'account_verification';
        $message->subject    = 'Account Created';
        $message->setBody(array('mail_data' => $employee_data), 'text/html');
        $message->addTo($mail_id);
        $message->from = 'mssadafule@gmail.com'; 
        if(Yii::app()->mail->send($message))
        {
        	echo "Notification Send to employee";
        } 
        else{
        	echo "sending";
        } 
	}

	function get_emp_data($where,$data,$list)
	{
		$connection=Yii::app()->db;
		$sql = "select * from Employee".' '.$where;
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		return $rows;
	}	

	public function actionsaverecord()
	{
		$model=new EmployeeForm();	
		$login=new LoginForm();
		if(isset($_POST['EmployeeForm']))
		{
			$model->attributes = $_POST['EmployeeForm'];
			$images=CUploadedFile::getInstance($model,'Image');
			$model->Image = $images->name;	
			if ($model->validate()) {
				if($model->save())
				{
					$login->username = $_POST['EmployeeForm']['Email_id'];
	        		$login->password = 'admin@123';
	        		$login->save();
	        		$this->actiongetmail();
					$images->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$model->Image);//// to save to folder inside protected
					$this->render('//site/script_file');
					$this->render('//site/employee_registration',array('model'=>$model));
					$this->render('//site/footer');
				}
				else
				{
					echo "not save";die();
				}
			}
			else
			{
				echo "not validated";
			}
		}
	}

	public function actionaccount_verification()
	{
		$this->render('//site/account_verification');
	}

	function actioncluster_head()
	{
	
		$cluster = new ClusterForm;
		$reporting_list = new EmployeeForm();
		$cluster_name =$_POST['cluster_value'];
	
		$where = 'where cluster_name = :cluster_name';
		$list = array('cluster_name');
		$data = array($cluster_name);
		$records = $cluster->get_cluster_data($where,$data,$list,'cluster_appraiser');
		// print_r($list);die();
		$dept_list=$cluster->get_cluster_data($where,$data,$list,'department');
		
        for ($k=0; $k < count($records); $k++) { 
            $where = 'where Email_id = :Email_id';
            $list = array('Email_id');
            $data = array($records[$k]['cluster_appraiser']);
            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);

          
            $dept=explode(';',$dept_list[$k]['department']);
		
        }
       $Cadre_id = array();                                 
       for ($l=0; $l < count($Reporting_officer_data); $l++) { 
        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
        }
           
       }
		
       $value_detail = array();
       $value_detail['0'] = CHtml::dropDownList("cluster_appraiser",'',$Cadre_id,$htmlOptions=array('class'=>"form-control target_value",'empty'=>'Select'));
       $value_detail['1'] = CHtml::activeDropDownList($cluster,'department',$dept,array('class'=>'form-control department','options'=>array('selected'=>true),'empty'=>'Select'));
     
       echo json_encode($value_detail);
       
	}
	function actionDesignation_change()
	{
		
		$cluster = new ClusterForm;
		
		$cadre =$_POST['grade'];
		
		$records = $cluster->get_list('grade');
		$cluster_details=$records['0']['grade'];
        $cluster1=explode(';',$cluster_details);

        $design_list=$cluster->get_list('designation');
        $emp_desg=$design_list['0']['designation'];
        $designation_list=explode(';',$emp_desg);
		
        for($i=0;$i<count($cluster1);$i++){
        	if($cluster1[$i]==$cadre){
        		$desg=explode('^', $designation_list[$i]);

        	}
        }
         echo CHtml::activeDropDownList($cluster,'designation',$desg,array('class'=>'form-control designation','options'=>array('selected'=>true),'empty'=>'Select')); 
         
	}
}
