<?php

  //------------------------------------------------

  define('INDEX_DIR', true);
  # Kernel load
  require('core/core.php');
  __kernel_autoload('class.Controller');

  //------------------------------------------------

  # Driver Detection
  $Controller = $router->getController();

  //------------------------------------------------

  # Identification of the controller in the system
  if(!file_exists('core/controllers/' . $Controller . '.php')) {
    $Controller = 'errorController';
  }

  # Loading selected driver
  require('core/controllers/' . $Controller . '.php');
  new $Controller;

  //------------------------------------------------

?>
