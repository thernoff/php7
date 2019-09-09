<?php
/**
 * Файловые функции и потоки
 * Файловые функции в PHP имеют куда больше возможностей, чем мы рассматривали до сих пор. В частности, благодаря технологии потоков (Streams)
 * функции и директивы fopen(), file(), file_get_contents(), opendir(), include и все остальные способны работать не только с обычными файлами,
 * но также и с внешними HTTP-адресами.
 */
## Пример работы с fopen wrappers.
echo "<h1>Первая страница (HTTP):</h1>";
echo file_get_contents("http://php.net");

echo "<h1>Вторая страница (FTP):</h1>";
echo file_get_contents("ftp://ftp.aha.ru/");

/**
 * Если для подключения к FTP или HTTP необходимо указать имя входа или пароль, это делается следующим образом:
 * http://user:password@php.net/
 * http://user:password@ftp.aha.ru/pub/CPAN/CPAN.html
 *
 * Так можно скопировать файл на другую машину, где у вас есть учетная запись на FTP-сервере:
 * file_put_contents("ftp://user:pass@site.ru/f.txt", "This is my world");
 */

 /**
  * При использовании функций вроде file_get_contents() и fopen() для работы с файловой системой PHP автоматически выбирает обработчик file://.
  * Однако его можно указать и явно.
  * echo file_get_contents('file:///etc/hosts'); // Unix
  * echo file_get_contents('file:///C:/Windows/system32/drivers/etc/hosts');
  */

  /**
   * Проблемы безопасности
   * Если в конфигурационном файле php.ini отключена директива allow_url_fopen=Off, сетевые возможности файловых функций будут запрещены.
   */