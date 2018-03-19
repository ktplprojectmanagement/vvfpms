<?php

	class NormalizedController extends Controller
	{

	public function actionIndex()
	{
	
		ini_set('memory_limit', '-1');
		$model=new KRAStructureForm;
		$employee = new EmployeeForm;
		$cluster_name = new ClusterForm;
		$normalize_rating =new NormalizeRatingForm;
		$IDPForm =new IDPForm;

		$employee_result = $employee->getdata();
		$kra_result = $model->get_all_kra();
		$appraiser_list = $employee->get_appraiser_list();
		$appraiser_list_data = '';
		$employee_list = '';$normalize_rating_data = '';$pending_list1 = '';$chk_user_cls11='';
		$cnt = 0;$pending_msg = '';
		$bu_Employee_id = Yii::app()->user->getState("Employee_id");
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($bu_Employee_id);
		$bu_dept_data = $employee->get_employee_data($where,$data,$list);

		$bu_dept_data = $employee->get_employee_data($where,$data,$list);

		$data['chk_user_cls'] = '';$bu_flag = 0;$cluster_flag = 0;$kpi_data_pending=0;

		$users = Yii::app()->db->createCommand()->select("joining_date")->from('Employee')->queryAll();
		//print_r($users);
		//	die();	
		$day = 31;
		$month = 03;
		$year = date('Y');

		$date = mktime(12, 0, 0, $month, $day, $year);
		$today_date_val = date('Y').'-03-'.'31';
	

		if(Yii::app()->user->getState("employee_email") == 'mohit.sharma@vvfltd.com' )
		{
			$chk_user_cls11 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_status != "Resign" and bu_head_email != "undefined" and plant_head_email != "undefined" and cluster_appraiser !="undefined" and pms_status != "Inactive"')->order('cluster_name')->queryAll();
			$cnt_num = 0;
			for($e=0;$e<count($chk_user_cls11);$e++)
			{
				if(date('Y-m-d',strtotime($chk_user_cls11[$e]['joining_date']))<'2016-10-01' && $chk_user_cls11[$e]['joining_date']!="#N/A")
				{
				$chk_user_cls1[$cnt_num] = $chk_user_cls11[$e];
				$cnt_num++;
				}

			}
		
		}
		else if(Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com')
		{
			$serial_nos = array('10000687,10000714,10000737,10002768,10002800,10002914,10003231,10003281,10003368,10003630,10003791,10003819,10002957,10002744,10002013');
			$serial_nos = implode($serial_nos);
			$chk_user_cls11 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_status != "Resign" and bu_head_email != "undefined" and plant_head_email != "undefined" and cluster_appraiser !="undefined" and Employee_id NOT IN ('.$serial_nos.') and pms_status != "Inactive"')->order('cluster_name')->queryAll();
			$cnt_num = 0;
			for($e=0;$e<count($chk_user_cls11);$e++)
			{
				if(date('Y-m-d',strtotime($chk_user_cls11[$e]['joining_date']))<'2016-10-01' && $chk_user_cls11[$e]['joining_date']!="#N/A")
				{
					$chk_user_cls1[$cnt_num] = $chk_user_cls11[$e];
					$cnt_num++;
				}
			}
		}
		else
		{
			if (isset($bu_dept_data['0']['Email_id'])) 
			{
				$where = 'where bu_head_email = :bu_head_email and Employee_status != :Employee_status  and pms_status !=:pms_status order by `cluster_name`';
				$list = array('bu_head_email','Employee_status','pms_status');
				$data = array($bu_dept_data['0']['Email_id'],'Resign','Inactive');
				$chk_user_cls11 = $employee->get_employee_data($where,$data,$list);
			}

			$cnt_num = 0;
			if(isset($chk_user_cls11))
			{
				for($e=0;$e<count($chk_user_cls11);$e++)
				{
					if(isset($chk_user_cls11[$e]) && date('Y-m-d',strtotime($chk_user_cls11[$e]['joining_date']))<'2016-10-01' && $chk_user_cls11[$e]['joining_date']!="#N/A")
					{
					$chk_user_cls1[$cnt_num] = $chk_user_cls11[$e];
					$cnt_num++;
					}

				}
			}

		}


		if(isset($bu_dept_data['0']['Email_id']))
		{
			$where = 'where cluster_appraiser = :cluster_appraiser and Employee_status != :Employee_status and pms_status !=:pms_status order by `cluster_name`';
			$list = array('cluster_appraiser','Employee_status','pms_status');
			$data = array($bu_dept_data['0']['Email_id'],'Resign','Inactive');
			$chk_user_cls21 = $employee->get_employee_data($where,$data,$list);
		}

		$cnt_num = 0;
		if(isset($chk_user_cls21[$e]))
		{
			for($e=0;$e<count($chk_user_cls21);$e++)
			{
				if(isset($chk_user_cls21[$e]) && date('Y-m-d',strtotime($chk_user_cls21[$e]['joining_date']))<'2016-10-01' && $chk_user_cls21[$e]['joining_date']!="#N/A")
				{
					$chk_user_cls2[$cnt_num] = $chk_user_cls21[$e];
					$cnt_num++;
				}

			}
		}					

		if(isset($bu_dept_data['0']['Email_id']))
		{
			$where = 'where plant_head_email = :plant_head_email and Employee_status != :Employee_status and pms_status !=:pms_status order by `cluster_name`';
			$list = array('plant_head_email','Employee_status','pms_status');
			$data = array($bu_dept_data['0']['Email_id'],'Resign','Inactive');
			$chk_user_cls31 = $employee->get_employee_data($where,$data,$list);
		}
		$cnt_num = 0;
		if(isset($chk_user_cls31))
		{
			for($e=0;$e<count($chk_user_cls31);$e++)
			{
				if(isset($chk_user_cls21[$e]) && date('Y-m-d',strtotime($chk_user_cls31[$e]['joining_date']))<'2016-10-01' && $chk_user_cls31[$e]['joining_date']!="#N/A")
				{
					$chk_user_cls3[$cnt_num] = $chk_user_cls21[$e];
					$cnt_num++;
				}

			}
		}


		if(isset($chk_user_cls1) && count($chk_user_cls1)>0)
		{
			$bu_flag = 1;
			$employee_list = $chk_user_cls1;
			$chk_user_cls = $chk_user_cls1;
		}
		else if(isset($chk_user_cls2) && count($chk_user_cls2)>0)
		{
			$cluster_flag = 1;
			$employee_list = $chk_user_cls2;
			$chk_user_cls = $chk_user_cls2;
		}	
		else if(isset($chk_user_cls3) && count($chk_user_cls3)>0)
		{
			$cluster_flag = 1;
			$employee_list = $chk_user_cls3;
			$chk_user_cls = $chk_user_cls3;
		}	

	
		if(isset($employee_result) && count($employee_result)>0 && isset($chk_user_cls))
		{				
			for ($j=0; $j < count($chk_user_cls); $j++) 
			{ 
				if (isset($chk_user_cls[$j]['Employee_id'])) 
				{
					$where1 = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year ORDER BY `rating` DESC';
					$list1 = array('Employee_id','goal_set_year');
					$data2 = array($chk_user_cls[$j]['Employee_id'],Yii::app()->user->getState('financial_year_check'));
					$normalize_rating_data[$j] = $normalize_rating->get_setting_data($where1,$data2,$list1);
				}	
				if (isset($chk_user_cls[$j]['Employee_id'])) 
				{
					$where1 = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year';
					$list1 = array('Employee_id','goal_set_year');
					$data2 = array($chk_user_cls[$j]['Employee_id'],Yii::app()->user->getState('financial_year_check'));
					$IDP_data[$j] = $IDPForm->get_idp_data($where1,$data2,$list1);
				}
			}
		}
		$pending_list = '';
		
		if (isset($IDP_data) && isset($chk_user_cls) && !(count($IDP_data)==count($chk_user_cls)))
		{
			$kpi_data_pending++;
		}	
		$k=0;
		for ($i=0; $i < count($IDP_data); $i++) 
		{
			if (isset($IDP_data[$i]['0']['Tota_score'])) {
				if ($IDP_data[$i]['0']['Tota_score'] == '' || $IDP_data[$i]['0']['Tota_score'] === 'undefined') 
				{
					$kpi_data_pending++;
					if(isset($IDP_data[$i]['0']['Employee_id']))
					{
						$pending_list[$k] = $IDP_data[$i]['0']['Employee_id'];
					}
					$k++;
				}						
			}
		}

		$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
		$list = array('Reporting_officer1_id');
		$data = array('mssadafule@gmail.com');
		$head_branch_data = $employee->get_employee_data($where,$data,$list);

		$diff_Department = $employee->get_department_list();
		$diff_cluster = $cluster_name->get_distinct_list('cluster_name','where 1');
		$diff_reporting_head = $employee->get_distinct_list('Reporting_officer1_id','where 1');
		$dep_head_data = '';
		for ($i=0; $i < count($diff_reporting_head); $i++) 
		{ 
			if(isset($diff_reporting_head[$i]['Reporting_officer1_id']))
			{
				$where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($diff_reporting_head[$i]['Reporting_officer1_id']);
				$dep_head_data[$i] = $employee->get_employee_data($where,$data,$list);
			}				
		}

		for ($i=0; $i < count($pending_list); $i++) 
		{ 
			if(isset($pending_list[$i]))
			{
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($pending_list[$i]);
				$pending_list1[$i] = $employee->get_employee_data($where,$data,$list);
			}

		}

			
		$this->render('//site/header_view_layout');
		$this->render('//site/normalize_layout_view',array('model'=>$model,'bu_flag'=>$bu_flag,'cluster_flag'=>$cluster_flag,'employee_list'=>$employee_list,'kra_result'=>$kra_result,'employee_list_data'=>$employee_list,'appraiser_list'=>$appraiser_list_data,'diff_Department'=>$diff_Department,'head_branch_data'=>$head_branch_data,'diff_cluster'=>$diff_cluster,'diff_reporting_head'=>$diff_reporting_head,'dep_head_data'=>$dep_head_data,'normalize_rating_data'=>$normalize_rating_data,'IDPForm_data'=>$IDP_data,'kpi_data_pending'=>$kpi_data_pending,'pending_list'=>$pending_list1));
		$this->render('//site/footer_view_layout') ;

	}
}
?>