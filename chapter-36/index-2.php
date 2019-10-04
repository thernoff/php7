<?php
// Помимо функции filter_var() расширение filter предоставляет функцию filter_var_array(), которая позволяет проверять
// сразу несколько значений. В случае успешно пройденной проверки возвращается исходное значение, в случае неудачи - null.
// Если третий параметр функции выставлен в false, элемент, не прошедший проверку, вместо null получает значение false.

// Проверяемые значения
$data = [
  'number' => 5,
  'first' => 'chapter01',
  'second' => 'ch02',
  'id' => 2
];

// Фильтры
$definition = [
  'number' => [
    'filter' => FILTER_VALIDATE_INT,
    'options' => ['min_range' => -10, 'max_range' => 10]
  ],
  'first' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^ch\d+$/']
  ],
  'second' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^ch\d+$/']
  ],
  'id' => FILTER_VALIDATE_INT
];

// Осуществляем проверку
$result = filter_var_array($data, $definition);
echo "<pre>";
print_r($result);
echo "</pre>";

/*
Array
(
    [number] => 5
    [first] =>
    [second] => ch02
    [id] => 2
)
*/