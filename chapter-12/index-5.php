<?php
// Использование ключей
// Генераторы допускают работу с ключами, для этого после ключевого слова yield указывается точно такая же пара.
function collect($arr, $callback) {
    foreach($arr as $key => $value) {
        yield $key => $callback($value);
    }
}

$colors = ['black' => '000', 'white' => 'fff', 'yellow' => 'ff0', 'green' => '0f0', 'blue' => '00f'];
$collect = collect($colors, function($e) {
    return "#" . $e;
});

foreach ($collect as $key => $val) echo "Цвет $key - код $val <br/>";