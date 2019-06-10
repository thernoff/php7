<?php
// Манипулирование каталогами

// Создаем подкаталог directory_a в текущем каталоге
if (!mkdir("directory_a", 0770)) {
    echo "Can't make directory. <br />";
} else {
    echo "Directory directory_a success create. <br />";
}

// Параметр true позволяет создавать отсутсвующие в пути каталоги.
mkdir("directory_b/2019/6/6", 0770, true);

// Функция getcwd() возвращает полный путь к текущему каталогу, начиная от корня (/).
echo getcwd();