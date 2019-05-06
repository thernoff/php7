<?php
// Установка типа переменной
$a = "Hello";
echo $a;
echo "<br/>";
var_dump(settype($a, "integer")); // true
echo "<br/>";
echo $a;
echo "<br/>";
echo "<br/>";

$b = "123";
echo $b;
echo "<br/>";
var_dump(settype($b, "float")); // 1
echo "<br/>";
echo $b;
echo "<br/>";
echo "<br/>";

$c = "Hello world";
$obj = (object) $c;
$arr = (array) $c;

print_r($obj);
echo "<br/>";
print_r($arr);