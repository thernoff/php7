<?php
// Итератор - это объект, позволяющий объходить коллекцию способом, не зависящим от внутреннего устройства коллекции.
// Один из видов итераторов - это генератор, представленный классом Generator.
// Пример другого - класс DatePeriod.

// Стандартное поведение foreach
// PHP позволяет использовать объекты произвольных классов в инструкции foreach так, будто бы они являются обычными ассоциативными массивами.
class Monolog {
  public $first = "It's him.";
  protected $second = "The Anomaly.";
  private $third = "Do we proceed?";
  protected $fourth = "Yes.";
  private $fifth = "He is still...";
  public $sixth = "...only human.";
}

$monolog = new Monolog();

foreach ($monolog as $k => $v) {
  echo "$k: $v<br/>"; // будут выведены только public свойства
}
// При переборе объекта с помощью foreach $v - копия свойства объекта, а если в цикле использовать &$v - то само свойство объекта.