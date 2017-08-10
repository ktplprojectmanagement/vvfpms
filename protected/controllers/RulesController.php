<?php

class RulesController extends Controller
{

	public function actionIndex()
	{
	    $selected_option = 'rules_for_goalsheet';
	    $this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/baseurl');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/rules_for_goalsheet');
		$this->render('//site/footer_view_layout');
	   
	}
}

?>