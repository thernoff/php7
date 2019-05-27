<?php
// Переменные и массивы
// Функция compact()
$a = "Test string";
$b = "Some text";
$arr = compact("a", "b"); // ["a" => "Test string", "b" = "Some text"]
echo "<pre>";
print_r($arr);
echo "</pre>";

$first = 1;
$second = 2;
$color = "red";
$d = "DDD";
// При выполнении скрипта получим Notice: compact(): Undefined variable: third...
$list = [["first", "second", "third"], "color"];
$arr2 = compact("d", $list); // ["d" => "DDD", "first" => 1, "second" => 2, "color" => "red"]
echo "<pre>";
print_r($arr2);
echo "</pre>";

// Функция extract()
$name = "Mike";
$arrVars = ["name" => "John", "age" => 25];
//extract($arrVars); // По умолчанию переменная с именем ключа массива будет перезаписана
extract($arrVars, EXTR_SKIP); // Переменная $name не будет перезаписана
echo $name . "<br/>"; // John
echo $age . "<br/>"; // 25

//extract($_SERVER);
// То же самое, но с префиксом E_
extract($_SERVER, EXTR_PREFIX_ALL, "E");
echo $E_HTTP_HOST . "<br/>";