<?php
// Работа с множествами
// Пересечение
$native = ["green", "red", "blue"];
$colors = ["red", "yellow", "green", "cyan", "black"];
$inter = array_intersect($colors, $native); // Получаем не список, а ассоциативный массив [0 => "red", "2" => "green"]
echo "<pre>";
print_r($inter);
echo "</pre>";

// Разность
$diff = array_diff($colors, $native);// ["1" => "yellow", "3" => "cyan", "4" => "black"]
echo "<pre>";
print_r($diff);
echo "</pre>";

// Объединение (имитируем с помощью функций array_merge() и array_unique())
//$input = ["a" => "green", "red", "b" => "green", "blue", "red"];
//$result = array_unique($input); // ["a" => "green", 0 => "red", 1 => "blue"]

$union = array_unique(array_merge($colors, $native));
echo "<pre>";
print_r($union);
echo "</pre>";