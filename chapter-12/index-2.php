<?php
// Обработка каждого элемента массива
function collect($arr, $callback) {
    foreach($arr as $value) {
        yield($callback($value)); 
    }
}

$arr = [1, 2, 3, 4, 5, 6];
$collect = collect($arr, function($e) { return $e * $e; });

foreach ($collect as $val) echo "$val ";
echo "<br/>";

// Похожие возможности предоставляет стандартная функция array_walk(). Однако, в отличие от
// генераторов, array_walk() не может фильтровать содержимое массива.
// Извлекаем только четные элементы.
function select($arr, $callback) {
    foreach ($arr as $value) {
        if ($callback($value)) yield $value;        
    }
}

$arr2 = [1, 2, 3, 4, 5, 6, 7];
$select = select($arr2, function($e) {
    return $e % 2 == 0 ? true : false;
});

foreach ($select as $val) echo "$val ";
echo "<br/>";

// Извлекаем только нечетные элементы
function reject($arr, $callback) {
    foreach($arr as $value) {
        if (!$callback($value)) yield $value;
    }
}

$arr3 = [11, 12, 32, 43, 55, 63, 76];
$reject = reject($arr3, function($e){
    return ($e % 2 == 0) ? true : false;
});

foreach($reject as $val) echo "$val ";
echo "<br/>";

// Генераторы можно комбинировать друг с другом.
// Квадраты четных элементов.
$arr4 = [1, 2, 3, 4, 5, 6];
$select = select($arr, function($e) { return $e % 2 == 0 ? true : false; });
$collect = collect($select, function($e) { return $e * $e; });
foreach ($collect as $val) echo "$val ";
echo "<br/>";