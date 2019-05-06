<?php
// Предопределенные константы
// __FILE__ - хранит имя файла, в котором расположен запущенный в настоящий момент код.
// __FILE__ меняется если управление передается в другой файл.
echo __FILE__; // C:\Users\Public\web\php7.local\htdocs\chapter-6\index-5.php
echo "<br/>";

// __LINE__ - содержит текущий номер строки, которую обрабатывает в текущий момент интерпретатор.
echo __LINE__; // 9
echo "<br/>";

// __FUNCTION__ - имя текущей функции.
function test() {
    echo __FUNCTION__; // test
    echo "<br/>";
}
test();

// __CLASS__ - имя текущего класса.

// PHP_VERSION - версия интерпретатора PHP.
echo PHP_VERSION;
echo "<br/>";

// PHP_OS - имя операционной системы, под управлением которой работает PHP.
echo PHP_OS; // WINNT
echo "<br/>";

// PHP_EOL - символ конца строки, используемый на текущей платформе: \n для Linux,
// \r\n для Windows, \n\r для Mac OS X.

// true или TRUE, false или FALSE, null или NULL.