<?php

class NormalizedController extends Controller
{
	
	public function actionIndex()
	{
		$employee=new EmployeeForm;
		$model=new KpiAutoSaveForm;	
		$where = 'where Department = :Department';
		$list = array('Department');
		$data = array('Oleo Finance');
		$emp_data = $employee->get_employee_data($where,$data,$list);

		for ($i=0; $i < count($emp_data); $i++) { 
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($emp_data[$i]['Employee_id'],'2016-2017');
			$kpi_data[$i] = $model->get_kpi_list($where,$data,$list);
		}
		print_r($kpi_data);die();
		$this->render('//site/normalize_layout_view');                
    }
}
?>