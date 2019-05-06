<?php
// Типы аргументов и возвращаемого значения

// Для строгой типизации нужно включить режим strict_types (указывать нужно в начале скрипта)
// до версии PHP 7 будет ошибка и остановка программы, начиная с PHP 7 вместо ошибки генерируется исключение TypeError, которой можно перехватить.
//declare(strict_types = 1); 

function sum(int $fst, int $snd) : int {
  return $fst + $snd;
}

echo sum(2, 3); // 5
echo "<br/>";

echo sum(2.5, 3.5); // 5
echo "<br/>";


function diff(int $fst, int $snd) : int {
  return $fst - $snd;
}

echo diff(8, 3); // 5
echo "<br/>";

echo diff(8.5, 3.5); // 5
echo "<br/>";