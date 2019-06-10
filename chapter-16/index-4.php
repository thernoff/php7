<?php
function makeHex($st) {
    for ($i = 0; $i < strlen($st); $i++) {
        $hex[] = sprintf("%02X", ord($st[$i]));
    }

    return join(" ", $hex);
}
// Блочные чтение/запись
$f = fopen("files/test-fread-fwrite.txt", "rb+"); // Открываем файл в бинарном режиме на чтение и запись
$result = fread($f, 16); // Считываем 16 байт, в нашем случае это вся первая строка "Hello world!!!" + \r\n
echo $result;
echo "<br/>";
echo makeHex($result); // 48 65 6C 6C 6F 20 77 6F 72 6C 64 21 21 21 0D 0A
echo "<br/>";
$result = fread($f, 11); // Считываем 11 байт, в нашем случае это "My name is "
echo $result;
echo "<br/>";
echo makeHex($result);
echo "<br/>";


//fwrite($f, 'Mike'); // Записываем данные, причем будут перезаписаны только четыре байта, остальные (если они есть) остануться без изменения