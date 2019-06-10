<?php
// Положение указателя текущей позиции
$f = fopen("files/borodino.txt", "r");
while (!feof($f)) {
    $st = fgets($f);
    echo $st . "<br/>";
}

fclose($f);

echo "<br/>";

$f = fopen("files/borodino.txt", "r");
fseek($f, 10); // Смещаем указатель файла на 10 байтов от начала файла
$position = ftell($f); // Запоминаем позицию указателя
while (!feof($f)) {
    $st = fgets($f);
    echo $st . "<br/>";
}
echo "<br/>";
// Перемещаем указатель на сохраненную позицию
fseek($f, $position);
while (!feof($f)) {
    $st = fgets($f);
    echo $st . "<br/>";
}
fclose($f);

/*
$f = fopen("files/borodino.txt", "r+");
ftruncate($f, 0); // Усекаем открытый файл до размера 0
fseek($f, 0, SEEK_SET); // Переходим в начало файла
fclose($f);
*/