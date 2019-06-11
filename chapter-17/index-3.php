<?php
// Определение атрибутов файла
echo "<pre>";
print_r( stat("file.txt") );
echo "</pre>";

// Специальные функции
echo filesize("file.txt"); // размер файла в байтах
echo "<br/>";
echo filemtime("file.txt"); // время последнего изменения содержимого файла
echo "<br/>";
echo fileatime("file.txt"); // время последнего доступа к файлу
echo "<br/>";
echo filectime("file.txt"); // время последнего изменения атрибутов файла
echo "<br/>";

// Определение типа файла
echo filetype("."); // dir
echo "<br/>";
echo filetype("file.txt"); // file
echo "<br/>";

// Определение возможности доступа
var_dump(is_readable("file.txt")); // true - если файл может быть открыт для чтения
echo "<br/>";
var_dump(is_writable("file.txt")); // true - если в файл можно писать
echo "<br/>";
var_dump(is_executable("file.txt")); // true - если файл исполняемый
echo "<br/>";
var_dump(file_exists("file.txt")); // true - если файл существует
echo "<br/>";