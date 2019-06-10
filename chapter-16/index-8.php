<?php
// Работа с путями
echo basename("/home/somebody/somefile.txt") . "<br/>"; // "somebody.txt"
echo basename("/") . "<br/>"; // ничего не выводит
echo basename("/.") . "<br/>"; // выводит "."
echo basename("/./") . "<br/>"; // также выводит "."
echo basename("/home/somebody/somefile.txt", ".txt") . "<br/>"; // "somebody"
// !!! функция basename не проверяет существование файла

echo dirname("/home/file.txt") . "<br/>"; // выводит "/home"
echo dirname("../file.txt") . "<br/>"; // выводит ".."
echo dirname("/file.txt") . "<br/>"; // выводит "/" под UNIX, "\" под Windows
echo dirname("/") . "<br/>"; // то же самое
echo dirname("file.txt") . "<br/>"; // выводит "."

// Параметр $levels, появившийся в PHP 7, позволяет задать уровень извлекаемого родительского каталога.
// По умолчанию параметр принимает значение 1, однако, изменив значение на 2 или 3 можно извлекать родительские
// каталоги более высоких уровней.
echo dirname("/usr/opt/local/etc/hosts") . "<br/>"; // "/usr/opt/local/etc"
echo dirname("/usr/opt/local/etc/hosts", 2) . "<br/>"; // "/usr/opt/local"
echo dirname("/usr/opt/local/etc/hosts", 3) . "<br/>"; // "/usr/opt"

//$fname = tempnam(".",  getmypid());
//$f = fopen($fname, "w");

//выводит имя текущего каталога
echo realpath("."); // C:\Users\Public\web\php7.local\htdocs\chapter-15
echo "<br/>";
//выводит абсолютный путь до файла borodino.txt
echo realpath("./files/borodino.txt"); // C:\Users\Public\web\php7.local\htdocs\chapter-15\files\borodino.txt

// Манипулирование файлами
// Копирование
$pathToFile = realpath("./files/borodino.txt");
$pathCopy = realpath(".") . "/bor1.txt";
//copy($pathToFile, $pathCopy);