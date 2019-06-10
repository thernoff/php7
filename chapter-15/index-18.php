<?php
// Получение содержимого каталога
echo "<pre>";
// Получаем список всех php-файлов в текущем каталоге
print_r(glob("*.php"));

print_r(glob("c:/windows/*.exe"));

// Константа GLOB_BRACE позволяет задавать альтернативы в выражении, перечисляя их через запятую в фигурных скобках.
print_r(glob("c:/windows/{*.exe,*.ini}", GLOB_BRACE));

// Константа GLOB_MARK добавляет слеш (\ в Window и / в Unix) к тем результатам, которые являются каталогами.
print_r(glob("*", GLOB_MARK));

// Поиск в нескольких каталогах
print_r(glob("c:/windows/*/{*.exe,*.ini}", GLOB_BRACE));
echo "</pre>";