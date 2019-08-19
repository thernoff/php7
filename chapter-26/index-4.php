<?php
// Исключения
// Исключение - это некоторое сообщение об ошибке вида "серьезная"
// Базовый синтаксис
echo "Начало программы.<br/>";
try {
  // Код, в котором перехватываются исключения
  echo "Все, что имеет начало...<br/>";
  // Генерируем ("выбрасываем") исключение
  throw new Exception("Hello!");
  echo "...имеет и конец.<br/>";
} catch (Exception $e) {
  // Код обработчика
  echo "Исключение: {$e->getMessage()}<br/>";
}
echo "Конец программы.<br/><br/>";

// Раскрутка стека
echo "<b>Раскрутка стека</b> <br/>";
echo "Начало программы.<br/>";
try {
  echo "Начало try-блока.<br/>";
  outer();
  echo "Конец try-блока.<br/>";
} catch (Exception $e) {
  echo "Исключение: {$e->getMessage()}<br/>";
}
echo "Конец программы.<br/>";

function outer() {
  echo "Вошли в функцию " . __METHOD__ . "<br/>";
  inner();
  echo "Вышли из функции " . __METHOD__ . "<br/>";
}

function inner() {
  echo "Вошли в функцию " . __METHOD__ . "<br/>";
  throw new Exception("From inner");
  echo "Вышли из функции" . __METHOD__ . "<br/>";
}