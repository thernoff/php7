<?php
// Блокировки с запретом "подвисания"

$file = "./block/block-2.txt";
$name = basename(__FILE__);
echo "Имя скрипта: " . $name . "<br/>";
// Вначале создаем пустой файл, ЕСЛИ ЕГО ЕЩЕ НЕТ.
// Если же файл существует, это его не разрушит.
fclose(fopen($file, "a+b"));

// Блокируем файл
$f = fopen($file, "r+b") or die("Не могу открыть файл.");
$count = 0;
while ( !flock($f, LOCK_EX | LOCK_NB)) {
    echo "Пытаемся получить доступ к файлу. Выполняем различные действия<br/>";
    ob_flush();
    flush();
    
    sleep(1);
}

while ($count < 4) {
    flock($f, LOCK_EX); // Ждем, пока мы не станем единственными
    fseek($f, 0, SEEK_END); // Переход в конец файла

    $str = $name . ": " . $count . "\n";
    fwrite($f, $str); // Пишем в файл
    echo $str . "<br/>";
    ob_flush();
    flush();
    
    $count++;
    /*
        В этой точке мы можем быть уверены, что только эта программа работает с файлом.
    */
    fflush($f); // Сбрасываем буферы на диск
    flock($f, LOCK_UN); // Освобождаем файл
    // К примеру, засыпаем на 10 секунд
    sleep(1);
}
ob_end_flush();

fclose($f);