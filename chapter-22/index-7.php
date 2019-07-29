<?php
// Константы класса
class cls {
    const NAME = "cls";

    public function method() {
        // echo $this->NAME; // Ошибочное обращение
        echo self::NAME;
        echo "<br/>";
        echo cls::NAME;
        echo "<br/>";
    }
}

echo cls::NAME;
echo "<br/>";

$obj = new cls();
$obj->method();

// Нельзя
// echo $obj->NAME;

// Проверка существования константы
if (defined("cls::NAME")) 
    echo "Константа определена<br/>";
else
    echo "Константа не определена<br/>";

    if (defined("cls::POSITION")) 
    echo "Константа определена<br/>";
else
    echo "Константа не определена<br/>";