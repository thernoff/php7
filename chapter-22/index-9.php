<?php
// Клонирование объектов
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
$x = new MathComplex2(0, 0);

// Создаем копию объекта $x
$y = clone $x;

// $x и $y полностью различны
$y->add($a);

echo "x = ", $x, ", y = ", $y;
echo "<br/>";
// Переопределение операции клонирования
// По умолчанию операция clone копирует данные объекта побитно. Однако для некоторых классов необходимо
// выполнить дополнительную работу, например, изменить значения некоторых свойств автоматически,
// сразу после клонирования.

class Human {
    private static $i = 25550690;
    // Идентификатор объекта
    public $dna;
    public $text;
    // Конструктор. Присваивает очередной идентификатор.
    public function __construct() {
        $this->dna = self::$i;
        $this->text = "There is no spoon?";
    }

    // При клонировании модификатор модифицируется
    public function __clone() {
        $this->dna = $this->dna . "(cloned)";
    }
}

// Создаем новый объект
$neo = new Human;
// ... и его клон
$virtual = clone $neo;

// Убеждаемся, что идентификаторы различаются
echo "Neo DNA id: {$neo->dna}, text: {$neo->text}<br/>";
echo "Virtual twin id: {$virtual->dna}, text: {$virtual->text}<br/>";

// Запрет клонирования: если объявить собственный метод __clone() закрытым (private),
// то в этом случае нельзя будет создать копию объекта никакими способами.