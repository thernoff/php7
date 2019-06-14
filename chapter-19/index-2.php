<?php
// Построение строкового представления даты
echo date('U', time()); // U - количество секунд, прошедших с полуночи 1 января 1970 года
echo "<br/>";
echo date('z'); // Номер дня от начала года
echo "<br/>";
echo date('Y'); // Год, 4 цифры
echo "<br/>";
echo date('y'); // Год, 2 цифры
echo "<br/>";
echo date('F'); // Название месяца
echo "<br/>";
echo date('m'); // Номер месяца
echo "<br/>";
echo date('M'); // Название месяца, трехсимвольная аббревиатура
echo "<br/>";
echo date('d'); // Номер дня в месяце, всегда 2 цифры
echo "<br/>";
echo date('w'); // День недели, 0 соответствует воскресенью, 1 - понедельнику и т.п.
echo "<br/>";

echo date('l dS of F Y h:i:s A');
echo "<br/>";

echo date('Сегодня d.m.Y');
echo "<br/>";

echo date("Этот файл датирован d.m.Y<br/>", filectime(__FILE__));
echo "<br/>";