<?php
// Использование неявных аргументов
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

// Пусть имя класса хранится в переменной $className
$className = "MathComplex2";
// а параметры его конструктора - в $args
$args = [1, 2];

// Создаем объект, хранящий всю информацию о классе.
// Фактически, ReflectionClass является "классом, хранящим сведения о другом классе".
$class = new ReflectionClass($className);

// Создаем объект класса явным способом
$obj = $class->newInstance(101, 303);
echo "Первый объект: $obj<br/>";

// Но мы не смогли использовать $args, а вынуждены были указать параметры явным образом.
// Теперь создаем объект класса НЕЯВНО.
$obj = call_user_func_array([$class, "newInstance"], $args);
echo "Второй объект: $obj<br/>";