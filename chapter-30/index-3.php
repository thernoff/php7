<?php
/**
 * Инстанцирование классов
 * Инстанцирование - это термин ООП, который обозначает "создание объекта некоторого класса". Инстанцировать класс - то же самое, что создать
 * экземпляр (объект) этого класса.
 *
 * Как создать объект некоторого класса, если имя класса задано неявно, например, содержится в переменной.
 */

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

$className = "MathComplex2";
$obj = new $className(6,1); // вместо имени можно указывать переменную, в которой хранится имя
echo "Созданный объект: $obj";