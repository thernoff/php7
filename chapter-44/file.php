<?php
// Временная автозагрузка классов
spl_autoload_register(function ($class) {
    require_once("pager/src/{$class}.php");
});

$obj = new ISPager\FilePager(
    new ISPager\PagesList(),
    './largefile.txt'
);

// Содержимое текущей страницы
// $obj->getItems() - возвращает массив, элементами которого являются строки файла
foreach ($obj->getItems() as $line) {
    echo htmlspecialchars($line) . "<br/>";
}

// Постраничная навигации
// В данном случае автомически сработает переопределенный метод __toString()
echo "<p>$obj</p>";