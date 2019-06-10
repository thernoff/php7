<?php
// Не-числа
$sqrt = sqrt(-1);
echo "<pre>";
echo $sqrt; // NAN
echo "<br/>";
var_dump(is_nan($sqrt)); // true
var_dump(1/0);
var_dump(is_nan(1/0)); // Warning:  Division by zero, false
var_dump(is_nan(INF)); // false
var_dump(is_numeric(NAN)); // true
var_dump(is_infinite(INF)); // true

echo "</pre>";
