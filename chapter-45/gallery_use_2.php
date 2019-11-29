<?php
/**
 * Класс Phar реализует интерфейс ArrayAccess, поэтому с содержимым архива можно обращаться как с содержимым обычного массива.
 */
try {
    $phar = new Phar('./gallery.phar', 0, 'gallery.phar');
    foreach ($phar as $file) {
        // Извлекаем MIME-тип изображения
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file);
        finfo_close($finfo);

        if ($mime == 'image/jpeg') {
            $fileName = basename($file);
            echo "<img src='./gallery_use.php?image={$fileName}' /><br/>";
        }
    }
} catch (Exception $e) {
    echo "Невозможно открыть PHAR-архив: ", $e;
}
//http://basic.loc/php/courses_books/php7/chapter-45/gallery_use.php?image=Desert.jpg