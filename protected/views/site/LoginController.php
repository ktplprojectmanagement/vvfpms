<?php

class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		$model = new LoginForm;
		//$this->render('//site/Login_view',array('model'=>$model));
		$this->render('//site/login_view',array('model'=>$model));
		
	}

	public function actioncheck()
	{
		$model = new LoginForm;
		$model->attributes=$_POST['LoginForm'];
		if($model->username == 'kritvait' && $model->password == 'pmslogin')
		{
			$this->redirect(array("Login/dashboard"));
		}
		//print_r($model->username);die();
	}

	public function actiondashboard()
	{
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/user_profile');
		$this->render('//site/footer_view');
	}
	
}
