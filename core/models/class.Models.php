<?php

/**
 * created by Ulises J. Cornejo Fandos in 27/12/2016
 */
 # Security
 defined('INDEX_DIR') OR exit(APP_TITLE . ' software says .i.');
 //------------------------------------------------

interface Functions
{
  function __construct();
  function __destruct();
}

abstract class Models implements Functions
{

  protected $db; // All model class needs an instance variable of class Connection.
  protected $id; // Every table in the database has a column for the identifier.
  protected $router;

  abstract static function get_instance();

  public function __construct()
  {
    $this->db = new Connection;
    global $router;
    $this->router = $router;
  }

  protected function Purifier($elem)
  {
      return str_replace(array('<script>','</script>','<script src','<script type='), '', $elem);
  }

  public function __destruct()
  {
    $this->db->close();
  }

}

?>
