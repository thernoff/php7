<?php
// Скрипт-счетчик с блокировкой
$file = './block/counter.dat';

// Создаем первоначально пустой файл
fclose(fopen($file, "a+b"));
// Открываем файл счетчика
$f = fopen($file, "r+t");

flock($f, LOCK_EX);
$count = (int)fread($f, 100);
$count += 1;
ftruncate($f, 0);
fseek($f, 0, SEEK_SET);
fwrite($f, $count);
fclose($f);
echo $count;