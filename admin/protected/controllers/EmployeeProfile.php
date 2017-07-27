<?php

class EmployeeProfileController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$model=new EmployeeForm;
		$this->render('//site/script_file');
		$this->render('//site/header_view');	
		$this->render('//site/employee_profile_view',array('model'=>$model));
		$this->render('//site/footer_view');
		//$this->render('//site/emp',array('model'=>$model));
	}
	
}