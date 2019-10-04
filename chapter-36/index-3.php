<?php
/*
  Фильтры очистки
  FILTER_SANITIZE_EMAIL удаляет все символы, кроме букв, цифр и символов !#$%&'*+-/=?^_`{|}~@.[]
  FILTER_SANITIZE_ENCODED кодирует строку в формат URL, при необходимости удаляет или кодирует специальные символы
  FILTER_SANITIZE_MAGIC_QUOTES к строке применяется функция addslashes()
  FILTER_SANITIZE_NUMBER_FLOAT удаляет все символы, кроме цифр, +, - и, при необходимости, .,eE
  FILTER_SANITIZE_NUMBER_INT удаляет все символы, кроме цифр, + и -
  FILTER_SANITIZE_SPECIAL_CHARS экранирует HTML-символы '"<>&. Управляющие символы при необходимости удаляет или кодирует
  FILTER_SANITIZE_FULL_SPECIAL_CHARS эквивалентно вызову htmlspecialchars() с установленным параметром ENT_QUOTES. Кодирование кавычек
    может быть отключено с помощью установки флага FILTER_FLAG_NO_ENCODE_QUTES
  FILTER_SANITIZE_STRING удаляет теги, при необходимости удаляет или кодирует специальные символы
  FILTER_SANTITIZE_STRIPPED псевдоним предыдущего
  FILTER_SANITIZE_URL
  FILTER_SANITIZE_RAW бездействует, при необходимости удаляет или кодирует специальные символы
*/

## Фильтрация URL-адреса
$url = 'params=Привет мир!';
echo filter_var($url, FILTER_SANITIZE_ENCODED); // params%3D%D0%9F%D1%80%D0%B8%D0%B2%D0%B5%D1%82%20%D0%BC%D0%B8%D1%80%21

/*
  Флаги
  FILTER_FLAG_STRIP_LOW - удаляет управляющие символы (код меньше 32)
  FILTER_FLAG_STRIP_LOW - удаляет символы (код больше 127)
  FILTER_FLAG_ENCODE_LOW - кодирует управляющие символы (код меньше 32)
  FILTER_FLAG_ENCODE_HIGH - кодирует символы (код больше 127)
*/

## Экранирование
$arr = [
  'Deb\'s files',
  'Symbol \\',
  'print "Hello world!"'
];

echo "<pre>";
print_r($arr);
echo "</pre>";

$result = filter_var_array($arr, FILTER_SANITIZE_MAGIC_QUOTES);
echo "<pre>";
print_r($result);
echo "</pre>";

## Очистка целого числа
$number = "4342hello";
echo filter_var($number, FILTER_SANITIZE_NUMBER_INT) . "<br/>";
echo intval($number) . "<br/>";
## !!! filter_var() не заменяет intval()
$number = "3.14";
echo filter_var($number, FILTER_SANITIZE_NUMBER_INT) . "<br/>"; // 314
echo intval($number) . "<br/>"; // 3

## Обработка текста. Фильтр FILTER_SANITIZE_FULL_SPECIAL_CHARS
$str = <<<MARKER
<h1>Заголовок</h1>
<p>Первый параграф, посвященный "проверке"</p>
MARKER;

// &lt;h1&gt;Заголовок&lt;/h1&gt;&lt;p&gt;Первый параграф, посвященный &quot;проверке&quot;&lt;/p&gt;
echo "<pre>";
echo filter_var($str, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
echo "</pre>";