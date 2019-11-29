<?php
/**
 * PHAR - архивы
 * PHAR-архив - это исполняемый архив PHP, упакованная и сжатая библиотека из нескольких файлов.
 *
 * Создание архива
 * Для создания архива можно воспользоваться классом Phar, конструктор которого имеет следующий синтаксис:
 * public Phar::__construct( string $fname [, int $flags, [, string $alias]] )
 * $fname - путь к существующему или создаваемому PHAR-архиву;
 * $flags - комбинация флагов
 * $alias - псевдоним для потока
 */

## Создание PHAR-архива
try {
    $phar = new Phar('./ispager.phar', 0, 'ispager.phar');
    // Для записи директива phar.readonly конфигурационного файла php.ini должна быть установлена в 0 или Off
    if (Phar::canWrite()) {
        // Буферизация записи, ничего не записывается до тех пор, пока не будет вызван метод stopBuffering()
        $phar->startBuffering();
        // Добавление всех файлов из компонента ISPager
        $phar->buildFromIterator(
            new DirectoryIterator(realpath('../chapter-44/pager/src/ISPager')), // итератор библиотеки SPL
            '../chapter-44/pager/src' // префикс, который отсечет часть пути в файлах
        );
        // Сохранение результатов на жесткий диск
        $phar->stopBuffering();
    } else {
        echo "PHAR-архив не может быть записан";
    }
} catch (Exception $e) {
    echo "Невозможно открыть PHAR-архив: ", $e;
}

/**
 * Помимо метода buildFromIterator() класс Phar предоставляет еще ряд методов для формирования содержимого PHAR-архивов
 *
 * public array Phar::buildFromDirectory(string $base_dir [, string $regex])
 *
 * public void Phar::addEmptyDir(string $dirname)
 *
 * public void Phar::addFile(string $file, [, $localname])
 *
 * public void Phar::addFromString(string $localname, string $contents)
 */

 // Помимо методов, представленных выше, класс Phar реализует интерфейс ArrayAccess, позволяющий обращаться с содержимым архива
 // как с массивом.

 ## Класс Phar реализует интерфейс ArrayAccess
try {
    $phar = new Phar('./phpinfo.phar', 0, 'phpinfo.phar');
    if (Phar::canWrite()) {
        $phar->startBuffering();
        // помещаем в архив файл phpinfo.php с содержимым
        $phar['phpinfo.php'] = "<?php phpinfo();?>";
$phar->stopBuffering();
} else {
echo 'PHAR-архив не может быть записан';
}
} catch (Exception $e) {
echo "Невозможно открыть PHAR-архив: ", $e;
}