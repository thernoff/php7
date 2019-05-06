<?php
// Перебор массивов
// Перебор списка
$colors = ['black', 'white', 'red', 'green'];
for ($i = 0; $i < count($colors); $i++) {
    echo $colors[$i] . "<br/>";
}
// Перебор с конца
// В данном примере элемент со значением 'black' имеет ключ равный нулю, поэтому $k = key($colors) вернет 0 и цикл прервется, из-за чего первый элемент массива не будет
// выведен на экран.
for (end($colors); ($k = key($colors)); prev($colors)) {
    echo $k . " -> " . $colors[$k] . "<br/>";
}
echo '<br/>';
// изменим предыдущий цикл
for (end($colors); ($k = key($colors)) !== null; prev($colors)) {
    echo $k . " -> " . $colors[$k] . "<br/>";
}
echo '<br/>';

// Перебор ассоциативного массива
$birth = [
    "Thomas Anderson" => "1962-03-11",
    "Keanu Reeves" => "1962-09-02"
];
// Функция reset() перемещает внутренний указатель массива array к его первому элементу и возвращает значение первого элемента массива.
// Функция next() возвращает значение элемента, следующего за текущим (или false, если такого элемента нет) перемещает указатель массива вперед на один элемент.
// Функция key() возвращает индекс текущего элемента массива.
for (reset($birth); ($k = key($birth)); next($birth)) {
    echo "$k родился {$birth[$k]}<br/>";
}

// Прямой перебор массива
foreach ($birth as $k => $v) {
    echo "$k родился $v<br />";
}
echo '<br/>';

// foreach перед началом своей работы выполняет копирование массива. Это позволяет использовать вместо переменной-массива результат работы некоторой функции 
// или даже сложное выражение:
foreach ([101, 314, 606] as $magic) {
    echo "На стене написано: $magic.<br/>";
}
echo '<br/>';

// Изменение элементов при переборе
$numbers = [100, 313, 605];
foreach ($numbers as &$v) $v++;
foreach ($numbers as $elt) {
    echo $elt . "<br/>";
}
echo '<br/>';

// Списки и строки
$str = "green|black|red|blue|white";
$list = explode('|', $str); // получаем список

echo "<pre>";
print_r($list);
echo "</pre>";
echo '<br/>';

$strFromList = implode(', ', $list);
echo "<pre>";
print_r($strFromList);
echo "</pre>";
echo '<br/>';

// Сериализация
// Упаковка string serialize(mixed $obj) - возвращает строку, являющуюся упакованным эквивалентом некоего объекта $obj, переданного в первом аргументе.
$arr = ["a" => "Apple", "price" => 234, "c" => ["d" => false]];
$result = serialize($arr);
echo $result;
echo '<br/>';
// Распаковка
$unArr = unserialize($result);
echo "<pre>";
print_r($unArr);
echo "</pre>";
echo '<br/>';