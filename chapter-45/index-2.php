<?php
/**
 * Чтение архива
 * Потоки, рассмотренные в главе 32, позволяют работать с PHAR-архивами. Это означает, что допускается чтение из архива
 * любыми файловыми функциями, директивами include, require, достаточно указать в начале префикс схемы phar://
 */

//require_once 'phar://phpinfo.phar/phpinfo.php';

// Если в архиве имеется множество файлов, их можно рассматривать как папки
## Перебор свойств при помощи метода foreach
try {
    $dir = opendir('phar://ispager.phar/ISPager');
    while (($file = readdir($dir)) !== false) {
        echo "{$file}<br/>";
    }
} catch (Exception $e) {
    echo "Невозможно открыть PHAR-архив: ", $e;
}