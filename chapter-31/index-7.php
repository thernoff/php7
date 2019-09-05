<?php
// Разбор URL
// Разбиение и "склеивание" QUERY_STRING

// void parse_str(string $str, [, array $out])
## Ручной разбор QUERY_STRING
$str = "sullivan=paul&names[roy]=noni&names[read]=tom";
parse_str($str, $out);
echo "<pre>";
print_r($out);
echo "</pre>";

/** Функция http_build_query() собирает QUERY_STRING по переданным ей данным в ассоциативном массиве $data.
 * $arg_separator задает разделитель
 * $enc_type задает режим кодирования пробелов, по умолчаниюе это +, если указать значение PHP_QUERY_RFC3986, то будет использоваться %20
 * string http_build_query(
 *  array $data
 *  [, string $numericPrefix]
 *  [, string $arg_separator]
 *  [, int $enc_type = PHP_QUERY_RFC1738]
 * )
 */

 $arr = [
   "name" => "John",
   "age" => 23,
   "params" => [
     "color" => "red",
     "size" => 13
   ]
 ];

 $qs = http_build_query($arr, "&");
 echo $qs;