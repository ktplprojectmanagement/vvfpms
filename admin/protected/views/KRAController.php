<?php

class KRAController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function actionkra_create()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$model=new KRAStructureForm;
		//$this->render('//site/header');
		$this->render('//site/KRA_form',array('model'=>$model));
		//$this->render('//site/footer');
	}
	
}