<?php
// Функция spl_autoload_register()
// В современной практике функция __autoload() практически не используется. Вместо этого используется функция spl_autoload_register(),
// которая позволяет зарегистрировать цепочку из функций автозагрузки.

// Перепишем предыдущий пример (index-6.php)
/* spl_autoload_register();
$page = new PHP7\Page("Главная", "Содержимое главной страницы");
$page->tags(); */

// В качестве аргумента функции часто удобно использовать анонимные функции.
spl_autoload_register(function($classname){
  require_once(__DIR__ . "/$classname.php");
});

$page = new PHP7\Page("Главная", "Содержимое главной страницы");
$page->keywords();