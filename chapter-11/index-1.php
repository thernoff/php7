<?php
// Переменное число параметров
function myEcho(...$planets) {
  foreach ($planets as $planet) {
    echo "$planet<br />";
  }
}

myEcho("Меркурий", "Венера", "Земля", "Марс");

// Оператор ... может использоваться не только перед аргументами функций, но и при вызове с массивом. Это позволяет осуществить "развертывание" массива.
function tooManyArgs($fst, $snd, $thd, $fth) {
  echo "$fst $snd $thd $fth<br />";
}

$planets = ["Меркурий", "Венера", "Земля", "Марс"];
tooManyArgs(...$planets);