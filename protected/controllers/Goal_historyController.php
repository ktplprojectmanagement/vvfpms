<?php

class Goal_historyController extends Controller
{
	public function actionIndex()
	{
		$date = date('d/m/Y');
		$date = str_replace('/', '-', $date);
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$kra_types_array = '';$data = '';

		
		$KRA_date = $model->get_distinct_list('KRA_date','where Employee_id = "'.$Employee_id.'"');
		
		$selected_option = 'Goals_history';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/goal_history',array('model'=>$model,'kra_list'=>$kra_types,'kpi_data'=>$kpi_data,'KRA_date'=>$KRA_date));
		$this->render('//site/footer_view_layout');
		
	}

	function actiongetdata()
	{
		$dept_vise_emp_data = '';
		$model=new KpiAutoSaveForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");	

		if ($_POST['get_year'] == 'All') {
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$dept_vise_emp_data = $model->get_kpi_list($where,$data,$list);
		}		
		else if ($_POST['get_year'] != 'All') {			
			$where = 'where Employee_id = :Employee_id and KRA_date = :KRA_date';
			$list = array('Employee_id','KRA_date');
			$data = array($Employee_id,$_POST['get_year']);
			$dept_vise_emp_data = $model->get_kpi_list($where,$data,$list);
		}

		$print_data = '';
		$cnt = 0;
		foreach ($dept_vise_emp_data as $row) {
			if ($print_data == '') {
				$table1_content = '';
				$table2_content = '';
				$table3_content = '';
				$kpi_list_data = explode(';',$row['kpi_list']);
                $kpi_list_unit = explode(';',$row['target_unit']);
                $target_value1 = explode(';',$row['target_value1']);
				$table1_strt = '<table>';
				$cnt_count = 0;
				for ($i=0; $i < count($kpi_list_data); $i++) { $cnt_count++;
					if($table1_content == '')
					{
						$table1_content = '<tr><td>'.$cnt_count.')</td><td>'.$kpi_list_data[$i].'</td></tr>';
					}
					else
					{
						$table1_content = $table1_content.'<tr><td>'.$cnt_count.')</td><td>'.$kpi_list_data[$i].'</td></tr>';
					}
				}
				
				$table1_end = '</table>';
				$table2_strt = '<table>';
				$cnt_count1 = 0;
				for ($i=0; $i < count($kpi_list_unit); $i++) { $cnt_count1++;
					if($table2_content == '')
					{
						$table2_content = '<tr><td>'.$kpi_list_unit[$i].'</td></tr>';
					}
					else
					{
						$table2_content = $table2_content.'<tr><td>'.$kpi_list_unit[$i].'</td></tr>';
					}
				}
				
				$table2_end = '</table>';
				$table3_strt = '<table>';
				$cnt_count2 = 0;
				for ($i=0; $i < count($target_value1); $i++) { $cnt_count2++;
					if($table3_content == '')
					{
						$table3_content = '<tr><td>'.$target_value1[$i].'</td></tr>';
					}
					else
					{
						$table3_content = $table3_content.'<tr><td>'.$target_value1[$i].'</td></tr>';
					}
				}
				
				$table3_end = '</table>';
				$tr = '<tr>';
				$td = '<td>'.$row['KRA_category'].'</td>'.'<td>'.$table1_strt.$table1_content.$table1_end.'</td>'.'<td>'.$table2_strt.$table2_content.$table2_end.'</td>'.'<td>'.$table3_strt.$table3_content.$table3_end.'</td>'.'<td>'.$row['KRA_description'].'</td>'.'<td>'.$row['target'].'</td>'.'<td>'.$row['KRA_date'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $tr.$td.$cls_tr;
			}
			else
			{
				$tr = '<tr>';
				$td = '<td>'.$row['KRA_category'].'</td>'.'<td>'.$table1_strt.$table1_content.$table1_end.'</td>'.'<td>'.$table2_strt.$table2_content.$table2_end.'</td>'.'<td>'.$table3_strt.$table3_content.$table3_end.'</td>'.'<td>'.$row['KRA_description'].'</td>'.'<td>'.$row['target'].'</td>'.'<td>'.$row['KRA_date'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $print_data.$tr.$td.$cls_tr;
			}
			$cnt++;			
		}
		print_r($print_data);
	}

	function actiongetdata1()
	{
		$dept_vise_emp_data = '';
		$model=new KpiAutoSaveForm;
		$Employee_id = $_POST['emp_id'];	

		if ($_POST['get_year'] == 'All') {
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$dept_vise_emp_data = $model->get_kpi_list($where,$data,$list);
		}		
		else if ($_POST['get_year'] != 'All') {			
			$where = 'where Employee_id = :Employee_id and KRA_date = :KRA_date';
			$list = array('Employee_id','KRA_date');
			$data = array($Employee_id,$_POST['get_year']);
			$dept_vise_emp_data = $model->get_kpi_list($where,$data,$list);
		}

		$print_data = '';
		$cnt = 0;
		foreach ($dept_vise_emp_data as $row) {
			if ($print_data == '') {
				$table1_content = '';
				$table2_content = '';
				$table3_content = '';
				$kpi_list_data = explode(';',$row['kpi_list']);
                $kpi_list_unit = explode(';',$row['target_unit']);
                $target_value1 = explode(';',$row['target_value1']);
				$table1_strt = '<table>';
				$cnt_count = 0;
				for ($i=0; $i < count($kpi_list_data); $i++) { $cnt_count++;
					if($table1_content == '')
					{
						$table1_content = '<tr><td>'.$cnt_count.')</td><td>'.$kpi_list_data[$i].'</td></tr>';
					}
					else
					{
						$table1_content = $table1_content.'<tr><td>'.$cnt_count.')</td><td>'.$kpi_list_data[$i].'</td></tr>';
					}
				}
				
				$table1_end = '</table>';
				$table2_strt = '<table>';
				$cnt_count1 = 0;
				for ($i=0; $i < count($kpi_list_unit); $i++) { $cnt_count1++;
					if($table2_content == '')
					{
						$table2_content = '<tr><td>'.$kpi_list_unit[$i].'</td></tr>';
					}
					else
					{
						$table2_content = $table2_content.'<tr><td>'.$kpi_list_unit[$i].'</td></tr>';
					}
				}
				
				$table2_end = '</table>';
				$table3_strt = '<table>';
				$cnt_count2 = 0;
				for ($i=0; $i < count($target_value1); $i++) { $cnt_count2++;
					if($table3_content == '')
					{
						$table3_content = '<tr><td>'.$target_value1[$i].'</td></tr>';
					}
					else
					{
						$table3_content = $table3_content.'<tr><td>'.$target_value1[$i].'</td></tr>';
					}
				}
				
				$table3_end = '</table>';
				$tr = '<tr>';
				$td = '<td>'.$row['KRA_category'].'</td>'.'<td>'.$table1_strt.$table1_content.$table1_end.'</td>'.'<td>'.$table2_strt.$table2_content.$table2_end.'</td>'.'<td>'.$table3_strt.$table3_content.$table3_end.'</td>'.'<td>'.$row['KRA_description'].'</td>'.'<td>'.$row['target'].'</td>'.'<td>'.$row['KRA_date'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $tr.$td.$cls_tr;
			}
			else
			{
				$tr = '<tr>';
				$td = '<td>'.$row['KRA_category'].'</td>'.'<td>'.$table1_strt.$table1_content.$table1_end.'</td>'.'<td>'.$table2_strt.$table2_content.$table2_end.'</td>'.'<td>'.$table3_strt.$table3_content.$table3_end.'</td>'.'<td>'.$row['KRA_description'].'</td>'.'<td>'.$row['target'].'</td>'.'<td>'.$row['KRA_date'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $print_data.$tr.$td.$cls_tr;
			}
			$cnt++;			
		}
		print_r($print_data);
	}
}

?>
