<?php
// Функции форматных преобразований
// sprintf()
// Спецификатор формата содержит максимум 5 элементов, записанных слитно (в порядке их следования после символа %):
// % Заполнитель [-] Размер .Точность Тип
$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
echo "$money<br/>"; // 123.1
echo sprintf("%01.2f<br>", $money); // 123.10

$year = 2019;
$month = 5;
$day = 15;
$isodate = sprintf("%04d-%02d-%02d<br/>", $year, $month, $day);
echo $isodate;

// После запятой будет отображено 6 цифр, разделитель целой и дробной части - запятая, разделитель триад в целой части - пробел
echo number_format(1056323.34000213, 6, ',', ' ');