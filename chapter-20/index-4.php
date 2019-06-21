<?php
// Альтернативы

$str = 'H3llo W0rld!!!';
// Можно использовать квадратные скобки для указания альтернатив
// /h[123]/ соответствует h1l, h2l, h3l (без учета регистра)
preg_match('/h[123]l/i', $str, $m); // H3l
echo "<pre>";
print_r($m);
echo "</pre>";

// [a-z] - означает одну букву из данного промежутка
preg_match('/[a-z]/', $str, $m); // l
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/[a-z]\s/', $str, $m); // o
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/[a-z]\s[a-z]/i', $str, $m); // o W
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/\d\S/', $str, $m); // 3l
echo "<pre>";
print_r($m);
echo "</pre>";

//preg_match('/h\dl/i', $str, $m); // H3l
preg_match('/h[\d]l/i', $str, $m); // H3l
echo "<pre>";
print_r($m);
echo "</pre>";

preg_match('/[^h3ll]/i', $str, $m); // o
echo "<pre>";
print_r($m);
echo "</pre>";

// Удаление всех тегов в XML файле (для html может не сработать)
$html = "<h3>Welcome!!!</h3><div>My name is <b>John</b>!!!</div>";
echo preg_replace('/<[^>]+>/', '', $html);