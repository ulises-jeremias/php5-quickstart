# PHP5-QuickStart

[![MIT License](https://img.shields.io/packagist/l/doctrine/orm.svg)](https://opensource.org/licenses/MIT)
![Made in PHP 5](https://img.shields.io/badge/php-5-blue.svg)
![Estable Version](https://img.shields.io/badge/stable-1.0.0-blue.svg)

## Introduction

Welcome to the PHP5-quickstart-repository, a functional application that you can use as the skeleton for your new applications.


## Requirements

To place the framework in production requires a VPS, Dedicated or Hosting that fulfills the following characteristics:

* PHP 5
* APACHE 2

## Setup
### Download
Clone the repository.
```
  git clone https://github.com/ulises-jeremias/php5-quickstart.git
```

Downloading manually.

[Downloads](https://github.com/ulises-jeremias/php5-quickstart/releases)

### Settings

In case of being in LINUX and obtain problems of writing permissions by the Firewall, put in the console the following:

```
  ~ $ sudo chmod -R 777 /path/where/the/framework/is/located
```

__./core/config.php__

```php

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
```

## First Hello World

Create __./core/controllers/helloController.php__
```php

  class helloController extends Controller {

    public function __construct() {
      parent::__construct();
      $this->render('hello/hello');
    }

  }
```
Create __./html/hello/hello.php__

```php

<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
  <body>
    <?php $this->render('overall/topnav'); ?>
    <div class="umd_container">
    	<h1>Hello World!!!</h1>
    	<hr><br>
    </div>
    <?php $this->render('overall/footer'); ?>
  </body>
</html>
```

Access to http://url.com/hello/