<?php
// Инициализация и разрушение
class MathComplex2 {
    public $re, $im;

    function __construct($re = 0, $im = 0) {
        $this->re = $re;
        $this->im = $im;
    }

    function add(MathComplex2 $mc) {
        $this->re += $mc->re;
        $this->im += $mc->im;
    }

    function __toString() {
        return "({$this->re}, {$this->im})";
    }
}

$a = new MathComplex2(314, 101);
$a->add(new MathComplex2(303, 6));
echo $a;
echo "<br/>";

$b = new MathComplex2;
$b->add(new MathComplex2(4, 3));
echo $b;