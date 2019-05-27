<?php
// Работа со стеком и очередью
// Добавление к списку элементов
$arr = [5, 10, 15];
$res = array_push($arr, 20, 25, 30);
echo "<pre>";
print_r($arr);
print_r($res); // 6
echo "</pre>";

$last = array_pop($arr);
echo "<pre>";
print_r($arr);
print_r($last); // 30
echo "</pre>";

$garbage = [10, "a" => 20, 30, "color" => "red"];
$res = array_unshift($garbage, "!", "?"); // ["!", "?", 10, "a" => 20, 30, "color" => "red"]
echo "<pre>";
print_r($garbage);
print_r($res); // 6
echo "</pre>";

$first = array_shift($garbage);
echo "<pre>";
print_r($garbage);
print_r($first); // !
echo "</pre>";