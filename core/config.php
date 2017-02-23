<?php

session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

#Connection Constants
define('DB_HOST','localhost'); #Server for connection to the database
define('DB_USER','root'); #User for the database
define('DB_PASS',''); #Password for the database
define('DB_NAME',''); #Name of the database
define('DB_MOTOR', 'mysql'); #Motor of the database
define('DB_PORT', ''); #Connecting port for some motors
define('DB_PROTOCOL',''); #Connection Protocol for Oracle


#APP Constants
/**
 * Defines the directory in which the framework is installed
 * @example "/" If to access the framework we place http://url.com in the URL, or http://localhost
 * @example "/main-webapp/" if to access the framework we place http://url.com/main-webapp, or http: //localhost/main-webapp/
*/
define('__ROOT__', '');
define('APP_URL',''); #Url where the framework is installed, the "/" is important at the end
define('HTML_DIR','html/');
define('APP_TITLE','');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP_TITLE);

#Sessions Constants
define('SESS_APP_ID', 'sess_app_id');
define('SESSION_TIME', 18000); # Life time for sessions 5 hours = 18000 seconds.
define('KEY', '');
define('DB_SESSION', true);

define('E_ERNO','');

# Set to FALSE once all production is in progress, it is recommending to keep in TRUE
define('DEBUG', false);

#PHPMailer Constants
define('PHPMAILER_HOST','');
define('PHPMAILER_USER','');
define('PHPMAILER_PASS','');
define('PHPMAILER_PORT','');

?>
