<?php
/**
 * Подготовим новый архив autopager.phar, который помимо содержимого компонента ISPager будет предоставлять автозагрузчик
 * классов компонента. Для реализации автозагрузки удобно воспользоваться специальным методом:
 * public bool Phar::setDefaultStub([string $index [, string $webindex]])
 *
 * Метод устанавливает файл-заглушку, который автоматически выполняется при подключении архива. Параметр $index задает
 * заглушку при подключении через командную строку, а $webindex - при подключении через браузер.
 */

 ## Создание PHAR-архива с заглушкой
 try {
     $phar = new Phar('./autopager.phar', 0, 'autopager.phar');
     if (Phar::canWrite()) {
         $phar->startBuffering();
         $phar->buildFromIterator(
             new DirectoryIterator(realpath('../chapter-44/pager/src/ISPager')), // итератор библиотеки SPL
          '../chapter-44/pager/src' // префикс, который отсечет часть пути в файлах
         );
         // Добавляем автозагрузчик в архив
         $phar->addFromString('autoloader.php', file_get_contents('autoloader.php'));
         // Назначаем автозагрузчик в качестве файла-заглушки
         $phar->setDefaultStub('autoloader.php', 'autoloader.php');
         $phar->stopBuffering();
     } else {
         echo 'PHAR-архив не может быть записан';
     }
 } catch (Exception $e) {
     echo "Невозможно открыть PHAR-архив: ", $e;
 }