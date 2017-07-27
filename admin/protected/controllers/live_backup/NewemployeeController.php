<?php

class NewemployeeController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$model=new EmployeeForm;
		//print_r($model->attributes);die();
		//$this->render('//site/header');
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		//$this->render('//site/new_header');
		$this->render('//site/employee_registration',array('model'=>$model));
		$this->render('//site/footer');
		//$this->render('//site/emp',array('model'=>$model));
	}

	public function actionorg_chart()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		//$this->render('//site/header');
		
		$this->render('//site/header_view');
		$this->render('//site/script_file');
		$model=new EmployeeForm;
		$result = $model->get_JD();
		$this->render('//site/org_chart',array('jd_data'=>$result));
		$this->render('//site/footer');
		//print_r($result);
		//die();
		//$this->render('//site/org_chart',array('jd_data'=>$result));
		//$this->render('//site/footer');
	}

	public function actionemployee_master()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$model=new EmployeeForm;
		$data = $model->getdata();
		//print_r($data);die();
		//$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/employee_master',array('model'=>$data));
		$this->render('//site/footer');
	}

	public function actionnotification()
	{
		$this->render('//site/script_file');
		//$this->render('//site/header_view');
		$this->render('//site/notification_view');
		$this->render('//site/footer');
	}

	public function actionimportdata()
	{
		//$model=new EmployeeForm;
		$file_name = $_FILES['employee_csv']['tmp_name'];
		$fp = fopen($file_name, 'r');
		if($fp)
		{
			
			 $first_time = true;
			 while(($line = fgetcsv($fp, 1000, ";")) != FALSE)
			 {
			 	 $line = fgetcsv($fp, 1000, ",");
			 	 $model = new EmployeeForm;
                    $model->Emp_fname = $line[0];
                     print_r($line);die();
                    //$model->Emp_lname  = $line[1];

                    $model->save();
			 }
			
		}
		print_r($_FILES['employee_csv']);die();
	}

	public function actionsave()
	{
		//print_r($_POST);die();
		$model=new EmployeeForm();
		//print_r($_POST);die();
		$model->Employee_id=$_POST['emp_id'];
		$model->Employee_atd_code=$_POST['Employee_atd_code'];
		$model->Emp_fname=$_POST['fname'];
		$model->Emp_mname=$_POST['mname'];
		$model->Emp_lname=$_POST['lname'];
		$model->Gender=$_POST['gender'];
		$model->DOB=$_POST['dob_date'];
		$model->Nationality=$_POST['nationality'];
		$model->Email_id=$_POST['email_id'];
		$model->joining_date=$_POST['joining_date'];
		$model->mobile_number=$_POST['mobile_number'];
		$model->PAN_number=$_POST['pan_number'];
		$model->Designation=$_POST['designation'];
		$model->Cadre=$_POST['cader'];
		$model->Reporting_officer1_id=$_POST['repoting_officer'];
		$model->Employee_status	=$_POST['emp_status'];
		$model->Present_address=$_POST['addr1'];
		$model->Permanent_address=$_POST['addr2'];
		$model->Blood_group=$_POST['blood_grp'];
		$model->Image=$_POST['Image'];
		$model->Department=$_POST['department'];
 	
 		$login_save =new LoginForm;
 		$login_save->username = $_POST['email_id'];
 		$login_save->password = '123456';
 		$login_save->role_id = '3';
		//print_r($_POST);die();
		//print_r($model->attributes);die();
		//$image_data = CUploadedFile::getInstance($model, 'Image');
		// $uploadedFile = CUploadedFile::getInstance($model,$_POST['Image']);
		//print_r($model->attributes);die();
		// $model->Image = $uploadedFile->name;
		// $uploadedFile->saveAs(Yii::app()->basePath.'/img/'.$model->Image);
 	// 	$model->Image=$image_data->name;
 		
    	//$path = Yii::$app->params['/var/www/html/pmsapp/images/userpic'] . $model->Image;
    	// if($model->save())
	    // {
	    //     $model->Image->saveAs("/".$model->Image,true);
	    //     print_r("saved");
	    //     Yii::$app->getSession()->setFlash('error', 'User type inserted successfully');
	    // }
	    // else
	    // {
	    // 	//$model->Image->saveAs("/".$model->Image,true);
	    // 	print_r("not saved");
	    // }
		// if(isset($_POST['EmployeeForm']))
	 //    {
	    	//print_r($_POST['EmployeeForm']);die();
	        
	       
	        if($model->save())
        	{
        		$login_save->save();
        		$this->actiongetmail($_POST['email_id']);
        	}
	    // }
	}

	public function actiongetmail($mail_id = NULL)
	{
		$model=new EmployeeForm();
		// $name='=?UTF-8?B?'.base64_encode('monica').'?=';
		// $subject='=?UTF-8?B?'.base64_encode('Test').'?=';
		// $headers="From: 'monica' <{mssadafule@gmail.com}>\r\n".
		// 	"Reply-To: {mssadafule@gmail.com}\r\n".
		// 	"MIME-Version: 1.0\r\n".
		// 	"Content-Type: text/plain; charset=UTF-8";

		// mail(Yii::app()->params['adminEmail'],$subject,'hello',$headers);
		// Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
		$message            = new YiiMailMessage;
		$message->view = 'account_verification';
           //this points to the file test.php inside the view path
        //$message->view = "test";
        // $sid                 = 1;
        // $criteria            = new CDbCriteria();
        // $criteria->condition = "studentID=".$sid."";            
        //$studModel1          = Student::model()->findByPk($sid);        
        //$params              = array('myMail'=>$studModel1);
        $message->subject    = 'Account Created';
        $message->setBody(array('model' => $model), 'text/html');
        $message->addTo($mail_id);
        $message->from = 'mssadafule@gmail.com'; 
        if(Yii::app()->mail->send($message))
        {
        	echo "Notification Send to employee";
        }  
         
		//$this->refresh();
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
		//print_r($model->attributes);die();	
		if(isset($_POST['EmployeeForm']))
		{
			$model->attributes = $_POST['EmployeeForm'];
			$images=CUploadedFile::getInstance($model,'Image');
			$model->Image = $images->name;
			//print_r(Yii::app()->basePath.'/img/'.$model->Image);die();		
			if ($model->validate()) {
				if($model->save())
				{
					$login->username = $_POST['EmployeeForm']['Email_id'];
	        		$login->password = 'admin@123';
	        		$login->save();
	        		//print_r($login);die();
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
		//$this->render('//site/script_file');
		$this->render('//site/account_verification');
		//$this->render('//site/footer');
	}
	
}