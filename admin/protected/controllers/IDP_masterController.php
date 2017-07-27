<?php

class IDP_masterController extends Controller
{

	public function actionIndex()
	{
		if (Yii::app()->user->getState("Employee_id")!='') 
		{
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;			
			$program_data_result = $program_data->get_data();
			//print_r($program_data_result);die();
			$selected_option = 'IDP';
			$this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_master',array('program_data_result'=>$program_data_result));
			$this->render('//site/admin_footer_view');
		}
		else
		{
			$this->redirect(array('Adminlogin/Index'));
		}
		
	}

	function actionadd()
	{
		$model=new ProgramDataForm;
		if ($_POST['faculty_email_id'] != '') {
			$data_get = explode(';',$_POST['faculty_email_id']);
			$model->faculty_email_id = $data_get[0];
			$model->faculty_name = $data_get[1];
		}
		//print_r($_POST['faculty_email_id']);die();
		
		$model->program_name = $_POST['program_name'];
		$model->faculty_type = $_POST['faculty_type'];
		$model->amount = $_POST['amount'];
		$model->external_name = $_POST['external_name'];		
		$model->training_days = $_POST['training_days'];
		if($model->save())
	  	{
	  		print_r("Successfully Saved");die();
	  	}
	  	else
	  	{
	  		print_r("No changes done");die();
	  	}
		
	}

	function actiondel_record()
	{
		$command = Yii::app()->db->createCommand();		
		$query_result = $command->delete('program_data', 'id=:id', array(':id'=>$_POST['id']));
		if ($query_result>0) {
			echo '1';
		}
		else
		{
			echo '0';
		}
	}

	
}
