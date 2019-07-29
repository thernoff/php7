<?php
// Перехват сериализации
// Функции serialize() и unserialize() могут работать не только с массивами, но и с объектами.

// Сериализация объектов
// Упаковка и распаковка объектов
class cls {
    public $var;
    public function __construct($var) {
        $this->var = $var;
    }
}

$obj = new cls(100);

$text = serialize($obj);

$fd = fopen("text.obj", "w");

if (!$fd) {
    exit("Невозможно открыть файл");
}

fwrite($fd, $text);
fclose($fd);

$fd = fopen("text.obj", "r");

if (!$fd) {
    exit("Невозможно открыть файл");
}

$text = fread($fd, filesize("text.obj"));
fclose($fd);

$obj = unserialize($text); // Важно, чтобы скрипт имел доступ к классу cls

echo "<pre>";
print_r($obj);
echo "</pre>";

// Методы __sleep() и wakeup()
// __sleep() - метод вызывается, когда объект подвергается сериализации при помощи функциии serialize()
// __wakeup() - метод вызывается при восстановлении объекта при помощи функции unserialize()

class User {
    public function __construct($name, $password) {
        $this->name = $name;
        $this->password = $password;
        $this->referrer = $_SERVER['PHP_SELF'];
        $this->time = time();
    }

    // данный метод возвращает массив тех полей, который могут быть "сериализованы"
    public function __sleep() {
        return ['name', 'referrer', 'time'];
    }

    // при восстановлении объекта время обновляем
    public function __wakeup() {
        $this->time = time();
    }

    public $name;
    public $password;
    public $referrer;
    public $time;
}

$user = new User("Nick", "password");

echo "<pre>";
print_r($user);
echo "</pre>";

$str = serialize($user);

echo $str;
echo "<br/>";

sleep(1);

$user2 = unserialize($str);
echo "<pre>";
print_r($user2);
echo "</pre>";