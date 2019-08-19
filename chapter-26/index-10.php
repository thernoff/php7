<?php
// Блоки-финализаторы
function eatThis() {
  throw new Exception("bang-bang!");
}

function hello() {
  echo "Все, что имеет начало,<br/>";
  try {
    eatThis();
  } catch(Exception $e) {
    echo $e->getMessage() . "<br/>";
  } finally {
    echo " имеет и конец.<br/>";
  }
}

// Вызываем функцию
hello();

// Перехват всех исключений.
echo "<br/>";
echo "Перехват всех исключений";
echo "<br/>";
echo "<br/>";
// Фактически мы эмулируем finally в программах в версиях PHP до 5.4
class HeadshotException extends Exception {}

// Функция, генерирующая исключение
function eatThis2() {
  throw new HeadshotException("bang-bang!");
}

// Функция с кодом-финализатором
function action() {
  echo "Все, что имеет начало,";
  try {
    eatThis2();
  } catch (Exception $e) {
    // Ловим ЛЮБОЕ исключение, выводим текст...
    echo " имеет и конец.<br/>";
    // ... а потом передаем это исключение дальше
    throw $e;
  }
}

try {
  action();
} catch (HeadshotException $e) {
  echo "Извините, вы застрелились: {$e->getMessage()}";
}