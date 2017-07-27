<?php

class Location_wiseAccesController extends Controller
{
	public function actionIndex()
	{
		$employee_data=new Employee1Form;
		$employee_data=$employee_data->getdata();
		//print_r($employee_data);die();
		$this->render('//site/script_file');
		$this->render('//site/admin_header_view');
		$this->render('//site/Location_wise',array('employee_data'=>$employee_data));
	}
        	function actionemployee_profile($Employee_id = null)
	{
		$model=new Employee1Form;
$model1 =new EmployeeForm;
		$reporting_list = new ClusterForm();
                
		$notification_data=new NotificationsForm;
		$id = $Employee_id;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($id);
		$employee_data = $model->get_employee_data($where,$data,$list);

$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($id);
		$employee_data_main = $model1->get_employee_data($where,$data,$list);

		//print_r($employee_data);die();
		$appriaser_1 = $employee_data['0']['Reporting_officer1_id'];
		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array($appriaser_1);
		$Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
		$Reporting_officer_name = '';
		if (isset($Reporting_officer_data['0']['headname'])) {
			$Reporting_officer_name = $Reporting_officer_data['0']['headname'];
		}
		//print_r($Reporting_officer_name);die();
		
		$selected_option = 'PMS';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/admin_header_view',array('employee_data'=>$employee_data,'selected_option'=>$selected_option));
		$this->render('//site/approve_changes',array('employee_data_main'=>$employee_data_main,'employee_data'=>$employee_data,'model'=>$model,'Reporting_officer_name'=>$Reporting_officer_name));
		$this->render('//site/admin_footer_view');
		
	}
function actiondel_Emp_profile(){

		$model = new Employee1Form;
		$data=array(

				'Employee_id'=>$_POST['Employee_id']
			);
		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('Employee1', 'Employee_id=:Employee_id', array(':Employee_id'=>$_POST['Employee_id']));
		if ($query_result) {
			print_r($query_result);
		}
	}


}
?>