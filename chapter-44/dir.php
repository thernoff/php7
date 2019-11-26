<?php
require_once "functions.php";
// Временная автозагрузка классов
spl_autoload_register(function ($class) {
    require_once("pager/src/{$class}.php");
});

$obj = new ISPager\DirPager(new ISPager\PagesList(), './photos', 3, 2);

// Содержимое текущей страницы
// $obj->getItems() - возвращает массив, элементами которого являются пути до файлов
foreach ($obj->getItems() as $img) {
    echo "<img width='200px' src='$img' />";
}

// Постраничная навигация
// В данном случае автомически сработает переопределенный метод __toString()
echo "<p>$obj</p>";