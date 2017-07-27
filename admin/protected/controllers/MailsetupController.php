<?php

class MailsetupController extends Controller
{
	
	public function actionIndex()
	{ 
		 $this->render('//site/script_file');
		$this->render('//site/admin_header_view');
        $this->render('//site/blank_view1');
        $this->render('//site/admin_footer_view');
	}
}
?>