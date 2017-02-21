<?php

# Security
defined('INDEX_DIR') OR exit(APP_TITLE . ' software says .i.');
//------------------------------------------------

class errorController extends Controller {

  public function __construct() {
    parent::__construct();
    $this->render('error/error');
  }

}

?>
