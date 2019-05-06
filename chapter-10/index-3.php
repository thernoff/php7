<?php
// Операции над массивами
$colors = ['black' => '#000', 'white' => '#fff', 'yellow' => '#ff0', 'green' => '#0f0', 'blue' => '#00f'];
// Доступ по ключу
echo $colors['green'];
echo "<br/>";

// Начиная с PHP 5.4 можно SomeFuncReturnArray()[5]

$refYellow = &$colors['yellow']; // ссылка на элемент массива с индексом 'yellow'.
$refYellow = '#eee';
echo $colors['yellow'];
echo "<br/>";

// Слияние массивов (при слиянии содержимое основного массива не меняется, но дополняется содержимым других массивов)
$addColors = ['red' => '#f00', 'gray' => '#eee', 'yellow' => '#ff0'];
// !!! элемент с индексом 'yellow'  не будет изменен. При конкатенации массивов с элементами у которых ключи одинаковые, в результирующем массиве
// останется только один элемент с таким же ключом - тот, который был в первом массиве, и на том же самом месте.
$sumArrs = $colors + $addColors;
echo "<pre>";
print_r($sumArrs);
echo "</pre>";

// Обновление элементов
// Обновить элементы в массиве можно с помощью стандартной функции array_merge
// В этом случае элемент с индексом 'yellow' будет обновлен.
$mergedArrays = array_merge($colors, $addColors);
$sumArrs = $colors + $addColors;
echo "<pre>";
print_r($mergedArrays);
echo "</pre>";

// или можно воспользоваться циклом чтобы обновить массив
foreach ($addColors as $key => $color) {
    $colors[$key] = $color;
}
echo "<pre>";
print_r($colors);
echo "</pre>";