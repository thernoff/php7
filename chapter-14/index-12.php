<?php
$arr = [
    "employee" => "Иван Иванов",
    "phones" => [
        "916 153 2854",
        "916 643 8420"
    ]
];

echo json_encode($arr);
echo "<br/>";
// Кодирование строк, содержащих числа, как числа. По умолчанию возвращаются строки.
echo json_encode($arr, JSON_NUMERIC_CHECK);
echo "<br/>";
// Многобайтные символы UTF-8 отображаются как есть (по умолчанию они кодируются как \uXXXX)
echo json_encode($arr, JSON_UNESCAPED_UNICODE);

$json = '{"employee": "Петр Петров", "phones": ["921 054 3256", "921 732 4522"]}';
$arr = json_decode($json, true); // Получаем ассоциативный массив
echo "<pre>";
print_r($arr);
echo "</pre>";

$obj = json_decode($json); // Получаем объект
echo "<pre>";
print_r($obj);
echo "</pre>";