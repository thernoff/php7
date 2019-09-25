<?php
require_once "dd.php";
// Кодировка UTF-8

/**
 * Заголовок Content-Type и кодировка
 * Договоримся, что для отправки обычных писем будем использовать функцию mailx(). Это позволит нам перекодировать письмо
 * целиком, включая как заголовки, так и тело.
 * Заголовок Content-Type задает, что письмо доставляется как простой текст (text/plain), и что его кодировка utf-8.
 * Таким образом, письмо всегда можно будет прочитать, даже если почтовая программа клиента по умолчанию настроена на другую кодировку.
 *
 * Кодировка заголовков
 * Заголовок Content-type задает кодировку тела письма. Большинство почтовых программ также используют его для того, чтобы определять и кодировку
 * заголовков (таких, например, как Subject, From и To). К сожалению, существуют программы, которые этого не делают.
 *
 * По стандарту формирования сообщений электронной почты в заголовках письма не должно быть ни одного символа с кодом, меньшим 32 и большим 127.
 * Все английские буквы, цифры и знаки препинания попадают в этот класс символов, однако русские буквы, конечно же, имеют код, превышаюий 127.
 * Следовательно, если какой-либо заголовок содержит UTF-8, перед отправкой письма его необходимо закодировать.
 *
 * Существует несколько способов кодирования заголовков, но мы рассмотрим самый популярный из них - base64.
 *
 * Общий принцип кодирования: =?кодировка?способ?код?=
 *
 * НО адреса электронной почты не должны быть закодированы.
 */

 // Рассмотрим функцию mailenc(), которая base64-кодирует в каждом заголовке письма последовательности символов, начинающиеся
 // с недопустимого по стандарту символа.

 ## Кодирование заголовков письма
 // Корректно кодирует все заголовки в письме $mail с использованием метода base64. Кодировка письма определяется автоматически
 // на основе заголовка Content-Type. Возвращает полученное письмо.
function mailenc($mail) {
  // Разделяем тело сообщения и заголовки
  list($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);

  // Определяем кодировку письма по заголовку Content-type
  $encoding = '';
  $re = '/^Content-type:\s*\S+\s*;\s*charset\s*=\s*(\S+)/mi';
  if (preg_match($re, $head, $p)) {
    $encoding = $p[1];
  }

  // Проходим по всем строкам-заголовкам
  $newhead = "";
  foreach (preg_split('/\r?\n/s', $head) as $line) {

    // кодируем очередной заголовок
    // Было: From: Почтовый робот <somebody@mail.ru>
    // Стало: From: =?utf-8?B?0J/QvtGH0YLQvtCy0YvQuSDRgNC+0LHQvtGC?= <somebody@mail.ru>
    $line = mailenc_header($line, $encoding);
    $newhead .= "$line\r\n";
  }

  // Формируем окончательный результат
  return "$newhead\r\n$body";
}

// Кодирует в строке максимально возможную последовательность символов, начинающуюся с недопустимого символа
// и НЕ включающую E-mail (адреса E-mail обрамляют символами < и >).
// Если в строке нет ни одного недопусимого символа, преобразование не производится.
function mailenc_header($header, $encoding = "UTF-8") {
  return preg_replace_callback(
    '/([\x7F-\xFF][^<>\r\n]*)/s',
    function ($p) use ($encoding) {
      // Пробелы в конце оставляем незакодированными
      preg_match('/^(.*?)(\s*)$/s', $p[1], $sp);
      return "=?$encoding?B?" . base64_encode($sp[1]) . "?=" . $sp[2];
    },
    $header
  );
}

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

$text = "Well, now, ain't this a surprise?";
$tos = ["Пупкин Василий <poupkinne@local.local>", "Иванов <b@local.local>"];
$tpl = file_get_contents('./mail.eml');

foreach($tos as $to) {
  // Заменяем элементы шаблона
  $mail = $tpl;
  $mail = strtr($mail, [
    "{TO}" => $to,
    "{TEXT}" => $text
  ]);

  $mail = mailenc($mail);

  mailx($mail);
}

/*
Было:

From: Почтовый робот <somebody@mail.ru>
To: Пупкин Василий <poupkinne@local.local>
Subject: Добрый день!
Content-Type: text/plain; charset=utf-8

Привет, Пупкин Василий <poupkinne@local.local>!
Well, now, ain't this a surprise?
Это сообщение сгенерировано роботом - не отвечайте на него

Стало:

From: =?utf-8?B?0J/QvtGH0YLQvtCy0YvQuSDRgNC+0LHQvtGC?= <somebody@mail.ru>
To: =?utf-8?B?0J/Rg9C/0LrQuNC9INCS0LDRgdC40LvQuNC5?= <poupkinne@local.local>
Subject: =?utf-8?B?0JTQvtCx0YDRi9C5INC00LXQvdGMIQ==?=
Content-Type: text/plain; charset=utf-8

Привет, Пупкин Василий <poupkinne@local.local>!
Well, now, ain't this a surprise?
Это сообщение сгенерировано роботом - не отвечайте на него.
 */