<?php

define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'CSCI4380_TechExercise');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once 'MySQLiDb.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
*/

define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "csci4380");

/**
* Get instance of DB object
*/
function getDbInstance()
{
	return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
}