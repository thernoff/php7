<?php
// Связь генераторов с объектами

// Каждый генератор - это объект
function simple($from = 0, $to = 100) {
    for ($i = $from; $i < $to; $i++) {
        yield $i;
    }
}

$generator = simple();
echo gettype($generator); // object
echo "<br/>";

// Отправка данных генератору методом send()
function block() {
    while(true) {
        $string = yield;
        echo $string;
    }
}

$block = block();
$block->send("Hello, world!!!<br/>");
$block->send("Hello, PHP!<br/>");

// Использование return в генераторе
function generator() {
    yield 1;
    return yield from two_three(); // после return выполнение прекратится
    yield 5;
}

function two_three() {
    yield 2;
    yield 3;
    return 4;
}

$generator = generator();
foreach ($generator as $i) {
    echo "$i<br/>";
}
echo "return = " . $generator->getReturn();