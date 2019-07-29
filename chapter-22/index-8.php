<?php
// Перехват обращений к членам класса
// При обращении к несуществующему свойству объекта, будет вызван метод __get() с именем свойства.
// При установки значения несуществующего свойства, будет вызван метод __set(), с именем свойства и его новым значением.
// При запуске несуществующего метода, будет вызван метод __call(), с именем метода и списком аргументов.

class Hooker {
    public $opened = 'opened';

    public function method() {
        echo "Whoa, deja vu.<br/>";
    }

    // В данном массиве будут храниться все "виртуальные" свойства
    private $vars = array();

    public function __get($name) {
        echo "Перехват: получаем значение $name.<br/>";
        // Возвращаем null, если виртуальное свойство еще не определено
        return isset($this->vars[$name]) ? $this->vars[$name] : null;
    }

    public function __set($name, $value) {
        echo "Перехват установки значения свойства. <br/>";
        // Перед записью удаляем пробелы
        return $this->vars[$name] = trim($value);
    }

    // Перехват вызова несуществующего метода
    public function __call($name, $args) {
        echo "Перехват: вызываем $name  с аргументами.<br/>";
        var_dump($args);
        return $args[0];
    }
}

$obj = new Hooker();
echo "Получаем значение обычного свойства.<br/>";
echo "Значение: {$obj->opened}<br/>";
echo "<br/>";

echo "Вызываем обычный метод.<br/>";
$obj->method();
echo "<br/>";

echo "Присваивание значения к несуществующему свойству.<br/>";
$obj->nonExistent = 101;
echo "<br/>";

echo "Обращение к несуществующему свойству.<br/>";
echo "Значение {$obj->nonExistent}<br/>";
echo "<br/>";

echo "Обращение к несуществующему методу.<br/>";
$obj->nonExistent(6);