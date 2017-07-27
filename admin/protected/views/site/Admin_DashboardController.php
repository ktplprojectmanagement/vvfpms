<?php

class Admin_DashboardController extends Controller
{
	
	public function actionIndex()
	{
		if(Yii::app()->user->getState("Employee_id")!='')
		{
		$kpi = new KpiAutoSaveForm;
		$kpi1 = $kpi->get_set_kpi1();
		$employee_data =new EmployeeForm;
		$kpi2=$kpi->get_pending_goal();
		$kpi3=$kpi->get_midrev_data();
		//print_r($kpi3);die();
		$kpi4=$kpi->get_midrev_data_pend();
		$yearB_rev_stat=new YearendReviewb;
		$yearB_rev_stat=$yearB_rev_stat->get_yaerb_rev_data();
		$year_appr_pend=new YearendReviewb;
		$year_appr_pend=$year_appr_pend->get_yearB_appr_pend();
		$Employee_status='Permanent';
		$where = 'where Employee_status = :Employee_status';
		$list = array('Employee_status');
		$data = array('Permanent');
		$employee_data1=$employee_data->get_employee_data($where,$data,$list);
		//print_r(count($employee_data1));die();
		$yerA_stat=$kpi->get_yearA_data();
		$yerA_appr_pend=$kpi->get_yearA_data_appr();
		$recent_ac= new NotificationsForm;
		$recent_act=$recent_ac->get_notificationdata();
		$recent_act1=$recent_ac->get_pending_notificationdata();
		$recent_act2=$recent_ac->get_approve_notificationdata();
		$recent_act3=$recent_ac->get_submitted_notificationdata();
		//print_r($recent_act2);die();
		$settings_data=new SettingsForm;
		$settings_data=$settings_data->get_all_data();
		//echo "<pre>";print_r($settings_data);die();
		for($i=0;$i<count($recent_act1);$i++){
		$Employee_id=$recent_act1[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act1[$i]['Employee_id']);
		$recent_emp1[$i]=$employee_data->get_employee_data($where,$data,$list);
		}

		for($i=0;$i<count($recent_act2);$i++){
		$Employee_id=$recent_act2[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act2[$i]['Employee_id']);
		$recent_emp2[$i]=$employee_data->get_employee_data($where,$data,$list);
		
		}

		for($i=0;$i<count($recent_act3);$i++){
		$Employee_id=$recent_act3[$i]['Employee_id'];
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($recent_act3[$i]['Employee_id']);
		$recent_emp3[$i]=$employee_data->get_employee_data($where,$data,$list);
		
		}

		//print_r($recent_emp);die();
		$this->render('//site/script_file');
		$this->render('//site/admin_header_view');
		$this->render('//site/admin_dashboard',array('kpi1'=>$kpi1,'employee_data1'=>$employee_data1,'kpi2'=>$kpi2,'kpi3'=>$kpi3,'kpi4'=>$kpi4,'recent_act'=>$recent_act,'yearB_rev_stat'=>$yearB_rev_stat,'year_appr_pend'=>$year_appr_pend,'yerA_stat'=>$yerA_stat,'yerA_appr_pend'=>$yerA_appr_pend,'settings_data'=>$settings_data,'recent_act1'=>$recent_act1,'recent_emp1'=>$recent_emp1,'recent_act2'=>$recent_act2,'recent_act3'=>$recent_act3,'recent_emp2'=>$recent_emp2,'recent_emp3'=>$recent_emp3));
		$this->render('//site/admin_footer_view');
		}
		else
		{
			$this->redirect(array('Adminlogin/Index'));
		}
		
	}

