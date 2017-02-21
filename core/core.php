<?php

/*
  The Kernel of the App!
*/

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
