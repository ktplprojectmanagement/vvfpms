<?php

class EmployeeController extends Controller
{
	public function actionIndex()
	{		
		$model=new EmployeeForm;
		//print_r($model->attributes);die();
		$this->render('//site/script_file');
		$this->render('//site/employee_form',array('model'=>$model));
		$this->render('//site/footer');
	}

	public function actionMyAction()
    {       
            $model=new EmployeeForm;    
            //print_r("dsfds");die();         
            //$this->performAjaxValidation($model);  
            
            if(isset($_POST['EmployeeForm']))
            {
                    $model->attributes=$_POST['EmployeeForm'];
                    $valid=$model->validate();            
                    if($valid){
                                      
                       //do anything here
                    	//$model->Employee_id = uniqid();
                    	if($model->save())
                    	{
                    		echo CJSON::encode(array(
                              'status'=>'success'
	                         ));
	                        // Yii::app()->end();
                    	}
                         
                        }
                        else{
                            $error = CActiveForm::validate($model);
                            if($error!='[]')
                                echo $error;
                            Yii::app()->end();
                        }
           }
 
    }

    function actionsendmail()
    {
    		Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->setBody('Hello', 'text/html');
		  $message->subject = 'Test Message';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo('mssadafule@gmail.com');
		  $message->addCC('priyankamahadik1994@gmail.com');  
		  $message->from = Yii::app()->params['adminEmail'];
		  Yii::app()->mail->send($message);
    }

    function actionsaverecord()
    {
    	//print_r("jhjkh");die();
    	$model = new EmployeeForm();    	
    	
    	$value = array(
    		'Employee_id' => '123456', 
    		'Emp_fname' => 'monica',
    		'Emp_mname' => 'sada',
    	);
    	$model->attributes = $value;
    	//print_r($model->attributes);die();
    	
    	if ($model->save()) {
    		print_r("done");
    	}
    	else
    	{
    		print_r("not done");
    	}
    }

    function actionselectdata()
    {
    	// $connection=Yii::app()->db;
    	// $sql = 'select * from '.'Employee';
    	// $command=$connection->createCommand($sql);
    	// $rows = $command->queryAll();
    	$connection=Yii::app()->db;
    	$sql = 'select * from '.'Employee '.'where Employee_id= :Employee_id';
    	$command=$connection->createCommand($sql);
    	$command->bindValue(":Employee_id",'22222',PDO::PARAM_STR);
    	$rows = $command->queryAll();
    	print_r($rows);die();
    }

    function actionupdatedata()
    {
    	// $connection=Yii::app()->db;
    	// $sql = 'select * from '.'Employee';
    	// $command=$connection->createCommand($sql);
    	// $rows = $command->queryAll();
    	$connection=Yii::app()->db;
    	//$sql = 'select * from '.'Employee '.'where Employee_id= :Employee_id';
    	$command=Yii::$app->db->createCommand()->update('Employee',['Emp_fname'=>':Emp_fname','Employee_id == :Employee_id']);
    	$command->bindValue(":Employee_id",'22222',PDO::PARAM_STR);
    	$command->bindValue(":Emp_fname",'someone',PDO::PARAM_STR);
    	$command->execute();
    	//print_r($rows);die();
    }

    function actionbindpara()
    {
    	$connection=Yii::app()->db;
    	$sql='INSERT INTO Employee (Employee_id, Emp_fname,Emp_mname) VALUES(:Employee_id,:Emp_fname,:Emp_mname)';
    	$command=$connection->createCommand($sql);
    	$command->bindValue(":Employee_id",'22222',PDO::PARAM_STR);
    	$command->bindValue(":Emp_fname",'dsfdsf',PDO::PARAM_STR);
    	$command->bindValue(":Emp_mname",'dfdsfds',PDO::PARAM_STR);
    	if ($command->execute()) {
    		print_r("done");
    	}
    	else
    	{
    		print_r("not done");
    	}
    	//print_r($command->read());
    }

    function actiongetimage()
    {
    	$model = new EmployeeForm();
    	$this->render('//site/get_image_view',array('model'=>$model));
    }

    function actionsaveimage()
    {

    	$model = new EmployeeForm();
    	$image_details = CUploadedFile::getInstance($model,'Image');    
    	//print_r($image_details);die();
    	//$path=Yii::$app->basePath .'/images/';
    	//print_r(Yii::app()->request->baseUrl.'/images/'.$image_details->name);die();
    	$model->Emp_fname = 'anyone';
    	if($model->save())
    	{
    		echo "success";
    	}
    	$image_details->saveAs('/images/'. $image_details->name);
    	
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}