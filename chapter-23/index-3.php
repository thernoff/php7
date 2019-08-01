<?php
// Анонимные классы
class Dumper {
    public static function print($obj) {
        print_r($obj);
    }
}

Dumper::print( new class {
    public $title;
    public function __construct() {
        $this->title = "Hello world!!!";
    }
});
echo "<br/>";

class Container {
    private $title = "Класс Container";
    protected $id = 1;

    public function anonym() {
        return new class($this->title) extends Container {
            private $name;

            public function __construct($title) {
                $this->name = $title;
            }

            public function print() {
                // т.к. анонимный класс наследуются от класса Container, 
                // то он имеет доступ к защищенному свойству $id, но не имеет доступа к 
                // закрытому $title, который передается через конструктор
                echo "{$this->name} ({$this->id})";
            }
        };
    }
}

(new Container)->anonym()->print();