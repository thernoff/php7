<?php
// Конструкция list()
$list = ['Alexander', 'Smirnov', 26];
list($name, $surname, $age, $someVar) = $list;
echo $name . "<br>";
echo $surname . "<br>";
echo $age . "<br>";
echo $someVar . "<br>";

// Если нужно только второй и третий элемент, то первый можно пропустить следующим образом:
$listAnimals = ['Кошка', 'Собака', 'Корова', 'Лошадь'];
list(, $dog, , $horse) = $listAnimals;
echo $dog . "<br>";
echo $horse . "<br>";

// Начиная с PHP7 можно создавать массивы-константы:
define(
    'DOSSIER',
    [
        'Anderson' => ['name' => 'Thomas', 'born' => '1962-03-01'],
        'Reeves' => ['name' => 'Keanu', 'born' => '1962-09-02'],
    ]
);

echo DOSSIER['Anderson']['name'];
echo "<br/>";