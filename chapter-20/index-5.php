<?php
// Квантификаторы повторений
// При использовании квантификаторов, делается попытка найти как можно более длинную строку

// * - ноль или более повторений
$str = 'H3llo W0rld!!!';
preg_match('/\w*\s/', $str, $m); // H3llo
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\s\w*/', $str, $m); // W0rld
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\w*l*/', $str, $m); // Будет H3llo, т.к. под \w* попадает именно все слово
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/l*/', $str, $m); // Пустая строка
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\dl*\w/', $str, $m); // 3llo
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\w*ll*/', $str, $m); // H3ll
echo "<pre>";
print_r($m);
echo "</pre>";

// + - одно или более совпадений
preg_match('/\w*l+/', $str, $m);
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/!+/', $str, $m); // !!!
echo "<pre>";
print_r($m);
echo "</pre>";

// ? - ноль или одно совпадение

// {} - заданное число совпадений
// X{n,m} - символ X может быть повторен от n до m раз;
// X{n} - символ X может быть повторен ровно n раз;
// X{n,} - символ X может быть повторен n и более раз.

preg_match('/l{2}/', $str, $m); // ll
echo "<pre>";
print_r($m);
echo "</pre>";