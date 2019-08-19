<?php
// Преобразование ошибок в исключения
/* echo "<pre>";
var_dump(E_ALL);
var_dump(2 & 6);
echo "</pre>";
die; */
require_once "PHP/Exceptionizer.php";
try {
  throw new Exception("Alert");
} catch (Exception $e) {
  echo "<pre>";
  echo $e;
  echo "</pre>";
}

$w2e = new PHP_Exceptionizer(E_ALL);
try {
  //fopen("spoon", "r");
  $a = 1 / 0;
} catch (E_WARNING $e) {
  echo "<pre>";
  echo $e;
  echo "</pre>";
}

unset($w2e);