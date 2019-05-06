<?php
// Пример функции dumper() - для вывода содержимого переменной.
// print_r() - распечатывает переменную в краткой форме, создавая отступы при выводе многомерных массивов;
// var_dump() - то же, что и print_r(), но дополнительно выводит информацию о типах переменных и элементов массива.

function dumper($obj) {
    echo "<pre>",
    htmlspecialchars(dumperGet($obj)),
    "</pre>";
}

// Возвращает строку - дамп значения переменной в древовидной форме (если это массив или объект). 
// В переменной $leftSp хранится строка с пробелами, которая будет выводится слева от текста.
function dumperGet(&$obj, $leftSp = "") {
    if (is_array($obj)) {
        $type = "Array[" . count($obj) . "]";
    } elseif (is_object($obj)) {
        $type = "Object";
    } elseif (gettype($obj) == "boolean"){
        return $obj ? "true" : "false";
    } else {
        return "\"$obj\"";
    }

    $buf = $type;
    $leftSp .= "    ";
    for (Reset($obj); list($k, $v) = each($obj);) {
        if ($k === "GLOBALS") continue;
        $buf .= "\n$leftSp$k => " .dumperGet($v, $leftSp);
    }
    return $buf;
}

$colors = ['black' => '#000', 'white' => '#fff', 'yellow' => '#ff0', 'green' => '#0f0', 'blue' => '#00f'];
dumper($GLOBALS);