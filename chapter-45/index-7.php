<?php
/**
 * Для хранения бинарных файлов (например изображений) следует озаботиться сохранением MIME-типа файла.
 * Для этой цели удобно воспользоваться методом:
 * public void setMetadata(mixed $metadata)
 */

 try {
     $phar = new Phar('./gallery.phar', 0, 'gallery.phar');
     if (Phar::canWrite()) {
         $phar->startBuffering();
         // Добавление всех файлов из папки photos
         foreach (glob('../chapter-44/photos/*') as $jpg) {
             // $jpg - "../chapter-44/photos/Chrysanthemum.jpg"
             // basename($jpg) - Chrysanthemum.jpg
             $phar[basename($jpg)] = file_get_contents($jpg);
         }
         // Назначаем файл заглушку
         $phar['show.php'] = file_get_contents('show.php');
         $phar->setDefaultStub('show.php', 'show.php');
         // Сохранение результатов на жесткий диск
         $phar->stopBuffering();
     } else {
         echo "PHAR-архив не может быть записан";
     }
 } catch (Exception $e) {
     echo "Невозможно открыть PHAR-архив: ", $e;
 }

 // Для просмотра отдельного изображения: http://basic.loc/php/courses_books/php7/chapter-45/gallery_use.php?image=Desert.jpg