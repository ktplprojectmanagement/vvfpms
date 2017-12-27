<?php

class AssigndetailsController extends Controller
{	
	public function actionIndex()
	{
		$model=new KPIStructureForm;
		$model1=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);

		if (count($settings_data)>0 && isset($settings_data['0']['setting_type'])) {
			$where = 'where goal_set_year = :goal_set_year';
			$list = array('goal_set_year');
			$data = array($settings_data['0']['setting_type']);
			$kpi_data = $model1->get_emp_id_list($where,$data,$list);

			if (isset($settings_data['0']['setting_type']) && isset($kpi_data) && count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
                    $emploee_data =new EmployeeForm;
                    if (isset($settings_data['0']['setting_type'])) {
                    	$where = 'where Employee_id = :Employee_id';
						$list = array('Employee_id');
						$data = array($kpi_data[$i]['Employee_id']);
						$kpi_data_edit = $model1->get_kpi_list($where,$data,$list);
                    }
					
					if (isset($kpi_data[$i]['Employee_id'])) 
					{
						$where = 'where Employee_id = :Employee_id';
						$list = array('Employee_id');
						$data = array($kpi_data[$i]['Employee_id']);
						$emp_data[$i] = $emploee_data->get_employee_data($where,$data,$list);
					}
				}
			}

		}
		else if (isset($settings_data1['0']['setting_type']) && count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where goal_set_year = :goal_set_year';
					$list = array('goal_set_year');
					$data = array($settings_data1['0']['setting_type']);
					$kpi_data = $model1->get_emp_id_list($where,$data,$list);

					if (isset($settings_data['0']['setting_type']) && count($kpi_data)>0) {
						for ($i=0; $i < count($kpi_data); $i++) { 
                            $emploee_data =new EmployeeForm;
							$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
							$list = array('Employee_id','goal_set_year');
							$data = array($kpi_data[$i]['Employee_id'],$settings_data['0']['setting_type']);
							$kpi_data_edit = $model1->get_kpi_list($where,$data,$list);

							$where = 'where Employee_id = :Employee_id';
							$list = array('Employee_id');
							$data = array($kpi_data[$i]['Employee_id']);
							$emp_data[$i] = $emploee_data->get_employee_data($where,$data,$list);
						}
					}
			} 
        	}
		else
		{
			$where = 'where goal_set_year = :goal_set_year';
			$list = array('goal_set_year');
			$data = array(date('Y'));
			$kpi_data = $model1->get_emp_id_list($where,$data,$list);

			if (isset($settings_data['0']['setting_type']) && count($kpi_data)>0) {
				for ($i=0; $i < count($kpi_data); $i++) { 
					$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($kpi_data[$i]['Employee_id'],$settings_data['0']['setting_type']);
					$kpi_data_edit = $model1->get_kpi_list($where,$data,$list);

					$where = 'where Employee_id = :Employee_id';
					$list = array('Employee_id');
					$data = array($kpi_data[$i]['Employee_id']);
					$emp_data[$i] = $emploee_data->get_employee_data($where,$data,$list);
				}
			}
		}

		
if (Yii::app()->user->getState("Employee_id")!='') 
		{
		$selected_option = 'Assigndetails';
                //print_r($emp_data);die();
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		//$this->render('//site/baseurl');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/assign_view',array('kpi_data_edit'=>$kpi_data_edit,'employee_list'=>$emp_data));   
		}
		else{
		$model=new LoginForm;
		$this->render('//site/baseurl');
		$this->render('//site/user_login_view',array('model'=>$model));
		}             
    }
}
?>