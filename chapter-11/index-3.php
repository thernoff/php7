<?php
// Глобальные переменные
$monthes = [
  1 => "Январь",
  2 => "Февраль",
  3 => "Март",
  4 => "Апрель",
  5 => "Май",
  6 => "Июнь",
  7 => "Июль",
  8 => "Август",
  9 => "Сентябрь",
  10 => "Октябрь",
  11 => "Ноябрь",
  12 => "Декабрь",
];

function getMonthName($n) {
  global $monthes; // по сути создаем ссылку на массив $monthes: global $monthes ~ $monthes = &$GLOBALS['monthes']
  return $monthes[$n];
}

echo getMonthName(2);
echo "<br/>";
// Доступ к массиву $monthes из любого места программы возможен через массив $GLOBALS
function printMonthes() {
  foreach($GLOBALS['monthes'] as $month) {
    echo $month . "<br />";
  }
}

printMonthes();

// У массива $GLOBALS есть элемент с ключом GLOBAL, который содержит в себе массив $GLOBALS (а точнее ссылку на него).
echo "<pre>";
print_r($GLOBALS["GLOBALS"]);
echo "</pre>";

// Чтобы удалить глобальную переменную внутри функции, нужно использовать unset($GLOBALS['имя_переменной'])