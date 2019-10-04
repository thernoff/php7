<?php
/**
 * Фильтрация и проверка данных
 */

/* Проверка данных
  mixed filter_var(
    mixed $variable [,
      int $filter = FILTER_DEFAULT [,
        mixed $options
      ]
    ]
  )
*/
## Проверка электронного адреса
$email_correct = 'igorsimdyanov@gmail.com';
$email_wrong = 'igorsimdyanov@//gmail.com';
echo "correct = " . filter_var($email_correct, FILTER_VALIDATE_EMAIL) . "<br/>"; // correct = igorsimdyanov@gmail.com
echo "wrong = " . filter_var($email_wrong, FILTER_VALIDATE_EMAIL) . "<br/>"; // wrong =

## Фильтрация электронного адреса
echo "correct = " . filter_var($email_correct, FILTER_SANITIZE_EMAIL) . "<br/>"; // correct = igorsimdyanov@gmail.com
echo "wrong = " . filter_var($email_wrong, FILTER_SANITIZE_EMAIL) . "<br/>"; // wrong = igorsimdyanov@gmail.com

/**
 *  Фильтры проверки
 * FILTER_VALIDATE_BOOLEAN возвращает true, для значений "1", "true", "on" и "yes", иначе возвращается false
 * FILTER_VALIDATE_EMAIL
 * FILTER_VALIDATE_FLOAT
 * FILTER_VALIDATE_INT
 * FILTER_VALIDATE_IP
 * FILTER_VALIDATE_REGEXP
 * FILTER_VALIDATE_URL
 */
 $boolean = "yes"; // yes корректное булевое значение
 if (filter_var($boolean, FILTER_VALIDATE_BOOLEAN)) {
  echo "$boolean корректное булевое значение<br/>";
 } else {
  echo "$boolean некорректное булевое значение<br/>";
 }

 $float = "3.14"; // 3.14 корректное значение с плавающей точкой
 if (filter_var($float, FILTER_VALIDATE_FLOAT)) {
  echo "$float корректное значение с плавающей точкой<br/>";
} else {
  echo "$float некорректное значение с плавающей точкой<br/>";
}

$url = "http://github.com"; // http://github.com корректный адрес
if (filter_var($url, FILTER_VALIDATE_URL)) {
  echo "$url корректный адрес<br/>";
} else {
  echo "$url некорректный адрес<br/>";
}

// Третий параметр функции filter_var() позволяет передать флаги, изменющие режим работы функции.
## Использование FILTER_NULL_ON_FAILURE
$true = "yes";
$false = "no";
$null = "Hello world!";
echo "<pre>";
var_dump(filter_var($true, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)); // boolean true
var_dump(filter_var($false, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)); // boolean false
var_dump(filter_var($null, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)); // null
echo "</pre>";

// Фильтр FILTER_VALIDATE_IP так же допускает использование дополнительных флагов
// FILTER_FLAG_IPV4 - ip-адрес в IPv4-формате
// FILTER_FLAG_IPV6 - ip-адрес d IPv6-формате
// FILTER_FLAG_NO_PRIV_RANGE - запрещает успешное прохождение проверки для следующих частных IPv4-диапазонов: 10.0.0.0/8, 172.16.0.0/12 и 192.168.0.0/16.
// Запрещает успешное прохождение проверки для IPv6-адресов, начинающихся с FD или FC;
// FILTER_FLAG_NO_RES_RANGE - ...
// Примеры см. на стр. 653

## Проверка вхождения числа в диапазон
$first = 100;
$second = 5;
$options = [
  'options' => [
    'min_range' => -10,
    'max_range' => 10,
  ]
];

if (filter_var($first, FILTER_VALIDATE_INT, $options)) {
  echo "$first входит в диапазон -10 .. 10 <br/>";
} else {
  echo "$first не входит в диапазон -10 .. 10 <br/>";
}

if (filter_var($second, FILTER_VALIDATE_INT, $options)) {
  echo "$second входит в диапазон -10 .. 10 <br/>";
} else {
  echo "$second не входит в диапазон -10 .. 10 <br/>";
}

## Проверка регулярным выражением
$chapter1 = "chapter01";
$chapter2 = "ch02";

// Соответствие строкам вида "ch01", "ch15"
$options = [
  'options' => [
    'regexp' => "/^ch\d+$/"
  ]
];

if (filter_var($chapter1, FILTER_VALIDATE_REGEXP, $options)) {
  echo "$chapter1 корректный идентификатор главы<br/>";
} else {
  echo "$chapter1 не корректный идентификатор главы<br/>";
}

if (filter_var($chapter2, FILTER_VALIDATE_REGEXP, $options)) {
  echo "$chapter2 корректный идентификатор главы<br/>";
} else {
  echo "$chapter2 не корректный идентификатор главы<br/>";
}


/*
  Значения по умолчанию
  Каждый из фильтров позволяет через дополнительный набор флагов 'options' передать значение по умолчанию 'default'.
  В результате, если значение не удовлетворяет фильтру, вместо null или false функции filter_var() и filter_var_array() вернут значение по умолчанию.
*/

$options = [
  'options' => [
    'min_range' => -10,
    'max_range' => 10,
    'default' => 0
  ]
];

echo filter_var(1000, FILTER_VALIDATE_INT, $options);