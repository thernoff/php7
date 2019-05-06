<?php
// Уничтожение переменных с помощью оператора (не функции) unset()
$a = "Hello world!!!";
echo $a . "<br/>";
unset($a);
echo $a;

// Удаление элемента массива
$arr = array(
    "surname" => "Гейтс",
    "name" => "Билл"
);

echo $arr["name"] . "<br/>";
unset($arr["name"]);
echo $arr["name"] . "<br/>";