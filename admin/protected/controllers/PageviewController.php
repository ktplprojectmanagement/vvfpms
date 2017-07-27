<?php

class PageviewController extends Controller
{
	public function actionIndex()
	{
		$model = new LoginForm;
		//$this->render('//site/page_view',array('model'=>$model));
		$this->render('//site/header_view_layout',array('model'=>$model));
		$this->render('//site/blank_page_view',array('model'=>$model));
		$this->render('//site/footer_view_layout',array('model'=>$model));
	}
}