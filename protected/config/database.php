<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=52.172.200.192;dbname=vvf_pmsstructure',
	// 'connectionString' => 'mysql:host=localhost;dbname=vvf_pmsstructure',
	'emulatePrepare' => true,
	'username' => 'pms',
	'password' => 'p@$$w0rD789',
	// 'username' => 'vvfpms',
	// 'password' => 'p@$$w0rD789',
	// 'username' => 'root',
	// 'password' => 'p@$$w0rD789',
	'charset' => 'utf8',
	
);
