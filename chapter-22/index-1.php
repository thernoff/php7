<?php
// Создание нового класса
// Пример класса
class MathComplex {
    // Свойства: действительная и мнимая части
    public $re, $im;
    // Метод: добавить число к текущему значению. Число задается
    // своей действительной и мнимой частью
    function add($re, $im) {
        $this->re += $re;
        $this->im += $im;
    }
}

// Создание объекта некоторого класса
$obj = new MathComplex;

// Доступ к свойствам объекта
$obj->re = 6;
$obj->im = 101;

echo "({$obj->re}, {$obj->im})";
echo "<br/>";

$obj->add(18, 303);
echo "({$obj->re}, {$obj->im})";
echo "<br/>";

class MathComplex1 {
    public $re, $im;
    function add(MathComplex1 $mc) {
        $this->re += $mc->re;
        $this->im += $mc->im;
    }

    function __toString() {
        return "({$this->re}, {$this->im})";
    }
}

$a = new MathComplex1;
$a->re = 314;
$a->im = 101;

$b = new MathComplex1;
$b->re = 303;
$b->im = 6;

$a->add($b);
//echo $a->__toString();
echo "Значение: $a";
echo "<br/>";