<?php
// Чтение и запись целого файла

// file() считывает файл целиком в бинарном режиме и возвращает массив-список, каждый элемент которого соответствует строке в прочитанном файле.
// FILE_IGNORE_NEW_LINES - не добавлять символ новой строки \n в конец каждого элемента массива
// FILE_SKIP_EMPTY_LINES - пропускать пустые строки
$arrLines = file("./files/file.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo "<pre>";
print_r($arrLines);
echo "</pre>";

// file_get_contents() - считывает целиком файл и возвращает его содержимое в виде одной-единственной строки.
$line = file_get_contents("./files/file2.txt");
echo $line;
echo "<br/>";

// file_put_contents() позволяет в одно действие записать данные в файл.
// FILE_APPEND - произвести дописывание в конец файла
$res = file_put_contents("./files/file.txt", $line, FILE_APPEND);
echo $res;
echo "<br/>";