<?php
// Построчные чтение/запись
$f = fopen("files/test-fgets-fputs.txt", "rb+");
$line = fgets($f);
echo $line;
echo "<br/>";
$line = fgets($f);
echo $line;
echo "<br/>";
fputs($f, "I am 22 age");