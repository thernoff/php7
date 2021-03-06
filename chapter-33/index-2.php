<?php
// Почтовые шаблоны
## Отправка почты по шаблону (плохой вариант)
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

  // Разделяем тело сообщения и заголовки
  list($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);
  // Отправляем почту. Внимание! Опасный прием!
  // $to и $subject - пустые, т.к. они будут указаны в дополнительных заголовках.
  mail("", "", $body, $head); // письма будут сохранены в папке OSPanel\userdata\temp\email
}

/**
 * В данном случае письма дойдут до адресата, но различные почтовые программы отобразят поле Subject по-разному:
 * одни воспримут его как пустую строку, вторые как "Добый день!" (см. файл mail.eml).
 */