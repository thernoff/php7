<?php
/**
 * Активные шаблоны
 * Шаблоны писем, которые мы применяли до сих пор, довольно просты и не позволяют, например, делать вставки PHP-кода прямо в сообщение.
 */

## Отправка письма с использованием активного шаблона
require_once "dd.php";
include_once "lib/mailx.php";
include_once "lib/mailenc.php";
include_once "lib/template.php";

$text = "Well, now, ain't this a surprise?";
$tos = ["Василий Пупкин <poupkinne@local.local.ru>"];
$a = 1;

foreach ($tos as $to) {
  // "Разворачиваем" шаблон, передавая ему $to и $text
  $mail = template("mail.php.eml", [
    "to" => $to,
    "text" => $text
  ]);
  // Дальше как обычно: кодируем и отправляем
  $mail = mailenc($mail);
  mailx($mail);
}