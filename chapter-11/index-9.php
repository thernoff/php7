<?php
// В PHP имеется понятие "функциональной переменной".
// В общем случае, функциональная переменная - это всего лишь переменная-строка,
// содержащая имя функции, и ничего больше.
function A($i) { echo "Вызвана A($i)\n"; }
function B($i) { echo "Вызвана B($i)\n"; }
function C($i) { echo "Вызвана C($i)\n"; }

$F = "A"; // или $F = "B" или $F = "C"
$F(303); // вызов функции, имя которой хранится в $F

//
function fCmp($a, $b) {
    return strcmp(strtolower($a), strtolower($b));
}

$riddle = ['g' => 'Not', 'o' => 'enough', 'd' => 'ordinariness'];
echo "<pre>";
print_r($riddle);
echo "</pre>";
uasort($riddle, "fCmp");
echo "<pre>";
print_r($riddle);
echo "</pre>";