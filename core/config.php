<?php

session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

#Connection Constants
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','');
define('DB_MOTOR', 'mysql');
define('DB_PORT', '');
define('DB_PROTOCOL','');
define('DEBUG', false);
define('E_ERNO','');

#APP Constants
/**
 * Define la carpeta en la cual se encuentra instalado el framework.
 * @example "/" si para acceder al framework colocamos http://url.com en la URL, ó http://localhost
 * @example "/main-webapp/" si para acceder al framework colocamos http://url.com/main-webapp, ó http://localhost/main-webapp/
*/
define('__ROOT__', '');
define('APP_URL',''); #Url en donde está instalado el framework, importante el "/" al final
define('HTML_DIR','html/');
define('APP_TITLE','');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP_TITLE);

#Sessions Constants
define('SESS_APP_ID', 'sess_app_id');
define('SESSION_TIME', 18000); # Tiempo de vida para las sesiones 5 horas = 18000 segundos.
define('KEY', '');
define('DB_SESSION', true);

#PHPMailer Constants
define('PHPMAILER_HOST','');
define('PHPMAILER_USER','');
define('PHPMAILER_PASS','');
define('PHPMAILER_PORT','');

?>
