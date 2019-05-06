<?php
// Ссылочные переменные

// Жесткие ссылки
// Жесткая ссылка представляет собой просто переменную, которая является синонимом другой переменной.
// Многоуровневые ссылки (т.к. ссылка на ссылку на переменную) не поддерживаются.
echo "<h2>Жесткие ссылки</h2><br/>";
$a = 10;
$b =& $a;
echo '$a = ' . $a;
echo "<br/>";
echo '$b = ' . $b;
echo "<br/>";
$a = 15;
echo '$a = ' . $a;
echo "<br/>";
echo '$b = ' . $b;
echo "<br/><br/>";

// Ссылаться можно на элементы массива.
$arr = array(
    'color' => 'black',
    'width' => 12
);

echo $arr['color'];
echo "<br/>";

$r =& $arr['color'];
$r = 'white';
echo $arr['color'];
echo "<br/><br/>";

// Ссылку можно создать и на несуществующий элемент массива.
print_r($arr);
// Ссылке $t не будет ничего присвоено,
// но будет создан новый элемент с ключом height и значением null
$t =& $arr['height'];
print_r($arr);
echo "<br>";
echo gettype($arr['height']); // NULL

// Символические ссылки
// Символическая ссылка - это всего лишь строковая переменная, хранящая имя другой переменной.
// Чтобы добраться до значения переменной, на которую указывает символическая ссылка,
// необходимо применить оператор разыменования - дополнительный знак $ перед именем ссылки.
echo "<h2>Символические ссылки</h2><br/>";
$right = "red";
$wrong = "blue";
$color = "right";
$background = "wrong";

echo $color; // right
echo "<br/>";
echo $$color; // $$color -> $right -> red
echo "<br/>";
echo $wrong;
echo "<br/>";
$$background = "yellow"; // $$background -> $wrong
echo $wrong;
echo "<br/><br/>";

// Ссылки на объекты
// Начиная с версии PHP 5, копирование объектов и массивов осуществляется по ссылке.
echo "<h2>Ссылки на объекты</h2><br/>";

class AgentSmith{};
$obj = new AgentSmith(); // Переменная $obj хранит ссылку на объект.
$obj->mind = 0.123;

$copyObj = $obj;

echo '$obj->mind:' . $obj->mind;
echo "<br/>";
echo '$copyObj->mind:' . $copyObj->mind;
echo "<br/><br/>";

$copyObj->mind = 100;

echo '$obj->mind:' . $obj->mind;
echo "<br/>";
echo '$copyObj->mind:' . $copyObj->mind;
echo "<br/>";