<?php
// Календарные классы PHP
// PHP предоставляет несколько классов для работы с датой и временем в объектно-ориентированном стиле.
// Класс DateTime
$date = new DateTime();
echo $date->format("d-m-Y H:i:s");
echo "<br/>";
// Явная установка даты
$date = new DateTime("2016-01-01 00:00:00");
echo $date->format("d-m-Y H:i:s");
echo "<br/>";
// Для популярных форматов времени класс DateTime содержит несколько констант-строк
echo $date->format(DateTime::ISO8601);
echo "<br/>";
echo $date->format(DateTime::RSS);
echo "<br/>";
echo "<br/>";

// Класс DateTimeZone позволяет задавать часовые пояса для DateTime-объектов
$date = new DateTime("2016-01-01 00:00:00", new DateTimeZone("Europe/Moscow"));
echo $date->format("d-m-Y H:i:s");
echo "<br/>";
echo "<br/>";

// Класс DateInterval
// Самый простой способ получить объект класса DateInterval - воспользоваться методом diff(), произведя вычитание
// одного объекта класса DateTime из другого
$date = new DateTime('2015-01-01 0:0:0');
$nowDate = new DateTime();
$interval = $nowDate->diff($date);
// Выводим результаты
echo $date->format("d-m-Y H:i:s");
echo "<br/>";
echo $nowDate->format("d-m-Y H:i:s");
echo "<br/>";
// Выводим разницу
echo $interval->format("%Y-%m-%d %H:%S");
echo "<br/>";
// Выводим дамп интервала
echo "<pre>";
print_r($interval);
echo "</pre>";
echo "<br/>";
// Создание интервала DateInterval при помощи конструктора
$nowDate = new DateTime();
/*
  P3Y1M14DT12H19M2S - означает 3 года, 1 месяц, 14 дней, 12 часов, 19 минут, 2 секунды
*/
$date = $nowDate->sub(new DateInterval("P3Y1M14DT12H19M2S"));
echo $date->format("Y-m-d H:i:s");
echo "<br/>";
echo "<br/>";

// Класс DatePeriod позволяет создать итератор для обхода последовательности дат (в виде DateTime-объектов), следующих друг за другом
// через определенный интервал времени.
$now = new DateTime();
$step = new DateInterval("P1W");
$period = new DatePeriod($now, $step, 5);
foreach ($period as $datetime) {
  echo $datetime->format("Y-m-d");
  echo "<br/>";
}