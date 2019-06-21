<?php
// Простые символы (литералы)
echo preg_replace('/at/', 'AT', "What is the Perl Compatible Regex?");
echo "<br/>";

// Точка (.) - обозначает один любой символ.
preg_match('/a.c/', 'abc', $m); // Совпадение
echo "<pre>";
print_r($m);
echo "</pre>";
preg_match('/a.c/', 'adc', $m); // Совпадение
echo "<pre>";
print_r($m);
echo "</pre>";
preg_match('/a.c/', 'abdc', $m); // Совпадений нет
echo "<pre>";
print_r($m);
echo "</pre>";

// \s - соответствует "пробельному" символу: пробелу, знаку табуляции (\t),
// переносу строки (\n) или возврату каретки (\r)

// \S - любой символ, кроме пробельного;

// \w - любая буква или цифра

// \W - не буква и не цифра

// \d - цифра от 0 до 9

// \D - все, что угодно, но только не цифра

$str = 'H3llo w0rld!!!';

preg_match('/\S/', $str, $m); // H
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\w/', $str, $m); // H
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\d/', $str, $m); // 3
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\D/', $str, $m); // H
echo "<pre>";
print_r($m);
echo "</pre>";