<?php

class KRAController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function actionkra_create()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$model=new KRAStructureForm;
		$employee = new EmployeeForm;
		$employee_result = $employee->getdata();
		$kra_result = $model->get_all_kra();
		//print_r($employee_result);die();
		//$this->render('//site/header');
		$this->render('//site/script_file');
		//$this->render('//site/header_view');
		$this->render('//site/KRA_form',array('model'=>$model,'employee_list'=>$employee_result,'kra_result'=>$kra_result));
		//$this->render('//site/footer');
	}

	function actiongetdata()
	{
		print_r("ajax executed");die();
	}

	public function actionkra_update()
	{
		//print_r($_POST['KRA_id']);die();
		// if (isset($_POST['KRA_id'])) {
		// 	$KRA_id = $_POST['KRA_id'];
		// 	print_r($_POST['KRA_id']);die();
		// }
		$model=new KRAStructureForm;
		$data = array(
			'No_of_KPI' => $_POST['kpi_number'], 
			'KRA_category' => $_POST['catergory'],
		);
		// $where = ' where KRA_id = :KRA_id';
		// $list = array('KRA_id');
		// $data = array($_POST['KRA_id']);
		$update = Yii::app()->db->createCommand()->update('KRA_structure',$data,'KRA_id=:KRA_id',array(':KRA_id'=>$_POST['KRA_id']));
		//$kra_edit_result = $model->get_kra_data($where,$data,$list);
		print_r($update);die();
		//$this->render('//site/KRA_form',array('model'=>$model,'kra_edit_result'=>$kra_edit_result));
	}

	public function actionkra_del()
	{
		$model=new KRAStructureForm;
		//$connection=Yii::app()->db;
		//print_r($_POST['KRA_id']);die();
		$del_result = Yii::app()->db->createCommand()->delete('KRA_structure','KRA_id=:KRA_id', array(':KRA_id'=>$_POST['KRA_id']));
		print_r($del_result);die();
	}

	public function actionkra_edit($KRA_id = NULL)
	{
		//print_r($KRA_id);die();
		// 	$KRA_id = $_POST['KRA_id'];
		// 	print_r($_POST['KRA_id']);die();
		// }
		$model=new KRAStructureForm;
		$kra_result = $model->get_all_kra();
		$where = ' where KRA_id = :KRA_id';
		$list = array('KRA_id');
		$data = array($KRA_id);
		$kra_edit_result = $model->get_kra_data($where,$data,$list);
		//print_r($kra_result);die();
		$this->render('//site/KRA_form',array('model'=>$model,'kra_edit_result'=>$kra_edit_result,'kra_result'=>$kra_result));
	}

	public function actionsave_kra()
	{
		
		// $model->KRA_category = 'hjkhjk';
		// 			print_r($model->attributes);
		//model->KRA_category = 'HGJG';
					//print_r($model->KRA_category);
					// $model->KRA_category = 'hgjh';
					// $model->KRP_wt_format = 'FHJ';
					// $model->Weightage = '4';
					// $model->No_of_KPI = '5';
					// $model->KRA_id = '34';	
					// $model->applicable_to = 'FSDFS';
					// $model->KRA_creation_date = '34';
					// $model->KRA_hide_date = '34';
					// $model->save();
		if (isset($_POST['details'])) {
		// 	//data = explode(',', $_POST['details'])
		$success = '';				 
		$data = explode(',',$_POST['details']);
				//print_r(count($data));die();
			for ($i=0; $i < count($data);) {
		// 		// for ($j=$i; $j < $i+4; $j++) { 
					$model=new KRAStructureForm;
					$model->KRA_category = $data[$i];
					//print_r($model->KRA_category);
					// $model->KRP_wt_format = $data[$i+1];
					// $model->Weightage = $data[$i+2];
					$model->No_of_KPI = $data[$i+1];
					$model->KRA_id = uniqid();	
					$model->KRA_creation_date = date('Y-m-d');
					//print_r($model->attributes);die();
					if ($model->save()) {
						$success = 1;
					}
					else
					{
						$success = '';
					}
				$i = $i+2;
			}
			echo $success;
			//print_r($model->attributes);die();
		}
		
	}

	public function actionemp_list()
	{
		$model=new KRAStructureForm;
		//$this->render('//site/header');
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
		if (isset($_POST['KRAStructureForm'])) {
			for ($i=0; $i < $_POST['KRAStructureForm']['No_of_KPI']; $i++) { 
				if ($list_data == '') {
					$list_data = "<tr><td>".CHtml::textField('KRA_category'.$i,'',array('class'=>'form-control','id'=>'KRA_category_'.$i))."</td>"."<td>".CHtml::textField("No_of_KPI".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::dropDownList("applicable_to".$i,'',$applicable_to,$htmlOptions=array('class'=>"form-control applicable_to",'onchange'=>'js:getemplist();'))."</td></tr>";
				}
				else
				{
					$list_data = $list_data."<tr><td>".CHtml::textField('KRA_category'.$i,'',array('class'=>'form-control','id'=>'KRA_category_'.$i))."</td>"."<td>".CHtml::textField("No_of_KPI".$i,'',$htmlOptions=array('class'=>"form-control"))."</td><td>".CHtml::dropDownList("applicable_to".$i,'',$applicable_to,$htmlOptions=array('class'=>"form-control applicable_to",'onchange'=>'js:getemplist();'))."</td></tr>";
				}
							
			}
			echo $list_data;
			
		}

		

		
		// else
		// {
		// 	print_r("dsfds0");die();
		// }
		//print_r($value);die();
	}
	
}
