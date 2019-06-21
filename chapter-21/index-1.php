<?php
// Генерация кода во время выполнения
// Функция int eval(string $code) рассматривает параметр $code как код программы PHP и запускает его
$hello = "Hello world!!!";
eval('echo $hello;');
echo "<br/>";

eval('
    function sum($a, $b) {
        return $a + $b;
    }
');

echo sum(3, 5);
echo "<br/>";

for ($i = 1; $i <= 1000; $i++) {
    eval(
        "function printSquare$i(){
            echo $i * $i . \"<br/>\";
        }"
    );
}

printSquare303();