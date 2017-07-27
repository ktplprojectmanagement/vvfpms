<?php

class SubordinateController extends Controller
{
	public function actionyearendlist()
	{
		$emploee_data =new EmployeeForm;
		$kpi_emp_list =new KpiAutoSaveForm;
		$Yearend_reviewb =new Yearend_reviewbForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");$kpi_data = '';$kpi_emp_data = '';$emp_kra_data='';
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$apr_details = $emploee_data->get_employee_data($where,$data,$list);
		if (count($apr_details)>0) {
			$where = 'where KRA_status_flag = :KRA_status_flag GROUP BY `Employee_id`';
			$list = array('KRA_status_flag');
			$data = array('3');
			$kpi_data = $kpi_emp_list->get_kpi_list($where,$data,$list);

			if (count($kpi_data)>0) {
			for ($j=0; $j < count($kpi_data); $j++) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_data[$j]['Employee_id']);
				$kpi_emp_data[$j] = $emploee_data->get_employee_data($where,$data,$list);

				$where1 = 'where Employee_id = :Employee_id';
				$list1 = array('Employee_id');
				$data1 = array($kpi_data[$j]['Employee_id']);
				$emp_kra_data[$j] = $kpi_emp_list->get_kpi_list($where1,$data1,$list1);
			}
			}			
		}
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_list',array('kpi_data'=>$kpi_data,'kpi_emp_data'=>$kpi_emp_data,'emp_kra_data'=>$emp_kra_data));
		$this->render('//site/footer_view_layout');
	}

	function actionyearend_reviewb()
	{
		$emploee_data =new EmployeeForm;
		$kpi_emp_list =new KpiAutoSaveForm;
		$Yearend_reviewb =new Yearend_reviewbForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");$kpi_data = '';$kpi_emp_data = '';$emp_kra_data='';
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$apr_details = $emploee_data->get_employee_data($where,$data,$list);
		if (count($apr_details)>0) {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and goal_set_year = :goal_set_year GROUP BY `Employee_id`';
			//$where = 'where year_end_reviewb_status = :year_end_reviewb_status and goal_set_year = :goal_set_year GROUP BY `Employee_id`';
			$list = array('Reporting_officer1_id','goal_set_year');
			$data = array(Yii::app()->user->getState("appriaser_1"),date('Y'));
			$kpi_data = $Yearend_reviewb->get_kpi_list($where,$data,$list);
			//print_r($kpi_data);die();
			if (count($kpi_data)>0) {
			for ($j=0; $j < count($kpi_data); $j++) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_data[$j]['Employee_id']);
				$kpi_emp_data[$j] = $emploee_data->get_employee_data($where,$data,$list);

				$where1 = 'where Employee_id = :Employee_id';
				$list1 = array('Employee_id');
				$data1 = array($kpi_data[$j]['Employee_id']);
				$emp_kra_data[$j] = $kpi_emp_list->get_kpi_list($where1,$data1,$list1);
			}
			}			
		}
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/year_end_list_reviewb',array('kpi_data'=>$kpi_data,'kpi_emp_data'=>$kpi_emp_data,'emp_kra_data'=>$emp_kra_data));
		$this->render('//site/footer_view_layout');
	}

	function actionyearendb_review($employee_id = null)
	{
		$emploee_data =new EmployeeForm;
		$kpi_emp_list =new KpiAutoSaveForm;
		$normalize =new NormalizeRatingForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($employee_id);
		$kpi_emp_data = $emploee_data->get_employee_data($where,$data,$list);

		$where1 = 'where Employee_id = :Employee_id and KRA_status_flag = :KRA_status_flag';
		$list1 = array('Employee_id','KRA_status_flag');
		$data1 = array($employee_id,'3');
		$emp_kra_data = $kpi_emp_list->get_kpi_list($where1,$data1,$list1);
		//print_r($emp_kra_data['0']['Employee_id']);die();
		$settings_data = new SettingsForm;
		$where1 = 'where setting_content = :setting_content and year = :year';
		$list1 = array('setting_content','year');
		$data2 = array('min_kra_required',date('Y'));
		$kra_data = $settings_data->get_setting_data($where1,$data2,$list1);
		$apr_end_rating = 0;
		for ($i=0; $i < count($emp_kra_data); $i++) { 
			if ($apr_end_rating == 0) {
				$apr_end_rating = $emp_kra_data[$i]['appraiser_avrage_end'];
			}
			else
			{
				$apr_end_rating = $apr_end_rating + $emp_kra_data[$i]['appraiser_avrage_end'];
			}
		}
		$apr_end_rating = $apr_end_rating/count($emp_kra_data);
		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($employee_id);
		$normalize_data = $normalize->get_setting_data($where1,$data2,$list1);
		//print_r($normalize_data);die();
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/partb_review',array('kra_data'=>$kra_data,'kpi_emp_data'=>$kpi_emp_data,'emp_kra_data'=>$emp_kra_data,'apr_end_rating'=>$apr_end_rating,'normalize_data'=>$normalize_data));
		$this->render('//site/footer_view_layout');
	}
}
