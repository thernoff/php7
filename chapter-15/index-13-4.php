<?php
// Разделяемая блокировка
// Модель процесса читателя
$file = "./block/block-2.txt";
$name = basename(__FILE__);
echo "Имя скрипта: " . $name . "<br/>";
// Вначале создаем пустой файл, ЕСЛИ ЕГО ЕЩЕ НЕТ.
// Если же файл существует, это его не разрушит.
fclose(fopen($file, "a+b"));

// Блокируем файл
$f = fopen($file, "r+b") or die("Не могу открыть файл!");
flock($f, LOCK_SH); // Ждем, пока завершиться процесс-писатель
/*
    В этой точке мы можем быть уверены, что в файл никто не пишет.
*/
while ($s = fgets($f)) {
    echo $s . "<br/>";
}
// Все сделано. Снимаем блокировку.
fclose($f);