	function actionstatusget()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);
		$model = new KpiAutoSaveForm;
		$employee_data =new EmployeeForm;
		$kpi1 = new KpiAutoSaveForm;
		$kpi1 = $kpi1->get_set_kpi1();
		
		if ($value[1] == 'Submitted') {			
			
			for($i=0;$i<count($kpi1);$i++){
				$Employee_id=$kpi1[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi1[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
			
		}
		else if($value[1] == 'Pending')
		{
			$where = 'where KRA_status = :KRA_status';
			$list = array('KRA_status');
			$data = array("Pending");
			$kpi_data = $model->get_kpi_list($where,$data,$list);
			$kpi2=new KpiAutoSaveForm;
			$kpi2=$kpi2->get_pending_goal();
			for ($i=0; $i < count($kpi2); $i++) { 
				//echo count($kpi2);die();
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi2[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				//print_r($kpi_data1);die();
			}
		}
		else if($value[1] == 'Approved')
		{
			$where = 'where KRA_status = :KRA_status';
			$list = array('KRA_status');
			$data = array("Approved");
			$kpi_data = $model->get_kpi_list($where,$data,$list);
			for ($i=0; $i < count($kpi_data); $i++) { 
				$employee_data =new EmployeeForm;
				$where = 'where Employee_id != :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi_data[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				//print_r($kpi_data1);die();
			}
		}
		else if($value[1] == 'Pendingemp')
		{
			$model = new KpiAutoSaveForm;
			$emp_list = $model->get_distinct_list('Employee_id','where 1');
			//print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			//print_r($emp_all_data);die();
			$emp_id_array = '';
			if(isset($emp_list) && count($emp_list)>0)
			{
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}

		$kpi_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_id NOT IN ('.$emp_id_array.') && Employee_status="Permanent"')->queryAll();
		}
		else{
			$Employee_status='Permanent';
			$where = 'where Employee_status = :Employee_status';
			$list = array('Employee_status');
			$data = array('Permanent');
			$kpi_data1=$employee_data->get_employee_data($where,$data,$list);

		}		
		
		}

		$content = '';
			if (isset($kpi_data1) && count($kpi_data1)>0) {

				for ($i=0; $i < count($kpi_data1); $i++) { 

					if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
						
						$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
					}
					else
					{

						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['KRA_status'].'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['KRA_status'].'</td>'.'</tr>';
						}
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			
			print_r($content);die();
		
		
		
	}

	function actionstatusgetMid()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);
		
		$employee_data =new EmployeeForm;
		
		$kpi1 = new KpiAutoSaveForm;
		
		//print_r($kpi2);die();
		if ($value[1] == 'Submitted') {		
			$kpi1 = $kpi1->get_midrev_data();
			for($i=0;$i<count($kpi1);$i++){
				$Employee_id=$kpi1[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi1[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pending')
		{
			$kpi1 = $kpi1->get_midrev_data_pend();
			for($i=0;$i<count($kpi1);$i++){
				$Employee_id=$kpi1[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi1[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pendingemp')
		{
			
			$emp_list = $kpi1->get_midrev_data();
			//print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			//print_r(count($emp_all_data));die();	

			$emp_id_array = '';
				if(isset($emp_list) && count($emp_list)>0)
			{
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}

		$kpi_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_id NOT IN ('.$emp_id_array.') && Employee_status="Permanent"')->queryAll();
		}	
		else{
			$Employee_status='Permanent';
			$where = 'where Employee_status = :Employee_status';
			$list = array('Employee_status');
			$data = array('Permanent');
			$kpi_data1=$employee_data->get_employee_data($where,$data,$list);

		}	
		}

		$content = '';
			if (isset($kpi_data1) && count($kpi_data1)>0) {

				for ($i=0; $i < count($kpi_data1); $i++) { 

					if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
						
						$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
					}
					else
					{

						if($content == '')
						{	//print_r($kpi1);die();
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['mid_KRA_status'].'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['mid_KRA_status'].'</td>'.'</tr>';
						}
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			
			print_r($content);die();
		
	}


	function actionstatusgetYearA()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);
		
		$employee_data =new EmployeeForm;
		
		$kpi1 = new KpiAutoSaveForm;
		
		//print_r($kpi2);die();
		if ($value[1] == 'Submitted') {		
			$kpi1 = $kpi1->get_yearA_data();
			for($i=0;$i<count($kpi1);$i++){
				$Employee_id=$kpi1[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi1[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pending')
		{
			$kpi1 = $kpi1->get_yearA_data_appr();
			for($i=0;$i<count($kpi1);$i++){
				$Employee_id=$kpi1[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($kpi1[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pendingemp')
		{
			
			$emp_list = $kpi1->get_yearA_data();
			//print_r($emp_list);die();
			$emp_all_data = $employee_data->get_distinct_emplist();
			//print_r(count($emp_all_data));die();	

			$emp_id_array = '';
				if(isset($emp_list) && count($emp_list)>0)
			{
			for ($m=0; $m < count($emp_list); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$emp_list[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$emp_list[$m]['Employee_id'].'"';
				}
				
			}

		$kpi_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_id NOT IN ('.$emp_id_array.') && Employee_status="Permanent"')->queryAll();
		}	
		else{
			$Employee_status='Permanent';
			$where = 'where Employee_status = :Employee_status';
			$list = array('Employee_status');
			$data = array('Permanent');
			$kpi_data1=$employee_data->get_employee_data($where,$data,$list);

		}	
		}

		$content = '';
			if (isset($kpi_data1) && count($kpi_data1)>0) {

				for ($i=0; $i < count($kpi_data1); $i++) { 

					if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
						
						$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
					}
					else
					{

						if($content == '')
						{	if($kpi1[$i]['kra_complete_flag']<=2 )
								{
									$kpi1[$i]['kra_complete_flag']="Pending";
								}
								else{
									$kpi1[$i]['kra_complete_flag']="Approved";
								}
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['kra_complete_flag'].'</td>'.'</tr>';
						}
						else
						{
							if($kpi1[$i]['kra_complete_flag']<=2 )
								{
									$kpi1[$i]['kra_complete_flag']="Pending";
								}
								else{
									$kpi1[$i]['kra_complete_flag']="Approved";
								}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$kpi1[$i]['kra_complete_flag'].'</td>'.'</tr>';
						}
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			
			print_r($content);die();
		
	}

	function actionstatusgetYearB()
	{
		$status = $_POST['status'];
		$value = explode('_',$status);
		
		$employee_data =new EmployeeForm;
		
		
		
		//print_r($kpi2);die();
		if ($value[1] == 'Submitted') {		
			$yearA_rev_stat=new YearendReviewb;
			$yearA_rev_stat=$yearA_rev_stat->get_yaerb_rev_data();
			//print_r($yearA_rev_stat);die();
			for($i=0;$i<count($yearA_rev_stat);$i++){
				$Employee_id=$yearA_rev_stat[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($yearA_rev_stat[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pending')
		{
			$yearA_rev_stat=new YearendReviewb;
			$yearA_rev_stat=$yearA_rev_stat->get_yearB_appr_pend();
			
			for($i=0;$i<count($yearA_rev_stat);$i++){
				$Employee_id=$yearA_rev_stat[$i]['Employee_id'];
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($yearA_rev_stat[$i]['Employee_id']);
				$kpi_data1[$i] = $employee_data->get_employee_data($where,$data,$list);
				
			}
		}
		else if($value[1] == 'Pendingemp')
		{
			$yearA_rev_stat=new YearendReviewb;
			$yearA_rev_stat=$yearA_rev_stat->get_yaerb_rev_data();
			
		 	$emp_all_data = $employee_data->get_distinct_emplist();
		

			$emp_id_array = '';
				if(isset($yearA_rev_stat) && count($yearA_rev_stat)>0)
			{
			for ($m=0; $m < count($yearA_rev_stat); $m++) { 

				if($emp_id_array == '')
				{
					$emp_id_array = '"'.$yearA_rev_stat[$m]['Employee_id'].'"';
				}
				else
				{
					$emp_id_array = $emp_id_array.','.'"'.$yearA_rev_stat[$m]['Employee_id'].'"';
				}
				
			}

		$kpi_data1 = Yii::app()->db->createCommand()->select('*')->from('Employee')->where('Employee_id NOT IN ('.$emp_id_array.') && Employee_status="Permanent"')->queryAll();
		}	
		else{
			$Employee_status='Permanent';
			$where = 'where Employee_status = :Employee_status';
			$list = array('Employee_status');
			$data = array('Permanent');
			$kpi_data1=$employee_data->get_employee_data($where,$data,$list);

		}	
		}

		$content = '';
			if (isset($kpi_data1) && count($kpi_data1)>0) {

				for ($i=0; $i < count($kpi_data1); $i++) { 

					if ($value[1] == 'Pendingemp') {
						
						if($content == '')
						{	
						
						$content = '<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
						else
						{
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['Emp_fname']."  ".$kpi_data1[$i]['Emp_lname'].'</td>'.'<td>'."Not Submitted".'</td>'.'</tr>';
						}
					}
					else
					{

						if($content == '')
						{	if($yearA_rev_stat[$i]['year_end_reviewb_status']==0 )
								{
									$yearA_rev_stat[$i]['year_end_reviewb_status']="Pending";
								}
								else{
									$yearA_rev_stat[$i]['year_end_reviewb_status']="Approved";
								}
							$content = '<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearA_rev_stat[$i]['year_end_reviewb_status'].'</td>'.'</tr>';
						}
						else
						{
							if($yearA_rev_stat[$i]['year_end_reviewb_status']==0 )
								{
									$yearA_rev_stat[$i]['year_end_reviewb_status']="Pending";
								}
								else{
									$yearA_rev_stat[$i]['year_end_reviewb_status']="Approved";
								}
							$content = $content.'<tr>'.'<td>'.$kpi_data1[$i]['0']['Employee_id'].'</td>'.'<td>'.$kpi_data1[$i]['0']['Emp_fname']."  ".$kpi_data1[$i]['0']['Emp_lname'].'</td>'.'<td>'.$yearA_rev_stat[$i]['year_end_reviewb_status'].'</td>'.'</tr>';
						}
					}					
				}
			}
			else
			{
				$content = "No Record Found";
			}
			
			print_r($content);die();
		
	}
}
