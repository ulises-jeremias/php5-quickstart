<?php

/**
 * created by Ulises J. Cornejo Fandos in 3/9/2016
 */

 # Security
 defined('INDEX_DIR') OR exit(APP_TITLE . ' software says .i.');
 //------------------------------------------------

final class Connection extends mysqli
{

  protected static $options;
  private static $instance;

  final public static function get_instance()
  {
    if (!self::$instance) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  final public function __construct()
  {
    parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->connect_errno ? die("Error en la conexion a la base de datos") : null;
    $this->set_charset("utf-8");
  }


  final public static function setOptions( array $opt ) {
    self::$options = array_merge(self::$options, $opt);
  }

  final public function query($query) {
    if( !$this->real_query($query) ) {
        throw new exception( $this->error, $this->errno );
    }
    $result = new mysqli_result($this);
    return $result;
  }

  final public function prepare($query) {
      $stmt = new mysqli_stmt($this, $query);
      return $stmt;
  }

  final public function fetch_array($query)
  {
     return mysqli_fetch_array($query);
  }

  final public function rows($query)
  {
     return mysqli_num_rows($query);
  }

  final public function scape($e)
  {
     if(!isset($e)) {
       return '';
     }
     if(is_numeric($e) and $e <= 2147483647) {
       if(explode('.',$e)[0] != $e) {
         return (float) $e;
       }
     return (int) $e;
     }
     return (string) trim(str_replace(['\\',"\x00",'\n','\r',"'",'"',"\x1a"],['\\\\','\\0','\\n','\\r',"\'",'\"','\\Z'],$e));
  }
  //------------------------------------------------
  /**
     * Borra una serie de elementos de forma segura de una tabla en la base de datos
     *
     * @param string $table: Tabla a la cual se le quiere remover un elemento
     * @param string $where: Condición de borrado que define quien/quienes son dichos elementos
     *
     * @return object PDOStatement
    */
    final public function delete($table, $where)
    {
       return $this->query("DELETE FROM $table WHERE $where;");
    }
  //------------------------------------------------
  /**
   * Inserta una serie de elementos a una tabla en la base de datos
   *
   * @param string $table: Tabla a la cual se le va a insertar elementos
   * @param array $e: Arreglo asociativo de elementos, con la estrctura 'campo_en_la_tabla' => 'valor_a_insertar_en_ese_campo',
   *                  todos los elementos del arreglo $e, serán sanados por el método sin necesidad de hacerlo manualmente al crear el arreglo
   *
   * @return object PDOStatement
  */
  final public function insert($table, $e)
  {
     if (sizeof($e) == 0) {
       trigger_error('El arreglo pasado por $this->db->insert(...) está vacío.', E_ERROR);
     }
     $query = "INSERT INTO $table (";
     $values = '';
     foreach ($e as $campo => $v) {
       $query .= $campo . ',';
       $values .= '\'' . $this->scape($v) . '\',';
     }
     $query[strlen($query) - 1] = ')';
     $values[strlen($values) - 1] = ')';
     $query .= ' VALUES (' . $values . ';';
     return $this->query($query);
  }
  //------------------------------------------------
  /**
   * Actualiza elementos de una tabla en la base de datos según una condición
   *
   * @param string $table: Tabla a actualizar
   * @param array $e: Arreglo asociativo de elementos, con la estrctura 'campo_en_la_tabla' => 'valor_a_insertar_en_ese_campo',
   *                  todos los elementos del arreglo $e, serán sanados por el método sin necesidad de hacerlo manualmente al crear el arreglo
   * @param string $where: Condición que indica quienes serán modificados
   * @param string $limit: Límite de elementos modificados, por defecto los modifica a todos
   *
   * @return object PDOStatement
  */
  final public function update($table, $e, $where, $limit = '')
  {
     if (sizeof($e) == 0) {
       trigger_error('El arreglo pasado por $this->db->update(...) está vacío.', E_ERROR);
     }
     $query = "UPDATE $table SET ";
     foreach ($e as $campo => $valor) {
       $query .= $campo . '=\'' . $this->scape($valor) . '\',';
     }
     $query[strlen($query) - 1] = ' ';
     $query .= "WHERE $where $limit;";
     return $this->query($query);
  }
  //------------------------------------------------
  /**
   * Selecciona y lista en un arreglo asociativo/numérico los resultados de una búsqueda en la base de datos
   *
   * @param string $e: Elementos a seleccionar separados por coma
   * @param string $tbale: Tabla de la cual se quiere extraer los elementos $e
   * @param string $where: Condición que indica quienes son los que se extraen, si no se coloca extrae todos
   * @param string $limit: Límite de elementos a traer, por defecto trae TODOS los que cumplan $where
   *
   * @return false si no encuentra ningún resultado, array asociativo/numérico si consigue al menos uno
  */


}

?>
