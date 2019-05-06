<?php
// Использование call_user_func()
function A($i) { echo "Вызвана A($i)\n"; }
function B($i) { echo "Вызвана B($i)\n"; }
function C($i) { echo "Вызвана C($i)\n"; }

$f = "B";
call_user_func($f, 101); // вызов функции, имя которой хранится в переменной $f.
echo "<br/>";
// В качестве первого параметра функции может быть передано не только строковое значение,
// но и массив из двух элементов, содержащий:
// - имя класса (или ссылку на объект класса)
// - имя метода класса.

class User {
    public $name;

    public function __construct($name = 'anonim') {
        $this->name = $name;
    }

    public function say($str = "Hello!") {
        echo $str .= " My name is $this->name.<br />";
    }

    public static function do() {
        echo "I'm doing<br/>";
    }
}

call_user_func([new User('John'), 'say']);
call_user_func(['User', 'do']);

// Использование call_user_func_array() - предназначена для вызова подпрограмм, когда на момент вызова точно неизвестно, сколько именно аргументов им следует передать.
// В отличие от call_user_func(), параметры вызываемой подпрограмме передаются не последовательно, а в виде одного-единственного списка.
function myEcho(...$str) {
    foreach($str as $value) {
        echo "$value<br/>\n";
    }
}

// То же самое, но предваряет параметры указанным числом пробелов
function tabber($spaces, ...$planets) {
    // Подготавливаем аргументы для myEcho()
    $new = [];
    foreach($planets as $planet) {
        $new[] = str_repeat("&nbsp;", $spaces) . $planet;
    }

    // Вызываем myEcho() с новыми параметрами
    call_user_func_array("myEcho", $new);
}

// Отображаем строки одну под другой
tabber(10, "Меркурий", "Венера", "Земля", "Марс");