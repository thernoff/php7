<?php
// Лексикографическая (по алфавиту) и числовая сортировки (по возрастанию/убыванию)
// По умолчанию все функции сортировки, имеющиеся в PHP, выбирают один из методов самостоятельно.
// Можно явно указать каким методом сортировать массив, передав необязательный параметр $sort_flag
// SORT_REGULAR - автоматический выбор метода (по умолчанию)
// SORT_NUMERIC - числовая сортировка
// SORT_STRING - лексикографическая сортировка

// Сортировка произвольных массивов
// Сортировка по значениям
$arr = [
    "a" => "Zero",
    "b" => "Weapon",
    "c" => "Alpha",
    "d" => "Processor"
];

asort($arr);
print_r($arr);
echo "<br/>";
arsort($arr);
print_r($arr);
echo "<br/>";

$arr2 = ["a" => "10", "b" => 1, "c" => 20, "d" => "101"];
asort($arr2); // будет выбрана числовая сортировка
print_r($arr2);
echo "<br/>";
asort($arr2, SORT_STRING); // явно задаем лексикографическую сортировку
print_r($arr2);
echo "<br/>";

// Пользовательская сортировка по значениям
//void uasort(array &$array, string $callback)