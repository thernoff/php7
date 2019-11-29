<?php
/**
 * Теперь при подключении PHAR-архива при помощи директив include и require, если не указан конкретный файл архива,
 * по умолчанию будет загружен файл-заглушка autoloader.php. В том случае, если файл не был назначен при помощи метода
 * setDefaultStub(), PHAR-архив ищет по умолчанию файл index.php.
 *
 * Следует иметь в виду, что файл-заглушка подгружается только при полном подключении архива. В случае если подключается
 * конкретный файл архива - файл-заглушка не выполняется.
 */

 require_once('autopager.phar');

 $obj = new ISPager\FilePager(
     new ISPager\PagesList(),
     './largefile.txt'
 );

 foreach ($obj->getItems() as $line) {
     echo htmlspecialchars($line) . "<br/>";
 }

 echo "<p>$obj</p>";