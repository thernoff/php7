<?php
// Пример списка (по сути это массив с индексами 0, 1, 2, 3...)
$list[] = 'first';
$list[] = 'second';
$list[] = 'third';

for ($i = 0; $i < count($list); $i++) {
    echo "Элемент с индексом $i равен $list[$i]";
    echo "<br/>";
}

// Пример ассоциативного (хэш) массива
$hash = [
    'first' => 1,
    'second' => 2,
    'third' => 3
];

foreach($hash as $key => $value) {
    echo "Элемент с индексом $key равен $hash[$key]";
    echo "<br/>";
}