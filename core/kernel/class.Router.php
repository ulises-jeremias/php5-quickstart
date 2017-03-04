<?php

/**
 * created by Ulises J. Cornejo Fandos on 28/12/2016
 */

 # Security
 defined('INDEX_DIR') OR exit(APP_TITLE . 'software says .i.');
 //------------------------------------------------

final class Router
{
  private static $instance;
  public $dir = __ROOT__;
  private $controller = null;
  private $method = null;
  private $id = null;

  final static function get_instance() {
    if (!self::$instance) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  final public function __construct()
  {
    $this->session = Sessions::get_instance();
    $this->url = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if($this->dir == '/' and strlen($this->url) > strlen($this->dir)) {
      $this->url[0] = '';
    } else {
      $this->url = explode($this->dir,$this->url);
      $this->url = $this->url[1];
    }
    if(!empty($this->url) and $this->url != $this->dir) {
      $this->url = explode('/',$this->url);
      $this->controller = ctype_alnum($this->url[0]) ? strtolower( $this->url[0] ) . 'Controller' : 'homeController';
      $this->method = array_key_exists(1,$this->url) ? $this->url[1] : null;
      $this->id = array_key_exists(2,$this->url) ? intval($this->url[2]) : null;
    } else {
      $this->controller = 'homeController';
    }
  }

  //------------------------------------------------
  /**
    * Returns actual driver
  */
  final public function getController()
  {
    return trim($this->controller);
  }
  //------------------------------------------------
  /**
    * Returns actual method if exists
  */
  final public function getMethod()
  {
    return $this->method;
  }
  //------------------------------------------------
  /**
   * Returns actual id if exists
  */
  final public function getId()
  {
    return $this->id;
  }

  final public function __destruct()
  {
    # code
  }

}


?>
