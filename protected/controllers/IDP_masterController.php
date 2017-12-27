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
			//$this->render('//site/baseurl');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_master',array('program_data_result'=>$program_data_result));
			$this->render('//site/admin_footer_view');
		}
		else{
		$model=new LoginForm;
		$this->render('//site/baseurl');
		$this->render('//site/user_login_view',array('model'=>$model));
		}
		
	}
   
   
    function actionedit($num)
    {
        $model=new ProgramDataForm;
        $id=$num;
       //echo $num;die();
        $where = 'where id = :id';
		$list = array('id');
		$data = array($id);             
		$idp_data = $model->get_kpi_data($where,$data,$list);
        //$edit_flag=$_POST['edit_flag'];
        //print_r($idp_data);die();
        $selected_option = 'IDP';
        $this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/IDP_master',array('idp_progdata'=>$idp_data,'edit_flag'=>'1'));
			$this->render('//site/admin_footer_view');
    }
    
	function actionadd()
	{
		$model=new ProgramDataForm;
		if ($_POST['faculty_email_id'] != '') {
			$data_get = explode(';',$_POST['faculty_email_id']);
			$model->faculty_email_id = isset($data_get[0]) ? $data_get[0] : '';
			$model->faculty_name = isset($data_get[1]) ? $data_get[1] : '';
		}
		//print_r($_POST['faculty_email_id']);die();
		
		$model->program_name = isset($_POST['program_name']) ? $_POST['program_name'] : '';
		$model->faculty_type = isset($_POST['faculty_type']) ? $_POST['faculty_type'] : '';
		$model->amount = isset($_POST['amount']) ? $_POST['amount'] : '';
		$model->external_name = isset($_POST['external_name']) ? $_POST['external_name'] : '';		
		$model->training_days = isset($_POST['training_days']) ? $_POST['training_days'] : '';
		$model->location= isset($_POST['location']) ? $_POST['location'] : '';
		$model->need= isset($_POST['need']) ? $_POST['need'] : '';
		$model->goal_set_year= isset($_POST['goal_set_year']) ? $_POST['goal_set_year'] : '';
		$model->Note= isset($_POST['Note']) ? $_POST['Note'] : '';
		//print_r($model->attributes);die();
		if($model->save())
	  	{
	  		print_r("Successfully Saved");die();
	  	}
	  	else
	  	{
	  		print_r("No changes done");die();
	  	}
		
	}
	
	function actionupdate()
	{
	
//	echo "hi";die();
		$model=new ProgramDataForm;
		if ($_POST['faculty_email_id'] != '') {
			$data_get = explode(';',$_POST['faculty_email_id']);
			if (isset($data_get[0])) {
				$model->faculty_email_id = $data_get[0];
			}

			if (isset($data_get[1])) {
				$model->faculty_name = $data_get[1];
			}		
			
		}
	
$data=array(
    'program_name'=> isset($_POST['program_name']) ? $_POST['program_name'] : '',
    'faculty_email_id'=> isset($data_get[0]) ? $data_get[0] : '',
    'faculty_name'=> isset($data_get[1]) ? $data_get[1] : '',
    'faculty_type'=> isset($_POST['faculty_type']) ? $_POST['faculty_type'] : '',
    'amount'=> isset($_POST['amount']) ? $_POST['amount'] : '',
    'external_name'=> isset($_POST['external_name']) ? $_POST['external_name'] : '',
    'training_days'=> isset($_POST['training_days']) ? $_POST['training_days'] : '',
    'location'=> isset($_POST['location']) ? $_POST['location'] : '',
    'need'=> isset($_POST['need']) ? $_POST['need'] : '',
    'goal_set_year'=> isset($_POST['goal_set_year']) ? $_POST['goal_set_year'] : '',
    'note'=> isset($_POST['Note']) ? $_POST['Note'] : '',
    );
 //print_r($data);die();
    $update = Yii::app()->db->createCommand()->update('program_data',$data,'id=:id',array(':id'=>$_POST['id']));
		
	if ($update==1) {
			echo 'success';
			//$this->actiongoalnotification($employee_data['0']['Reporting_officer1_id'],'Year End Approval Request');
		}
		else
		{
			echo "error occured";
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
