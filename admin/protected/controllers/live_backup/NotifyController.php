<?php

class NotifyController extends Controller
{
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/notification_view');
		$this->render('//site/footer_view');
	}

	public function actionmydata()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$this->render('//site/script_file');
		$this->render('//site/header_view');
		$this->render('//site/blank_page');
		$this->render('//site/footer_view');
	}	
}