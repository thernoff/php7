<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Форма для отправки данных методом POST</title>
</head>
<body>
  <form action="handler.php" method="POST">
    Name: <input type="text" name="first_name" /><br/>
    Last name: <input type="text" name="last_name" /><br />
    <input type="submit" value="Send" />
  </form>
</body>
</html>
-->
<?php
/**
 * Используя контекст потока, мы можем отправить POST-запрос обработчику handler.php не обращаясь к HTML-форме
 */

 ## Отправка POST-данных напрямую
 // Содержимое POST-запроса
 $body = "first_name=Igor&last_name=Simdyanov";
 // Параметры контекста
 $opts = [
   'http' => [
    'method' => "POST",
    'user_agent' => "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0)",
    'header' => "Content-type: application/x-www-form-urlencoded\r\n".
                "Content-Length: " . mb_strlen($body),
    'content' => $body
   ]
 ];

 // Формируем контекст
 $context = stream_context_create($opts);
 // Отправляем запрос
 echo file_get_contents(
   'http://basic.loc/php/courses_books/php7/chapter-32/handler.php',
   false,
   $context
 );