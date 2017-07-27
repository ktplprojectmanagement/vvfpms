<?php

class PromotionController extends Controller
{
	public function actionemployee_list()
	{
		$emploee_data =new EmployeeForm;
		$kpi_emp_list =new KpiAutoSaveForm;
		$Yearend_reviewb =new Yearend_reviewbForm;
		$model =new NormalizeRatingForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");$emp_data = '';
		$where = 'where career_planning = :career_planning';
		$list = array('career_planning');
		$data = array('Promotion');
		$promotion_list = $model->get_setting_data($where,$data,$list);
		if (count($promotion_list)>0) {
			for ($j=0; $j < count($promotion_list); $j++) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($promotion_list[$j]['Employee_id']);
				$emp_data[$j] = $emploee_data->get_employee_data($where,$data,$list);
			}
		}
		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/emp_list_for_promotion',array('emp_data'=>$emp_data));
		$this->render('//site/footer_view_layout');
	}

	function actionpromotion_form($Employee_id = null)
	{
		$emploee_data =new EmployeeForm;
		$model = new PromotionForm;
		$emp_data = '';
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $emploee_data->get_employee_data($where,$data,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_promotion_data = $model->get_employee_data($where,$data,$list);

		$selected_option = 'year end review';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/promotion_form',array('emp_data'=>$emp_data,'emp_promotion_data'=>$emp_promotion_data));
		$this->render('//site/footer_view_layout');
	}

	function actionsubmit_data()
	{
		$model = new PromotionForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['emp_id']);
		$emp_data = $model->get_employee_data($where,$data,$list);

		if (count($emp_data)>0) {
			$data1 = array(
				'field1' => $_POST['field1'], 
				'field2' => $_POST['field2'], 
				'field3' => $_POST['field3'], 
				'field4' => $_POST['field4'], 
				'field5' => $_POST['field5'], 
				'field6' => $_POST['field6'], 
				'field7' => $_POST['field7'],  
				'field8' => $_POST['field8'],
			);
			$update = Yii::app()->db->createCommand()->update('promotion_form_data',$data1,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['emp_id']));
			if ($update == 1) {
				echo "update";
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			$model->field1 = $_POST['field1'];
			$model->field2 = $_POST['field2'];
			$model->field3 = $_POST['field3'];
			$model->field4 = $_POST['field4'];
			$model->field5 = $_POST['field5'];
			$model->field6 = $_POST['field6'];
			$model->field7 = $_POST['field7'];
			$model->field8 = $_POST['field8'];
			$model->Employee_id = $_POST['emp_id'];
			if ($model->save()) {
				echo "success";
			}
			else
			{
				echo "error";
			}
		}
		
	}

	
}
