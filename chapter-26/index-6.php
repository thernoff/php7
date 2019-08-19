<?php
// Исключения и set_error_handler()
// Чуть ранее был рассмотрен другой подход к обработке нефатальных ошибок, через
// вызов функции set_error_handler(). Функция-обработчик имеет один огромный недостаток:
// в ней неизвестно точно, что же следует предпринять в случае возникновения ошибки.
// Сравним явно механизм обработки исключений и метод перехвата ошибок.

// Недостатки set_error_handler()
echo "Начало программы.<br/>";
set_error_handler("handler");
{
  // Код, в котором перехватываются исключения
  echo "Все, что имеет начало...<br/>";
  // Генерируем ("выбрасываем") исключение
  trigger_error("Hello!");
  echo "...имеет и конец.<br/>";
}

echo "Конец программы.<br/>";
// Функция-обработчик
function handler($num, $str) {
  // Код обработчика
  echo "Ошибка: $str<br/>";
  //exit();
}
/*
В одном случае (если используется exit() в handler()) мы получим:
Начало программы.
Все, что имеет начало...
Ошибка: Hello!
В другом (без exit()):
Начало программы.
Все, что имеет начало...
Ошибка: Hello!
...имеет и конец.
Конец программы.

Что не совсем то что нужно.
*/