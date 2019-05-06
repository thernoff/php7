<?php
// Отладочные функции
// string print_r(mixed $expression, bool $return = false)
// если третий параметр равен true, то функция ничего не печатает, а возвращает отладочное 
// представление в виде строки.
$arr = array('a' => 'apple', 'b' => 'banana', 'c' => array('x', 'y', 'z'));
echo "<pre>"; print_r($arr); echo "</pre>";

// string print_r(mixed $expression, bool $return = false)
$arr = array('a' => 'apple', 'b' => 'banana', 'c' => array('x', 'y', 'z'));
echo "<pre>"; var_dump($arr); echo "</pre>";

// string var_export(mixed $expression, bool $return = false) - выводит значение переменной как
// "кусок" PHP-программы
class SomeClass {
    private $x = 100;
}

$a = array(1, array("Programs hacking programs. Why?", "д'Артаньян"));
echo "<pre>"; var_export($a); echo "</pre>";
$obj = new SomeClass();
echo "<pre>"; var_export($obj); echo "</pre>";