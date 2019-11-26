<?php
// Временная автозагрузка классов
spl_autoload_register(function ($class) {
    require_once("pager/src/{$class}.php");
});

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=php7',
        'root',
        '12345678',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $obj = new ISPager\PdoPager(
        new ISPager\ItemsRange(),
        $pdo,
        'languages'
    );

    // Содержимое текущей страницы
    foreach ($obj->getItems() as $language) {
        echo htmlspecialchars($language['name']) . "<br/>";
    }

    // Постраничная навигация
    echo "<p>$obj</p>";
} catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных";
}