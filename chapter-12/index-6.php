<?php
// Использование ссылки
// Так же как для обычной функции, для генераторов допускается возврат значения по ссылке.

// Возврат значения по ссылке
function &reference() {
    $value = 3;
    while ($value > 0) {
        yield $value;
    }
}

foreach (reference() as &$number) {
    echo (--$number) . ' ';
}