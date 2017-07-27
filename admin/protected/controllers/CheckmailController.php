<?php

class CheckmailController extends Controller
{
	
	public function actionIndex()
	{

Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
			  $message->view = "";
			  $message->subject = 'IDP Approval Request';
			  $message->addTo('demo.appraisel@gmail.com');	  
			  $message->from = 'pmstest@vvf.kritva.in';
			  if(Yii::app()->mail->send($message))
			  {
			  	echo "Sent";
			  }	
	}
}
