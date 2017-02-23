<?php

/**
 *
 */

final class Func
{

  final public static function redirect($url = APP_URL) {
    header('location: ' . $url);
  }

  //------------------------------------------------
  /**
    * Alias de Empty, más completo
    *
    * @param midex $var: Variable a analizar
    *
    * @return true si está vacío, false si no, un espacio en blanco cuenta como vacío
  */
  final static function emp($var)
  {
    return (isset($var) && empty(trim(str_replace(' ','',$var))));
  }
  //------------------------------------------------
  /**
    * Analiza que TODOS los elementos de un arreglo estén llenos, útil para analizar por ejemplo que todos los elementos de un formulario esté llenos
    * pasando como parámetro $_POST
    *
    * @param array $array, arreglo a analizar
    *
    * @return true si están todos llenos, false si al menos uno está vacío
  */
  final static function all_full($array)
  {
    foreach($array as $e) {
      if(self::emp($e) and $e != '0') {
        return false;
      }
    }
    return true;
  }
  //------------------------------------------------
  /**
    * Alias de Empty() pero soporta más de un parámetro
    *
    * @param infinitos parámetros
    *
    * @return true si al menos uno está vacío, false si todos están llenos
  */
   final public static function e()
   {
     for ($i = 0, $nargs = func_num_args(); $i < $nargs; $i++) {
       if(self::emp(func_get_arg($i)) and func_get_arg($i) != '0') {
         return true;
       }
     }
     return false;
   }
   //------------------------------------------------
   /**
     * Alias de date() pero devuele días y meses en español
     *
     * @param string $format: Formato de salida (igual que en date())
     * @param int $time: Tiempo, por defecto es time() (igual que en date())
     *
     * @return string con la fecha en formato humano (y en español)
   */
  final public static function fecha($format, $time = 0)
  {
    $date = date($format,$time == 0 ? time() : $time);
    $cambios = array(
      'Monday'=> 'Lunes',
      'Tuesday'=> 'Martes',
      'Wednesday'=> 'Miércoles',
      'Thursday'=> 'Jueves',
      'Friday'=> 'Viernes',
      'Saturday'=> 'Sábado',
      'Sunday'=> 'Domingo',
      'January'=> 'Enero',
      'February'=> 'Febrero',
      'March'=> 'Marzo',
      'April'=> 'Abril',
      'May'=> 'Mayo',
      'June'=> 'Junio',
      'July'=> 'Julio',
      'August'=> 'Agosto',
      'September'=> 'Septiembre',
      'October'=> 'Octubre',
      'November'=> 'Noviembre',
      'December'=> 'Diciembre',
      'Mon'=> 'Lun',
      'Tue'=> 'Mar',
      'Wed'=> 'Mie',
      'Thu'=> 'Jue',
      'Fri'=> 'Vie',
      'Sat'=> 'Sab',
      'Sun'=> 'Dom',
      'Jan'=> 'Ene',
      'Aug'=> 'Ago',
      'Apr'=> 'Abr',
      'Dec'=> 'Dic'
    );
    return str_replace(array_keys($cambios),array_values($cambios),$date);
  }
}

?>
