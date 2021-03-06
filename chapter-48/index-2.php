<?php
/**
 * Внутренний редирект - обрабатывается на сервере, а не в браузере.
 *
 * При работе с web-сервером существует лишь один способ выполнить внутренний редирект:
 * указать в заголовке Location не абсолютный URL (с префиксом http:// и именем хоста), а абсолютный URI (т.е. URL без имени хоста).
 * Отсюда автоматически следует, что внутренний редирект, в отличие от внешнего, может происходить только в пределах одного сайта.
 */
 ## Внутренний редирект (только в CGI-версии PHP)
 // Вначале форсируем внутренний редирект
 header("Status: 200 OK");
 // Получаем URI-каталог текущего скрипта
 $dir = dirname($_SERVER['SCRIPT_NAME']); // /php/courses_books/php7/chapter-48
 if ($dir == '\\') {
     $dir = '';
 }

 // Осуществляем переадресацию по абсолютному (!) URI
 header("Location: $dir/result.php");
 exit();