<?php
// Позднее статическое связывание
// У конструкции self и константы __CLASS__ имеется ограничение: они не позволяют переопределить
// статический метод в производных классах.
// Примечание: self — класс в котором написано, static — класс в котором выполнилось.

class Base1 {
    public static function title() {
        echo __CLASS__;
    }

    public static function test() {
        self::title();
    }
}



Base1::title(); // Base1
echo "<br/>";
Base1::test(); // Base1
echo "<br/>";

class Child1 extends Base1 {
    public static function title() {
        echo __CLASS__;
    }
}

Child1::title(); // Child1
echo "<br/>";
Child1::test(); // Base1

// Для решения проблемы можно воспользоваться специальным ключевым словом static
class Base2 {
    public static function title() {
        echo __CLASS__;
    }

    public static function test() {
        static::title();
    }
}

class Child2 extends Base2 {
    public static function title() {
        echo __CLASS__;
    }
}
echo "<br/>";
echo "<br/>";
Child2::title(); // Child2
echo "<br/>";
Child2::test(); // Child2