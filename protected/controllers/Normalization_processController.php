<?php

class Normalization_processController extends Controller
{
	public function actionIndex()
	{
		if(Yii::app()->user->getState("Employee_id")!='')
        {
			$model=new KRAStructureForm;
			$employee = new EmployeeForm;
			$cluster_name = new ClusterForm;
			$normalize_rating =new NormalizeRatingForm;
			$IDPForm =new IDPForm;

			$employee_result = $employee->getdata();
			$kra_result = $model->get_all_kra();
			$appraiser_list = $employee->get_appraiser_list();
			$appraiser_list_data = '';
			$employee_list = '';$normalize_rating_data = '';
			$cnt = 0;

			if (count($appraiser_list)>0) {
				for ($i=0; $i < count($appraiser_list); $i++) {
				$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
				$list = array('Reporting_officer1_id');
				$data = array($appraiser_list[$i]['Reporting_officer1_id']);
				$employee_list[$i] = $employee->get_employee_data($where,$data,$list);
				
				
				for ($j=0; $j < count($employee_list); $j++) { 
					if (isset($employee_list[$i][$j]['Employee_id'])) {
						$where1 = 'where Employee_id = :Employee_id';
						$list1 = array('Employee_id');
						$data2 = array($employee_list[$i][$j]['Employee_id']);
						$normalize_rating_data[$i] = $normalize_rating->get_setting_data($where1,$data2,$list1);
					}	
                                        if (isset($employee_list[$i][$j]['Employee_id'])) {
						$where1 = 'where Employee_id = :Employee_id';
						$list1 = array('Employee_id');
						$data2 = array($employee_list[$i][$j]['Employee_id']);
						$IDP_data[$i] = $IDPForm->get_idp_data($where1,$data2,$list1);
					}			
				}
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

			$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
			$list = array('Reporting_officer1_id');
			$data = array('mssadafule@gmail.com');
			$head_branch_data = $employee->get_employee_data($where,$data,$list);
		
			$diff_Department = $employee->get_department_list();
			$diff_cluster = $cluster_name->get_distinct_list('cluster_name','where 1');
			$diff_reporting_head = $employee->get_distinct_list('Reporting_officer1_id','where 1');
			$dep_head_data = '';
			for ($i=0; $i < count($diff_reporting_head); $i++) { 
				$where = 'where Email_id = :Email_id';
				$list = array('Email_id');
				$data = array($diff_reporting_head[$i]['Reporting_officer1_id']);
				$dep_head_data[$i] = $employee->get_employee_data($where,$data,$list);
			}
//print_r($IDP_data);die();
			$selected_option = 'Normalization';
			$this->render('//site/script_file');
			$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/normalization_view',array('model'=>$model,'employee_list'=>$employee_result,'kra_result'=>$kra_result,'employee_list_data'=>$employee_list,'appraiser_list'=>$appraiser_list_data,'diff_Department'=>$diff_Department,'head_branch_data'=>$head_branch_data,'diff_cluster'=>$diff_cluster,'diff_reporting_head'=>$diff_reporting_head,'dep_head_data'=>$dep_head_data,'normalize_rating_data'=>$normalize_rating_data,'IDPForm_data'=>$IDP_data));
			$this->render('//site/footer_view_layout');
        }
        else
        {
            $this->redirect(array('Adminlogin/Index'));
        }		
		
	}

        
        function actionnormalize()
        {
          $normalize_rating =new NormalizeRatingForm;
          $employee_id_list = explode(';',$_POST['emp_id_list']);
          $rating = explode(';',$_POST['rating']);
          $comments = explode(';',$_POST['comments']);
date_default_timezone_set('Asia/Calcutta'); 
	//print_r($comments);die();
$date1 = date("Y-m-d H:i:s"); 

//print_r($_POST['user']);die();

//print_r(Yii::app()->user->getState("employee_email"));die();
if(Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com' || Yii::app()->user->getState("employee_email") == 'mohit.sharma@vvfltd.com')
{
$other_comments = explode(';',$_POST['other_comments']);
         for($i=0;$i<count($employee_id_list);$i++)
          { 
              $normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id and bu_rating != :bu_rating  ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','bu_rating');
$data2 = array($employee_id_list[$i],'');
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 
//print_r($normalize_rating_data1);die();
if(count($normalize_rating_data1)>0)
{

$data = array(
			'bu_rating' => $rating[$i],
'bu_comments' => $comments[$i],
'other_comments' => $other_comments[$i],
'bu_head' => Yii::app()->user->getState("employee_email"),
'changes_date' => $date1,
			);
			//print_r($comments);die();
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$employee_id_list[$i]));
}
else
{
 $normalize_rating =new NormalizeRatingForm;
            $normalize_rating->Employee_id = $employee_id_list[$i];
            $normalize_rating->bu_rating = $rating[$i];
            $normalize_rating->bu_comments = $comments[$i];
            $normalize_rating->bu_head = Yii::app()->user->getState("employee_email");$normalize_rating->other_comments = $other_comments[$i];
            $normalize_rating->changes_date = $date1;
if($i == 10)
{
//print_r($employee_id_list);die();
}
//print_r($normalize_rating->attributes());die();
		  if($normalize_rating->save())
		  {
		  		echo "save";
		  }
}
           
          }
}
else if($_POST['user'] == 'bu')
{
$other_comments = explode(';',$_POST['other_comments']);
         for($i=0;$i<count($employee_id_list);$i++)
          { 
               $normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id and bu_rating != :bu_rating  ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','bu_rating');
$data2 = array($employee_id_list[$i],'');
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 

if(count($normalize_rating_data1)>0)
{
$data = array(
			'bu_rating' => $rating[$i],
'bu_comments' => $comments[$i],
'other_comments' => $other_comments[$i],
'bu_head' => Yii::app()->user->getState("employee_email"),
'changes_date' => $date1,
			);
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$employee_id_list[$i]));
}
else
{
 $normalize_rating =new NormalizeRatingForm;
            $normalize_rating->Employee_id = $employee_id_list[$i];
            $normalize_rating->bu_rating = $rating[$i];
            $normalize_rating->bu_comments = $comments[$i];
            $normalize_rating->bu_head = Yii::app()->user->getState("employee_email");$normalize_rating->other_comments = $other_comments[$i];
            $normalize_rating->changes_date = $date1;
if($i == 10)
{
//print_r($employee_id_list);die();
}
		  if($normalize_rating->save())
		  {
		  		echo "save";
		  }
}
           
          }
}
else if($_POST['user'] == 'plant_head')
{
for($i=0;$i<count($employee_id_list);$i++)
          { 
               $normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id and rating != :rating  ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','rating');
$data2 = array($employee_id_list[$i],'');
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 

if(count($normalize_rating_data1)>0)
{
$data = array(
			'plant_head_rating' => $rating[$i],
'plant_head_comment' => $comments[$i],
'plant_head' => Yii::app()->user->getState("employee_email"),
'changes_date' => $date1,
			);
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$employee_id_list[$i]));
}
else
{
 $normalize_rating =new NormalizeRatingForm;
            $normalize_rating->Employee_id = $employee_id_list[$i];
            $normalize_rating->plant_head_rating = $rating[$i];
            $normalize_rating->plant_head_comment = $comments[$i];
            $normalize_rating->plant_head = Yii::app()->user->getState("employee_email");
            $normalize_rating->changes_date = $date1;
if($normalize_rating->save())
		  {
		  		echo "save";
		  }
}

          }
}
else if($_POST['user'] == 'cluster_head')
{
 
//print_r(count($employee_id_list));die();
for($i=0;$i<count($employee_id_list);$i++)
          {
               $normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id and rating != :rating  ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','rating');
$data2 = array($employee_id_list[$i],'');
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 

if(count($normalize_rating_data1)>0)
{
$data = array(
			'rating' => $rating[$i],
'cluster_head_comments' => $comments[$i],
'cluster_head_name' => Yii::app()->user->getState("employee_email"),
'changes_date' => $date1,
			);
			$update = Yii::app()->db->createCommand()->update('normalize_rating',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$employee_id_list[$i]));
}
else
{
 $normalize_rating =new NormalizeRatingForm; 
            $normalize_rating->Employee_id = $employee_id_list[$i];
            $normalize_rating->rating = $rating[$i];
            $normalize_rating->cluster_head_comments = $comments[$i];
            $normalize_rating->cluster_head_name = Yii::app()->user->getState("employee_email");
            $normalize_rating->changes_date = $date1;


if($normalize_rating->save())
		  {
		  		print_r($normalize_rating->attributes);
		  }
}

          }
}
          
        }

	function actiongetdata()
	{
		$employee = new EmployeeForm;
		$cluster_name = new ClusterForm;
			if ($_POST['Department'] == 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['BU_name'] == 'All') {
			$dept_vise_emp_data = $employee->getdata();
		}
		else if($_POST['Department'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['BU_name'] == 'All')
		{
			$where = 'where Department = :Department';
			$list = array('Department');
			$data = array($_POST['Department']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] == 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['BU_name'] == 'All' && $_POST['cluster_name'] != 'All') {
			$where = 'where cluster_name = :cluster_name';
			$list = array('cluster_name');
			$data = array($_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['reporting_head_name'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['BU_name'] == 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
			$list = array('Reporting_officer1_id');
			$data = array($_POST['reporting_head_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['cluster_name'] == 'All' && $_POST['BU_name'] != 'All') {
			$where = 'where BU = :BU';
			$list = array('BU');
			$data = array($_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['BU_name'] == 'All') {
			$where = 'where Department = :Department and cluster_name = :cluster_name';
			$list = array('Department','cluster_name');
			$data = array($_POST['Department'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['BU_name'] == 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and cluster_name = :cluster_name';
			$list = array('Reporting_officer1_id','cluster_name');
			$data = array($_POST['reporting_head_name'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['BU_name'] == 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department';
			$list = array('Reporting_officer1_id','Department');
			$data = array($_POST['reporting_head_name'],$_POST['Department']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['BU_name'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and BU = :BU';
			$list = array('Reporting_officer1_id','BU');
			$data = array($_POST['reporting_head_name'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['BU_name'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] == 'All') {
			$where = 'where cluster_name = :cluster_name and BU = :BU';
			$list = array('cluster_name','BU');
			$data = array($_POST['cluster_name'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['BU_name'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All') {
			$where = 'where Department = :Department and BU = :BU';
			$list = array('Department','BU');
			$data = array($_POST['Department'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] != 'All' && $_POST['BU_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department and BU = :BU';
			$list = array('Reporting_officer1_id','Department','BU');
			$data = array($_POST['reporting_head_name'],$_POST['Department'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All' && $_POST['BU_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and cluster_name = :cluster_name and BU = :BU';
			$list = array('Reporting_officer1_id','cluster_name','BU');
			$data = array($_POST['reporting_head_name'],$_POST['cluster_name'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['BU_name'] != 'All') {
			$where = 'where Department = :Department and cluster_name = :cluster_name and BU = :BU';
			$list = array('Department','cluster_name','BU');
			$data = array($_POST['Department'],$_POST['cluster_name'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department and cluster_name = :cluster_name';
			$list = array('Reporting_officer1_id','Department','cluster_name');
			$data = array($_POST['reporting_head_name'],$_POST['Department'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All' && $_POST['BU_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department and cluster_name = :cluster_name and BU = :BU';
			$list = array('Reporting_officer1_id','Department','cluster_name','BU');
			$data = array($_POST['reporting_head_name'],$_POST['Department'],$_POST['cluster_name'],$_POST['BU_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
//print_r($dept_vise_emp_data);die();
		$diff_Department = $employee->get_distinct_list('Reporting_officer1_id','where 1');
		$dep_head_data = '';
		for ($i=0; $i < count($diff_Department); $i++) { 
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($diff_Department[$i]['Reporting_officer1_id']);
			$dep_head_data[$i] = $employee->get_employee_data($where,$data,$list);
		}
		$diff_cluster = $cluster_name->get_distinct_list('cluster_name','where 1');		
		
		$print_data = '';
		$cls_data = '';
		 if (isset($diff_cluster) && count($diff_cluster)>0) {
                foreach ($diff_cluster as $row1) {
                    if ($cls_data == '') {
                    	$cls_data = '<option value="'.$row1['cluster_name'].'">'.$row1['cluster_name'].'</option>';
                    }
                    else
                    {
                    	$cls_data = $cls_data.'<option value="'.$row1['cluster_name'].'">'.$row1['cluster_name'].'</option>';
                    }
       
                }
            }
        $dpt_data = '';
		if (isset($diff_Department) && count($diff_Department)>0) {
			$cnt = 0;
            foreach ($diff_Department as $row1) {
            		if (isset($dep_head_data[$cnt]['0']['Emp_fname'])) {
            			if ($dpt_data == '') {
	                    	$dpt_data = '<option value="'.$row1['Reporting_officer1_id'].'">'.$dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'].'</option>';
	                    }
	                    else
	                    {
	                    	$dpt_data = $dpt_data.'<option value="'.$row1['Reporting_officer1_id'].'">'.$dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'].'</option>';
	                    }
	       				$cnt++;
            		}
                    
                }
         }
         $cnt = 0;
		foreach ($dept_vise_emp_data as $row) {
$performance_rating = '';$Tota_score = '';
$normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1);
if(isset($normalize_rating_data['0']['performance_rating']))
{ 
$performance_rating = $normalize_rating_data['0']['performance_rating']; 
}
if(isset($normalize_rating_data['0']['Tota_score']))
{ 
$Tota_score =  $normalize_rating_data['0']['Tota_score']; 
}
			if ($print_data == '') {
				$tr = '<tr>';
				$td = '<td>'.$row['Employee_id'].'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>'.'<td>'.$Tota_score.'</td>'.'<td>'.$performance_rating.'</td>'.'<td><input class="form-control cluster_head_data-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control normalize_rate-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control performance_data-'.$cnt.'" placeholder="Enter text" type="text"></td>';
				$cls_tr = '</tr>';
				$print_data = $tr.$td.$cls_tr;
			}
			else
			{
				$tr = '<tr>';
				$td = '<td>'.$row['Employee_id'].'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>'.'<td>'.$Tota_score.'</td>'.'<td>'.$performance_rating.'</td>'.'<td><input class="form-control cluster_head_data-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control normalize_rate-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control performance_data-'.$cnt.'" placeholder="Enter text" type="text"></td>';
				$cls_tr = '</tr>';
				$print_data = $print_data.$tr.$td.$cls_tr;
			}
			$cnt++;			
		}
		print_r($print_data.';'.count($dept_vise_emp_data));
	}


		function actiongetdata_list()
	{
		$employee = new EmployeeForm;
		$cluster_name = new ClusterForm;
                $dept_name = '';
		if ($_POST['Department'] == 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All') {
			$dept_vise_emp_data = $employee->getdata();
		}
		else if($_POST['Department'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] == 'All')
		{
			$where = 'where Department = :Department';
			$list = array('Department');
			$data = array($_POST['Department']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] == 'All' && $_POST['reporting_head_name'] == 'All' && $_POST['cluster_name'] != 'All') {
			$where = 'where cluster_name = :cluster_name';
			$list = array('cluster_name');
			$data = array($_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['reporting_head_name'] != 'All' && $_POST['cluster_name'] == 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id';
			$list = array('Reporting_officer1_id');
			$data = array($_POST['reporting_head_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
		else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] == 'All') {
			$where = 'where Department = :Department and cluster_name = :cluster_name';
			$list = array('Department','cluster_name');
			$data = array($_POST['Department'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] == 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and cluster_name = :cluster_name';
			$list = array('Reporting_officer1_id','cluster_name');
			$data = array($_POST['reporting_head_name'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] == 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department';
			$list = array('Reporting_officer1_id','Department');
			$data = array($_POST['reporting_head_name'],$_POST['Department']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}
                else if ($_POST['Department'] != 'All' && $_POST['cluster_name'] != 'All' && $_POST['reporting_head_name'] != 'All') {
			$where = 'where Reporting_officer1_id = :Reporting_officer1_id and Department = :Department and cluster_name = :cluster_name';
			$list = array('Reporting_officer1_id','Department','cluster_name');
			$data = array($_POST['reporting_head_name'],$_POST['Department'],$_POST['cluster_name']);
			$dept_vise_emp_data = $employee->get_employee_data($where,$data,$list);
		}

		$diff_Department = $employee->get_distinct_list('Reporting_officer1_id','where 1');
		$dep_head_data = '';
		for ($i=0; $i < count($diff_Department); $i++) { 
			$where = 'where Email_id = :Email_id';
			$list = array('Email_id');
			$data = array($diff_Department[$i]['Reporting_officer1_id']);
			$dep_head_data[$i] = $employee->get_employee_data($where,$data,$list);
		}
		$diff_cluster = $cluster_name->get_distinct_list('cluster_name','where 1');		
		
		$print_data = '';
		$cls_data = '';
		 if (isset($diff_cluster) && count($diff_cluster)>0) {
                foreach ($diff_cluster as $row1) {
                    if ($cls_data == '') {
                    	$cls_data = '<option value="'.$row1['cluster_name'].'">'.$row1['cluster_name'].'</option>';
                    }
                    else
                    {
                    	$cls_data = $cls_data.'<option value="'.$row1['cluster_name'].'">'.$row1['cluster_name'].'</option>';
                    }
       
                }
            }
        $dpt_data = '';
		if (isset($diff_Department) && count($diff_Department)>0) {
			$cnt = 0;
            foreach ($diff_Department as $row1) {
            		if (isset($dep_head_data[$cnt]['0']['Emp_fname'])) {
            			if ($dpt_data == '') {
	                    	$dpt_data = '<option value="'.$row1['Reporting_officer1_id'].'">'.$dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'].'</option>';
	                    }
	                    else
	                    {
	                    	$dpt_data = $dpt_data.'<option value="'.$row1['Reporting_officer1_id'].'">'.$dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'].'</option>';
	                    }
	       				$cnt++;
            		}
                    
                }
         }
         $cnt = 0;
		foreach ($dept_vise_emp_data as $row) {
$performance_rating = '';$Tota_score = '';
$normalize_rating =new NormalizeRatingForm;
$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1);
if(isset($normalize_rating_data['0']['performance_rating']))
{ 
$performance_rating = $normalize_rating_data['0']['performance_rating']; 
}
if(isset($normalize_rating_data['0']['Tota_score']))
{ 
$Tota_score =  $normalize_rating_data['0']['Tota_score']; 
}
			if ($print_data == '') {
				$tr = '<tr>';
				$td = '<td>'.$row['Employee_id'].'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>'.'<td>'.$Tota_score.'</td>'.'<td>'.$performance_rating.'</td>'.'<td><input class="form-control normalize_rate-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control performance_data-'.$cnt.'" placeholder="Enter text" type="text"></td>';
				$cls_tr = '</tr>';
				$print_data = $tr.$td.$cls_tr;
			}
			else
			{
				$tr = '<tr>';
				$td = '<td>'.$row['Employee_id'].'</td>'.'<td>'.$row['Emp_fname'].'</td>'.'<td>'.$row['Designation'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Reporting_officer1_id'].'</td>'.'<td>'.$Tota_score.'</td>'.'<td>'.$performance_rating.'</td>'.'<td><input class="form-control normalize_rate-'.$cnt.'" placeholder="Enter text" type="text"></td>'.'<td><input class="form-control performance_data-'.$cnt.'" placeholder="Enter text" type="text"></td>';
				$cls_tr = '</tr>';
				$print_data = $print_data.$tr.$td.$cls_tr;
			}
			$cnt++;			
		}
		print_r($print_data.';'.count($dept_vise_emp_data));
	}
}
