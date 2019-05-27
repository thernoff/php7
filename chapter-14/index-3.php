<?php
// Переворачивание массива
$arr = [
    "a" => "Zero",
    "b" => "Weapon",
    "c" => "Alpha",
    "d" => "Processor"
];

asort($arr); // Сортируем
print_r($arr);
echo "<br/>";
$arr = array_reverse($arr); // Переворачиваем
print_r($arr);
echo "<br/>";

echo "<br/>";

$arr2 = [
    "a" => "Zero",
    "b" => "Weapon",
    "c" => "Alpha",
    "d" => "Processor"
];

asort($arr2); // Сортируем
print_r($arr2);
echo "<br/>";
// Переворачиваем, но числовые ключи остануться в прежнем порядке
// Нечисловые ключи не подвержены этой опции и всегда сохраняются.
$arr2 = array_reverse($arr2, true); 
print_r($arr2);
echo "<br/>";

echo "<br/>";

$arr3 = [
    1 => "Zero",
    2 => "Weapon",
    3 => "Alpha",
    4 => "Processor"
];

asort($arr3); // Сортируем
print_r($arr3);
echo "<br/>";
// Переворачиваем, но числовые ключи остануться в прежнем порядке
// Нечисловые ключи не подвержены этой опции и всегда сохраняются.
// Если будет false, то ключи будут сброшены и равны 0, 1, 2 и 3
$arr3 = array_reverse($arr3, true); 
print_r($arr3);
echo "<br/>";