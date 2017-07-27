<?php

class SettingpageController extends Controller
{
	public function actionIndex()
	{		
		$model=new AdminSettingsForm;
       
        $all_data = $model->getdata();
		$selected_option = 'PMS';
        $this->render('//site/script_file');
        $this->render('//site/header_view',array('selected_option'=>$selected_option));
		$this->render('//site/report',array('model'=>$model,'all_data'=>$all_data));
		$this->render('//site/footer');
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

 
}