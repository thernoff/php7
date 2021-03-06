<?php
// Статические переменные (значение статической переменной запоминается)
function selfCount() {
  // Конструкция static сообщает компилятору, что уничтожать указанную переменную для нашей функции между вызовами не надо.
  // Причем присваивание $count = 0 сработает только один раз, а именно при самом первом обращении к функции.
  static $count = 0; // если убрать слово static, то будет выводится все время "1"
  $count++;
  echo $count . "</br>";
}

for ($i = 0; $i < 5; $i++) {
  selfCount();
}