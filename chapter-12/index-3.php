<?php
// Делегирование генераторов
// Передача функции обратного вызова, как было описано выше, вовсе не обязательна.
// Логику обработки данных можно поместить в сами генераторы. Начиная с PHP 7 одни генераторы
// можно вызвать из других, используя ключевое слово from после yield.
// Такой прием называется делегированием.

// Квадраты четных чисел.
function square_1($value) {
    yield $value * $value;
}

function even_square_1($arr) {
    foreach($arr as $value) {
        if ($value % 2 == 0) yield from square_1($value);
    }
}

function square_2($value) {
    return $value * $value;
}

function even_square_2($arr) {
    foreach($arr as $value) {
        if ($value % 2 == 0) yield square_2($value);
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7];
foreach(even_square_1($arr) as $val) echo "$val ";
echo "<br/>";
foreach(even_square_2($arr) as $val) echo "$val ";
echo "<br/>";

// После ключевого слова могут идти не только генераторы, но и массивы.
// Использование массивов
function generator() {
    yield 1;
    yield from [2, 3];
}

foreach (generator() as $i) {
    echo "$i ";
}
echo "<br/>";