<?php
/**
 * Преобразование содержимого архива
 *
 * Содержимое уже существующего архива можно изменять: копировать и удалять файлы.
 * public int Phar::count(void)
 * Функция подсчитывает общее количество файлов в архиве
 *
 * public bool Phar::delete(string $entry)
 * Удаляет файл с путем $entry
 *
 * public bool Phar::copy(string $oldfile, string $newfile)
 * Копирует файлы с путем $oldfile в новое место $newfile
 */