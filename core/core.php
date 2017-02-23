<?php

/*
  The Kernel of the App!
*/

# Alerta de versión
try {
  if (version_compare(phpversion(), '5.0.0', '<'))
    throw new Exception(true);
} catch (Exception $e) {
  die('La versión actual de <b>PHP</b> es <b>' . phpversion() . '</b> y como mínimo se require la versión <b>7.0.0</b>');
}


require('core/config.php');
require('vendor/autoload.php');
require('core/kernel/Kernel.php');

__kernel_autoload('class.Router');
__models_autoload(array(
  'Connection',
  'Models',
  'Sessions',
  'Functions')
);
__functions_autoload(array(
  'Encrypt',
  'EmailTemplate',
  'Users',
  'SemanticURL')
);

$router = Router::get_instance();

?>
