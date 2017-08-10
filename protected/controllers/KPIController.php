<?php

class KPIController extends Controller
{
	public function actionKPI_create()
	{		
		
			$model=new KpiListForm;
			$employee = new EmployeeForm;
			$employee_result = $employee->getdata();
			$kra_result = $model->get_all_kra();
			$appraiser_list = $employee->get_appraiser_list();
			$appraiser_list_data = '';
			$employee_list = '';
			$cnt = 0;
			if (count($appraiser_list)>0) {
				for ($i=0; $i < count($appraiser_list); $i++) {
				$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
				$list = array('Reporting_officer1_id');
				$data = array($appraiser_list[$i]['Reporting_officer1_id']);
				$employee_list[$i] = $employee->get_employee_data($where,$data,$list);
				}
			}
			if (count($appraiser_list)>0) {
				$cnt = 0;
				for ($i=0; $i < count($appraiser_list); $i++) {
				$where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($appraiser_list[$i]['Reporting_officer1_id']);
				$appraiser_list_data[$cnt] = $employee->get_employee_data($where,$data,$list);
				$cnt++;
				}
			}

			$diff_Department = $employee->get_department_list();
			$diff_cluster = $employee->get_distinct_list('cluster_name','where 1');

			$selected_option = 'kpi_set';
			$this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/KPI_form',array('model'=>$model,'employee_list'=>$employee_result,'kra_result'=>$kra_result,'employee_list_data'=>$employee_list,'appraiser_list'=>$appraiser_list_data,'diff_Department'=>$diff_Department,'diff_cluster'=>$diff_cluster));
			$this->render('//site/admin_footer_view');
		
	}

	function actionkra_list()
	{
		$employee = new EmployeeForm;
		$cluster = new ClusterForm;
		$kra=new KRAStructureForm;		
		$kra_data = $kra->get_all_kra();
		$appraiser_list_data = 0;
		for ($i=0; $i < count($kra_data); $i++) { 
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($kra_data[$i]['applicable_to']);
			$appraiser_list_data[$i] = $employee->get_employee_data($where,$data,$list);
		}


		$cluster_list = $cluster->get_list('cluster_name');		
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/kra_assigned_list',array('kra_data'=>$kra_data,'appraiser_list_data'=>$appraiser_list_data));
	}

