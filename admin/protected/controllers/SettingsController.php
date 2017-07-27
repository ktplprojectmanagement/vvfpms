<?php

class SettingsController extends Controller
{
	public function actionIndex()
	{		
		$model=new EmployeeForm;
		$selected_option = 'PMS';
    $this->render('//site/script_file');
    $this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/setting_page',array('model'=>$model));
		$this->render('//site/admin_footer_view');
	}

    function actionsetting_update()
    {
        $model=new SettingsForm;
        if (isset($_POST['setting_value'])) {
           if ($_POST['setting_value'] == 'employee_id_format') {
              $data = array(
                'setting_type' => $_POST['setting_type'], 
            );
               $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>'Employee_id'));
           }
            if ($_POST['setting_value'] == 'Employee_atd_code') {
              $data = array(
                'setting_type' => $_POST['setting_type'], 
            );
               $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>'Employee_atd_code'));
           }
           if ($_POST['setting_value'] == 'personal_id') {
              $data = array(
                'setting_type' => $_POST['setting_type'], 
            );
                $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>'personal_id'));
           }
           if ($_POST['setting_value'] == 'kra_number') {
              $data = array(
                'setting_type' => $_POST['setting_type'], 
            );
               $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>'kra_number'));
           }
        }
        
       
        if($update!=0)
        {
            print_r("success");die();
        }
        else
        {
            print_r("error occured");die();
        }
    }

    function actionsave()
    {
        $model=new AdminSettingsForm;
        $data = array(
            'flag' => $_POST['content_value'], 
        );
        $update = Yii::app()->db->createCommand()->update('admin_settings',$data,'content=:content',array(':content'=>$_POST['content_name']));
        if($update!=0)
        {
            print_r("success");die();
        }
        else
        {
            print_r("error occured");die();
        }
    }

    function actionset_setting()
    {
      $update_status = 0;
      $model=new SettingsForm;

      if(isset($_POST['content_value']) && isset($_POST['content_array']))
      {
	if(count($_POST['content_array']) == 1)
	{
	$where = 'where setting_content = :setting_content and year = :year';
            $list = array('setting_content','year');
            $data = array($_POST['content_array']['0'],date('Y'));             
            $settings_data = $model->get_setting_data($where,$data,$list);
		if (count($settings_data)>0) {
                $data = array(
                  'setting_type' => $_POST['content_value']['0'], 
                );

                $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>$_POST['content_array']['0']));
               print_r("success");die();
            }
            else
            {

                $model=new SettingsForm;
                $model->setting_content = $_POST['content_array']['0'];
                $model->setting_type = $_POST['content_value']['0'];
                $model->year = date('Y');   
                $model->save();
                print_r("success");die();

            }           
	}
	else if(count($_POST['content_array']) > 1)
	{
	for ($i=1; $i <= count($_POST['content_array']); $i++) {            
            $where = 'where setting_content = :setting_content and year = :year';
            $list = array('setting_content','year');
            $data = array($_POST['content_array'][$i],date('Y'));             
            $settings_data = $model->get_setting_data($where,$data,$list); 
            if (count($settings_data)>0) {
                $data = array(
                  'setting_type' => $_POST['content_value'][$i], 
                );

                $update = Yii::app()->db->createCommand()->update('settings',$data,'setting_content=:setting_content',array(':setting_content'=>$_POST['content_array'][$i]));
                $update_status++;
            }
            else
            {

                $model=new SettingsForm;
                $model->setting_content = $_POST['content_array'][$i];
                $model->setting_type = $_POST['content_value'][$i];
                $model->year = date('Y');   
                $model->save();
                $update_status++;

            }               
          }         
	}
           
      }
      if ($update_status>0) 
      {
         print_r("success");die();
      }
     
    }   
}
