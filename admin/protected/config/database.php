<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=vvf_pmsstructure',
	'emulatePrepare' => true,
	'username' => 'vvf_admin',
	'password' => 'p@$$w0rD789',
	'charset' => 'utf8',
	
);