	function actiongetdata()
	{
		$employee = new EmployeeForm;
		if ($_POST['Department'] == 'All' && $_POST['cluster_name'] == 'All') {
			$dept_vise_emp_data = $employee->getdata();
		}
		else if($_POST['Department'] != 'All' && $_POST['cluster_name'] == 'All')
		{
			$where = 'where Department = :Department';
			$list = array('Department');
			$data = array($_POST['Department']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] == 'All' && $_POST['cluster_name'] != 'All') {
			$where = 'where cluster_name = :cluster_name';
			$list = array('cluster_name');
			$data = array($_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All') {
			$where = 'where Department = :Department and cluster_name = :cluster_name';
			$list = array('Department','cluster_name');
			$data = array($_POST['Department'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		$print_data = '';
		foreach ($dept_vise_emp_data as $row) {
			if ($print_data == '') {
				$tr = '<tr>';
				$td = '<td><input id="checkbox1" class="md-check" type="checkbox" value="'.$row['Employee_id'].'"></td>'.'<td>'.$row['Employee_id'].'</td>'.'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $tr.$td.$cls_tr;
			}
			else
			{
				$tr = '<tr>';
				$td = '<td><input id="checkbox1" class="md-check" type="checkbox" value="'.$row['Employee_id'].'"></td>'.'<td>'.$row['Employee_id'].'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>';
				$cls_tr = '</tr>';
				$print_data = $print_data.$tr.$td.$cls_tr;
			}			
		}
		print_r($print_data);
	}

	function actionkra_requst()
	{
		$employee = new NotificationsForm;
		$emp_id = explode(',',$_POST['emp_list']);
		$update = 0;
		for($i=0;$i<count($emp_id);$i++)
		{
			$employee = new NotificationsForm;
			$employee->chk_flag = '0';
			$employee->notification_type = 'Goal Setting Pending';
			$employee->Employee_id = $emp_id[$i];
			$employee->applicable_till =$_POST['applicable_date'];
			$employee->date = date('Y-m-d');
			$employee->save();	
			$update++;		
		}
		print_r($update);
	}


	function actionupdate_kra()
	{
		$employee = new KRAStructureForm;
		$del_result = Yii::app()->db->createCommand()->delete('KRA_structure','applicable_to=:applicable_to', array(':applicable_to'=>$_POST['applicable_to']));
		print_r($del_result);
	}

	public function actionkra_update()
	{
		$model=new KpiListForm;
		$data = array(
			'No_of_KPI' => $_POST['kpi_number'], 
			'KRA_category' => $_POST['catergory'],
			'minimum_kpi' => $_POST['minimum_kpi'],
			'maximum_kpi' => $_POST['maximum_kpi'],
		);
		$update = Yii::app()->db->createCommand()->update('KRA_structure',$data,'KRA_id=:KRA_id',array(':KRA_id'=>$_POST['KRA_id']));
		print_r($update);die();
	}

	public function actionkpi_del()
	{
		$model=new KpiListForm;		
		print_r(Yii::app()->db->createCommand()->delete('kpi_list','KPI_id=:KPI_id', array(':KPI_id'=>$_POST['KPI_id'])));die();
		$del_result = Yii::app()->db->createCommand()->delete('kpi_list','KPI_id=:KPI_id', array(':KPI_id'=>$_POST['KPI_id']));
		print_r($del_result);die();
	}

	public function actioKPI_edit($KPI_id = NULL)
	{
		$model=new KpiListForm;
		$kra_result = $model->get_all_kra();
		$where = ' where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data = array($KPI_id);
		$kra_edit_result = $model->get_kra_data($where,$data,$list);
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/KPI_form',array('model'=>$model,'kra_edit_result'=>$kra_edit_result,'kra_result'=>$kra_result));
	}

	public function actionKPI_save()
	{
		$model=new KpiListForm;
		$model->kpi_name = $_POST['kpi_name'];
		$model->kpi_description = $_POST['kpi_description'];
		$model->department = $_POST['department'];
		$model->KPI_creation_date = date('Y-m-d');
		$model->KPI_id = uniqid();
		if($model->validate())
		{
			if($model->save())
			{
				print_r('success');
			}
		}
		else
		{
				print_r(json_encode($model->getErrors()));die();
		}
		
	}

	public function actionemp_list()
	{
		$model=new KRAStructureForm;
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/employee_popup',array('model'=>$model));
	}
	public function actionget_kra_list()
	{
		$model=new KRAStructureForm;
		$list_data = '';		
		$wt_format = array('Percentage'=>'Percentage', 'Score'=>'Score');
		$applicable_to = array('Organization Chart'=>'Organization Chart', 'Custom'=>'Custom', 'All'=>'All');
		if (isset($_POST['No_of_KPI'])) {
			for ($i=0; $i < $_POST['No_of_KPI']; $i++) { 
				if ($list_data == '') {
					$list_data = "<tr><td>".CHtml::textField('KRA_category'.$i,'',array('class'=>'form-control','id'=>'KRA_category_'.$i))."</td>"."<td>".CHtml::textField("No_of_KPI".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::textField("minimum_kpi".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::textField("maximum_kpi".$i,'',$htmlOptions=array('class'=>"form-control"))."</td></tr>";
				}
				else
				{
					$list_data = $list_data."<tr><td>".CHtml::textField('KRA_category'.$i,'',array('class'=>'form-control','id'=>'KRA_category_'.$i))."</td>"."<td>".CHtml::textField("No_of_KPI".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::textField("minimum_kpi".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::textField("maximum_kpi".$i,'',$htmlOptions=array('class'=>"form-control"))."</td></tr>";
				}
							
			}
			echo $list_data;
			
		}
	}
	
}
