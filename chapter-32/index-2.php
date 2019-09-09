<?php
/**
 * Контекст потока
 * Контекст потока создается при помощи функции stream_context_create()
 */
$opts = [
  'http' => [
    'method' => 'GET',
    'user_agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0)',
    'header' => 'Content-type: text/html; charset=UTF-8'
  ]
];

echo file_get_contents(
  'http://php.net',
  false,
  stream_context_create($opts)
);
/**
 * Теперь Web-сервер в качестве пользовательского агента получит не строку "PHP", а "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0)".
 * Примечание: пользовательский агент, который отсылается по умолчанию, может быть настроен в конфигурационном файле php.ini при
 * помощи директивы user_agent.
 */