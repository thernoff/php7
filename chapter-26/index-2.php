<?php
// Генерация ошибок
// Помимо ошибок, генерируемых интерпретатором PHP, разработчики могут генерировать собственные ошибки при помощи функции trigger_error(),
// которая позволяет сгенерировать только ошибки пользовательского уровня: E_USER_ERROR, E_USER_WARNING и E_USER_NOTICE.
function print_age($age) {
  if ($age < 0) {
    // Будет будет сгенерирована ошибка и отображена в окне браузера
    trigger_error("Функция print_age(): возраст не может быть отрицательным", E_USER_ERROR);
  }

  echo "Возраст составляет: $age";
}

//print_age(25);
//echo "<br/>";
//print_age(-25);
//echo "<br/>";

// Функция error_log() заставляет интерпретатор записать некоторый текст в файл журнала (при нулевом $type и по умолчанию), заданный в директиве error_log
// $type == 0 записывает сообщение в системный файл журнала или в файл, заданный в директиве error_log.
// $type == 1 отправляет сообщение на почту адресату, чей адрес указан в $dest, при этом $extra_headers используется в качестве дополнительных почтовых
// заголовков.
// $type == 3 сообщение добавляется в конец файла с именем $dest.

function print_age2($age) {
  if ($age < 0) {
    // Будет произведена запись в системный файл журнала
    error_log("Функция print_age(): возраст не может быть отрицательным");
    return;
  }

  echo "Возраст составляет: $age";
}

//print_age2(25);
//echo "<br/>";
//print_age2(-25);
//echo "<br/>";