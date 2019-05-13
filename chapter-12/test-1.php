<?php
function even($value) {
    yield $value % 2 == 0 ? 2 : 1;
}

function generator() {
    for ($i = 1; $i < 11; $i++) {
        yield from even($i);
    }
}

$arr = generator();
foreach ($arr as $val) {
    echo "$val<br/>";
}