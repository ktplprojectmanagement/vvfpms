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
function actionnew()
{
echo "sdfsd";
}
	function actionpromotion_form($Employee_id = null)
	{
		//echo $Employee_id;die();
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

function actionlayout()
{
	
	$promotion = new PromotionForm;
	$employee = new EmployeeForm;
	$promotion_data1 = $promotion->getdata();
	$emp_promotion_data=$promotion->getdata();
	$bu_id = Yii::app()->user->getState("Employee_id");

	$where = 'where Employee_id = :Employee_id';
	$list = array('Employee_id');
	$data = array($bu_id);
	$BU_data = $employee->get_employee_data($where,$data,$list);
	
	$where = 'where BU = :BU';
	$list = array('BU');
	$data = array($BU_data['0']['BU']);
	$BU_count = $employee->get_employee_data($where,$data,$list);

	if(isset($emp_promotion_data) && count($emp_promotion_data)>0)
	{ 
		$k=0;$l=0;$m=0;
		for($i = 0;$i<count($emp_promotion_data);$i++)
		{



		
			$where = 'where Employee_id = :Employee_id and plant_head_email = :plant_head_email';
			$list = array('Employee_id','plant_head_email');
			$data = array($emp_promotion_data[$i]['Employee_id'],$BU_data['0']['Email_id']);
			$chk_user_cls1 = $employee->get_employee_data($where,$data,$list);

			$where = 'where Employee_id = :Employee_id and cluster_appraiser = :cluster_appraiser';
			$list = array('Employee_id','cluster_appraiser');
			$data = array($emp_promotion_data[$i]['Employee_id'],$BU_data['0']['Email_id']);
			$chk_user_cls2 = $employee->get_employee_data($where,$data,$list);
			
			$where = 'where Employee_id = :Employee_id and bu_head_email = :bu_head_email';
			$list = array('Employee_id','bu_head_email');
			$data = array($emp_promotion_data[$i]['Employee_id'],$BU_data['0']['Email_id']);
			$chk_user_cls3 = $employee->get_employee_data($where,$data,$list);

			if(count($chk_user_cls1)>0)
			{
				$bu_flag = 0;
				$cluster_flag=0;
				$plant_flag=1;
				$emp_promotion_data1[$k] = $chk_user_cls1;
				$k=$k+1;
			}
			else if(count($chk_user_cls2)>0)
			{
				$cluster_flag = 1;$bu_flag=0;$plant_flag=0;
				$emp_promotion_data1[$l] = $chk_user_cls2;
				$l++;
			}	
			else if(count($chk_user_cls3)>0)
			{
				$plant_flag = 0;$bu_flag=1;$cluster_flag=0;
				$emp_promotion_data1[$m] = $chk_user_cls3;$m++;
			}	


		}

	}


		if(isset($emp_promotion_data1) && count($emp_promotion_data1)>0)
		{
			for ($i=0; $i < count($emp_promotion_data1); $i++) 
			{ 
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($emp_promotion_data1[$i]['0']['Employee_id']);
				$emp_promotion_data[$i] = $promotion->get_employee_data($where,$data,$list);
				// echo $i;
			}
		}

	

	$selected_option = 'promotion';
	$this->render('//site/script_file');
	$this->render('//site/session_check_view');
	$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
	$this->render('//site/promotion_layout',array('promotion_data'=>$emp_promotion_data,'emp_promotion_data'=>$emp_promotion_data1,'bu_data'=>$BU_count,'bu_flag'=>$bu_flag,'cluster_flag'=>$cluster_flag,'plant_flag'=>$plant_flag,'promotion_data1'=>$promotion_data1));   
	$this->render('//site/footer_view_layout');	
}

function actionupdatepromo()
{

    $emp_list=$_POST['emp_list'];
    $bu_comments=$_POST['bu_comments'];
    $plant_comments=$_POST['plant_comments'];
    $cluster_comments=$_POST['cluster_comments'];
    $flag=$_POST['flag'];
   
    $bu=$_POST['bu'];

    $plant=$_POST['plant'];
    $cluster=$_POST['cluster'];

    $emp_list=explode(';',$_POST['emp_list']);
    $bu_comments=explode('^',$_POST['bu_comments']);
    $plant_comments=explode('^',$_POST['plant_comments']);
    $cluster_comments=explode('^',$_POST['cluster_comments']);
    $flag=explode('^', $_POST['flag']);
   
    if(count($emp_list)>0)
        {  

            for($i=0;$i<count($emp_list);$i++)
            {   
            	         
            	        if($bu==1){
            	        	$data=array('bu_comments'=>$bu_comments[$i],
                    	    'flag'=>$flag[$i]);
            	        }
            	        elseif ($plant==1) {
            	         	$data=array('plant_comments'=>$plant_comments[$i],);
            	        } 
            	        elseif ($cluster==1) {
            	         	$data=array('cluster_comments'=>$cluster_comments[$i],);
            	        }	
                        
                        $update = Yii::app()->db->createCommand()->update('promotion_form_data',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$emp_list[$i]));
    	  }

         }
 
}

	function actionsubmit_data()
	{
		//print_r($_POST['emp_id']);die();
		$model = new PromotionForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['emp_id']);
		$emp_data = $model->get_employee_data($where,$data,$list);
//print_r($_POST['goal_set_year']);die();
        $setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$year1=$settings_data['0']['setting_type'];
		//print_r($year1);die();
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
                'goal_set_year'=>$year1,
                                
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
            $model->goal_set_year = $year1;
                        
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
