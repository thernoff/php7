<?php
// Сортировка списков
$arr = ["One", "Two", "Three", "Four"];

print_r($arr);
echo "<br/>";
sort($arr);
print_r($arr);
echo "<br/>";
echo "<br/>";

$arr2 = [
    "a" => "Zero",
    "b" => "Weapon",
    "c" => "Alpha",
    "d" => "Processor"
];

print_r($arr2);
echo "<br/>";
sort($arr2); // при сортировке ключи ассоциативного массива будут потеряны
print_r($arr2);
echo "<br/>";
echo "<br/>";

// Пользовательская сортировка списка
$tools = ["One", "Two", "Three", "Four"];
usort($tools, function($a, $b) {
    return $a <=> $b;
});

print_r($tools);
echo "<br/>";
