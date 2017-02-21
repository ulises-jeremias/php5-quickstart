<?php

# Security
defined('INDEX_DIR') OR exit(APP_TITLE . ' software says .i.');
//------------------------------------------------

class profilesController extends Controller {

  public function __construct() {
    parent::__construct(true);
    if ($this->sessions->session_in_use()) {
      $this->render('profile/profile');
    } else {
      Func::redirect();
    }
  }
}

?>
