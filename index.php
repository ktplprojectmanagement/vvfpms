<?php
ini_set('display_errors', 1);

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
ini_set('memory_limit', '-1');
require_once($yii);
Yii::createWebApplication($config)->run();
//date_default_timezone_set('Asia/Kolkata');
