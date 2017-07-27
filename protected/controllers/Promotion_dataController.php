<?php

class Promotion_dataController extends Controller
{
	public function actionindex()
	{
		$promotion = new PromotionForm;
		$employee = new EmployeeForm;
		$emp_promotion_data = $promotion->getdata();
$bu_id = Yii::app()->user->getState("Employee_id");
$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($bu_id);
		$BU_data = $employee->get_employee_data($where,$data,$list);

$where = 'where BU = :BU';
		$list = array('BU');
		$data = array($BU_data['0']['BU']);
		$BU_count = $employee->get_employee_data($where,$data,$list);

//print_r($BU_count);die();

                if(isset($emp_promotion_data) && count($emp_promotion_data)>0)
                {
                for($i = 0;$i<count($emp_promotion_data);$i++)
                {
                $where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($emp_promotion_data[$i]['Employee_id']);
		$emp_promotion_data1[$i] = $employee->get_employee_data($where,$data,$list);
                }
                }

		
		$selected_option = 'promotion';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/admin_promotion',array('promotion_data'=>$emp_promotion_data,'emp_promotion_data'=>$emp_promotion_data1,'bu_data'=>$BU_count));   
		$this->render('//site/admin_footer_view');	
	}
	
}
