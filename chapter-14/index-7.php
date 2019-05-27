<?php
// Ключи и значения
$names = [
    "Joel" => "Silver",
    "Grant" => "Hill",
    "Andrew" => "Mason"
];

$newNames = array_flip($names); // меняем ключи и значения местами
echo "<pre>";
print_r($newNames);
echo "</pre>";
echo "<br/>";

// Получаем список ключей массива
$keys = array_keys($names);
//$keys = array_keys($names, 'Hill');
echo "<pre>";
print_r($keys);
echo "</pre>";
echo "<br/>";

// Получаем список значений
$values = array_values($names);
echo "<pre>";
print_r($values);
echo "</pre>";
echo "<br/>";

var_dump(in_array("Mason", $names)); // true
echo "<br/>";
var_dump(in_array("Hadson", $names)); // false

// Количество вхождений значений в списке
$list = [1, "hello", 1, "world", "hello", 1];
echo "<pre>";
print_r(array_count_values($list));
echo "</pre>";
echo "<br/>";

// Слияние массивов (помогает избавиться от недостатков оператора + для массивов)
$l1 = [10, 20, 30];
$l2 = [15, 20, 25, 30, 35];
$l = array_merge($l1, $l2); // [10, 20, 30, 15, 20, 25, 30, 35]
echo "<pre>";
print_r($l);
echo "</pre>";
echo "<br/>";

$a1 = ['one' => 'A', 'two' => 'B', 'three' => 'C'];
$a2 = ['one' => 1, 'four' => 4, 'five' => 5];
$a = array_merge($a1, $a2); // [1, 'B', 'C', 4, 5]
echo "<pre>";
print_r($a);
echo "</pre>";
echo "<br/>";

$a1 = [1 => 'A', 2 => 'B', 3 => 'C'];
$a2 = [1 => 'one', 4 => 'four', 5 => 'five'];
$a = array_merge($a1, $a2); // ['A', 'B', 'C', 'one', 'two', 'three']
echo "<pre>";
print_r($a);
echo "</pre>";
echo "<br/>";