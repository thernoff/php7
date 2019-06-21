<?php
// Общий вид записи регулярного выражения - '/выражение/M', где M обозначает
// ноль или более модификаторов. Если символ / встречается в самом выражении,
// то перед ним необходимо поставить обратный слеш \, чтобы его экранировать.
if (preg_match('/path\\/to\\/file/i', "path/to/file")) echo "Совпадение<br/>";

// Альтернативные ограничители
// '/path\\/to\\/file/i'
// '#path/to/file#i'
// '"path/to/file"i'
// '{path/to/file}i'
// '[path/to/file]i'
// '(path/to/file)i'

// Следующее выражение корректно
echo preg_replace('[(/file)[0-9]+]i', '$1', "/file123.txt");
echo "<br/>";

// Отмена действия спецсимволов
$re = '/\\\\filename/';
echo $re;
echo "<br/>";
if (preg_match($re, "folder\\filename", $matches)) echo "Совпадение<br/>";
echo "<pre>";
print_r($matches);
echo "</pre>";
// Будем искать любое имя каталога, после которого идет также любое имя файла.
// \S - любой не пробельный символ, + - повтор один или более раз.
$re = '/\\S+\\\\\\S+/';
if (preg_match($re, "folder\\filename", $matches)) echo "Совпадение<br/>";
echo "<pre>";
print_r($matches);
echo "</pre>";

echo "<tt>" . htmlspecialchars($re) . "</tt>";

preg_match('/\\$a/s', '$a.rr', $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";