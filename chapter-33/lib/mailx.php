<?php

function mailx($mail) {
  // Разделяем тело сообщения и заголовки
  list($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);

  // Выделяем заголовок To
  $to = "";
  // '/^To:\s*([^\r\n]*)[\r\n]*/m' - ^To в начале идет To, \s* 0 или более пробельных символов,
  // [^\r\n]* - любые символы, кроме \r\n, [\r\n]* - ноль или более \r\n
  if (preg_match('/^To:\s*([^\r\n]*)[\r\n]*/m', $head, $p)) {
    $to = @$p[1]; // сохраняем
    $head = str_replace($p[0], "", $head); // удаляем из исходной строки
  }

  // Выделяем Subject
  $subject = "";
  if (preg_match('/^Subject:\s*([^\r\n]*)[\r\n]*/m', $head, $p)) {
    $subject = @$p[1];

    $head = str_replace($p[0], "", $head);
  }

  // Отправляем почту
  mail($to, $subject, $body, trim($head));
}