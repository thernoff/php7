<?php
// Класс Closure
// Замыкания - специальный тип анонимных функций, которые позволяют сохранить переменные на момент их вызова.
// Замыкания представляют собой объект предопределенного класса Closure. Переменные, которые захватываются замыканием,
// сохраняются именно в этом объекте.

$message = "Работа не может быть продолжена из-за ошибок:<br/>";
$check = function(array $errors) use ($message) {
  if (isset($errors) && count($errors) > 0) {
    echo $messages;
    foreach($errors as $error) {
      echo "$error<br/>";
    }
  }
};

echo "<pre>";
print_r($check);
echo "</pre>";
/*
Closure Object
(
    [static] => Array
        (
            [message] => Работа не может быть продолжена из-за ошибок:

        )

    [parameter] => Array
        (
            [$errors] =>
        )

)
*/