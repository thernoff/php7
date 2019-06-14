<?php
// Установка часового пояса
// Установка значения директивы date.timezone производится в конфигурационном файле
// php.ini или
// date_default_timezone_set("Europe/Moscow");

// Представление времени в формате timestamp
echo time(); // время в секундах от 1 января 1970 года по Гринвичу
echo "<br/>";

// microtime() вернет 0.55940700 1560414729
// microtime(true) вернет 1560414729.55940700
echo microtime();
echo "<br/>";
list($frac, $sec) = explode(" ", microtime());
$time = $frac + $sec;
echo $time;
echo "<br/>";
echo microtime(true);
echo "<br/>";

// Вычисление работы времени скрипта
define("START_TIME", microtime(true));
printf("Время работы скрипта: %.5f с", microtime(true) - START_TIME);
echo "<br/>";

// Большие вещественные числа
$t = microtime(true);
printf("С начала эпохи UNIX: %f секунд.<br/>", $t); // С начала эпохи UNIX: 1560415074.828124 секунд.
echo "С начала эпохи UNIX: $t секунд.<br/>"; // С начала эпохи UNIX: 1560415074.8281 секунд.