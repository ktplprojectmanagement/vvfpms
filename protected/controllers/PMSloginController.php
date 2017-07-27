<?php

class PMSloginController extends Controller
{
	
	public function actionsetgaolsheet()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',1);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('Setgoals'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionsub_gaolsheetlist()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',0);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('Setgoals/approvegoal_list'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionmidreview()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',2);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('Midreview'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionmidreview1()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',3);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('Midreview/setbyemployee'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionIDP()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',4);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('IDP'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionIDP_sublist()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',5);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('IDP/IDP_approvegoal_list'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionIDP_mid()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',6);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('IDP/Midyear_subordinate_idp1'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	public function actionIDP_midsublist()
	{
		$model = new LoginForm;	
		Yii::app()->user->setState('page_value',7);
		$this->render('//site/session_check_view');
		if (Yii::app()->user->getState("Employee_id")!='') {			
			$this->redirect(Yii::app()->createUrl('IDP/IDP_Mid_approvegoal_list'));
		}
		else
		{
			$this->render('//site/admin_login',array('model'=>$model));
		}
	}

	// public function actionyearenda()
	// {
	// 	$model = new LoginForm;	
	// 	Yii::app()->user->setState('page_value',3);
	// 	$this->render('//site/session_check_view');
	// 	if (Yii::app()->user->getState("Employee_id")!='') {			
	// 		$this->redirect(Yii::app()->createUrl('Login/dashboard'));
	// 	}
	// 	else
	// 	{
	// 		$this->render('//site/admin_login',array('model'=>$model));
	// 	}
	// }

	// public function actionyearendb()
	// {
	// 	$model = new LoginForm;	
	// 	Yii::app()->user->setState('page_value',4);
	// 	$this->render('//site/session_check_view');
	// 	if (Yii::app()->user->getState("Employee_id")!='') {			
	// 		$this->redirect(Yii::app()->createUrl('Login/dashboard'));
	// 	}
	// 	else
	// 	{
	// 		$this->render('//site/admin_login',array('model'=>$model));
	// 	}
	// }

	
	
}
