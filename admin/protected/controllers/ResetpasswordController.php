<?php

class ResetpasswordController extends Controller
{
	
	public function actionIndex()
	{		
		$selected_option = 'IDP';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/reset_user_password');
		$this->render('//site/footer_view_layout');
	}
}
?>