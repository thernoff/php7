<?php
/**
 * Анализ заголовков
 * Единственно корректный способо вызова функции mail() - указание ей непустых значений в параметрах $to и $subject и игнорирование их -
 * в параметре $headers. Но т.к. все заголовки у нас объединены вместе, нам придется их проанализировать, изъять To и Subject и разместить
 * в соответствующих переменных.
 */

 ## Отправка почты по шаблону (без кодирования)
 // Этот текст может быть получен, например, из базы данных или являться сообщением форума или гостевой книги.
$text = "Cookies need love like everything does.";
// Получатели письма
$tos = ["a@local.local", "b@local.local"];
// Считываем шаблон
$tpl = file_get_contents('./mail.eml');
// Отправляем письма в цикле по получателям
foreach($tos as $to) {
  // Заменяем элементы шаблона
  $mail = $tpl;
  $mail = strtr($mail, [
    "{TO}" => $to,
    "{TEXT}" => $text
  ]);

  mailx($mail);
}

 // Функция mailx() отправляет письмо, полностью заданное в параметре $mail.
 // Корректно обрабатываются заголовки To и Subject
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