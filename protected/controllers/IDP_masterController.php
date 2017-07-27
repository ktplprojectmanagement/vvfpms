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
			$model->faculty_email_id = $data_get[0];
			$model->faculty_name = $data_get[1];
		}
		//print_r($_POST['faculty_email_id']);die();
		
		$model->program_name = $_POST['program_name'];
		$model->faculty_type = $_POST['faculty_type'];
		$model->amount = $_POST['amount'];
		$model->external_name = $_POST['external_name'];		
		$model->training_days = $_POST['training_days'];
		$model->location=$_POST['location'];
		$model->need=$_POST['need'];
		$model->goal_set_year=$_POST['goal_set_year'];
		$model->Note=$_POST['Note'];
		print_r($model->attributes);
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
			$model->faculty_email_id = $data_get[0];
			$model->faculty_name = $data_get[1];
		}
	//	print_r($_POST['faculty_email_id']);die();
		
// 		$model->program_name = $_POST['program_name'];
// 		$model->faculty_type = $_POST['faculty_type'];
// 		$model->amount = $_POST['amount'];
// 		$model->external_name = $_POST['external_name'];		
// 		$model->training_days = $_POST['training_days'];
// 		$model->location=$_POST['location'];
// 		$model->need=$_POST['need'];
// 		$model->goal_set_year=$_POST['goal_set_year'];
// 		$model->Note=$_POST['Note'];

//echo $_POST['id'];die();
$data=array(
    'program_name'=> $_POST['program_name'],
    'faculty_email_id'=>$data_get[0],
    'faculty_name'=>$data_get[1],
    'faculty_type'=>$_POST['faculty_type'],
    'amount'=>$_POST['amount'],
    'external_name'=>$_POST['external_name'],
    'training_days'=>$_POST['training_days'],
    'location'=>$_POST['location'],
    'need'=>$_POST['need'],
    'goal_set_year'=>$_POST['goal_set_year'],
    'note'=>$_POST['Note'],
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
