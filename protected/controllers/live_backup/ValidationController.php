<?php

class ValidationController extends Controller
{
	public function actionIndex()
	{
		$model=new ValidateForm;
		$this->render('//site/validation_page',array('model'=>$model));
	}

	public function actioncheck()
	{
		$model=new ValidateForm;
		$model->username = $_POST['username'];
		$model->password = $_POST['password'];
		if($model->validate())
		{
			//////////////
		}
		else
		{
			print_r(json_encode($model->getErrors()));die();
		}
		//print_r('fghfgfgh');die();
	}
}