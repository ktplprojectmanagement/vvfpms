<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'theme'=>'metronic',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.yii-mail.*',
		'ext.yii-mail.YiiMailMessage'
	),

	'timeZone' => 'Asia/Kolkata',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456789',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'mail' => array(                
                'class' => 'ext.yii-mail.YiiMail',
			     'transportType'=>'smtp',
			     'transportOptions'=>array(
			       'host'=>'smtp.office365.com',
                    'username'=>'vvf.pms@vvfltd.com',
                    'password'=>'Dream@123',
                    'port'=>'587',
                    // 'encryption' => 'tls'
			     ),
			    'viewPath' => 'application.views.mail',
        ),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			//'appendParams'=>true,
			'showScriptName' => false,
			//'enableStrictParsing' => false,
			//'enablePrettyUrl' => true 
			//'baseUrl' => 'index.php',
			'rules'=>array(
				 '/' => 'Login',
				 //'' => 'index.php',
				 //'Setgoals/approvegoal_list' => 'index.php/Setgoals/approvegoal_list',
				// 'Setgoals/emp_kpi_edit/<emp_id:[a-zA-Z0-9-]+>'=>'Setgoals/emp_kpi_edit/',
				///IDP/subordinate_idp/' => 'IDP/IDP_approvegoal_list',
				//'IDP1' => 'IDP/subordinate_idp/<emp_id:\s+>',
				//'IDP/IDP_approvegoal_list' => 'new',
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'IDP/subordinate_idp/'=>'<IDP>/<subordinate_idp>/<r:\w+>',
				
				
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		// 'errorHandler'=>array(
		// 	// use 'site/error' action to display errors
		// 	'errorAction'=>YII_DEBUG ? null : 'site/error',
		// ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'vvf.pms@vvfltd.com',
		'basePathname'=>dirname(__FILE__),
	),
);
