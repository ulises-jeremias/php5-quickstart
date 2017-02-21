<?php

function Encrypt($string) {
  // Function made to be used in user passwords
  $str = '';
  for ($i = 0; $i < strlen($string); $i++) {
    $str .= ($i % 2) != 0 ? md5($string[$i]) : $i;
  }
  return md5($str);
}

function encrypt_with_key($string, $key) {
  // Function made to be used in networks passwords
   $result = '';
   for($i = 0; $i < strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key)) - 1, 1);
      $char = chr(ord($char) + ord($keychar));
      $result .= $char;
   }
   return base64_encode($result);
}

function decrypt_with_key($string, $key) {
  // Function made to be used in networks passwords
   $result = '';
   $string = base64_decode($string);
   for($i = 0; $i < strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key)) - 1, 1);
      $char = chr(ord($char) - ord($keychar));
      $result .= $char;
   }
   return $result;
}

?>
