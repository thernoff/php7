<?php
/**
 * Отправка писем с вложением
 * Для того чтобы отправить почтовое сообщение с прикрепленным к нему файлом, необходимо особым способом подготовить текст письма и снабдить
 * его соответствующими почтовыми заголовками
 */

 if (!empty($_POST)) {
   // Обработчик HTML-формы
   include "handler.php";
 }
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Отправка письма с вложением</title>
</head>
<body>
  <table>
    <form enctype="multipart/form-data" method="post">
      <tr>
        <td width="50%">Кому:</td>
        <td align="right">
          <input type="text" name="mail_to" maxlength="32" />
        </td>
      </tr>
      <tr>
      <td width="50%">Тема:</td>
        <td align="right">
          <input type="text" name="mail_subject" maxlength="64" />
        </td>
      </tr>
      <tr>
        <td colspan='2'>
          Сообщение:<br/>
          <textarea name="mail_msg" id="" cols="56" rows="8"></textarea>
        </td>
      </tr>
      <tr>
        <td width="50%">Изображение:</td>
        <td align="right">
          <input type="file" name="mail_file" maxlength="64">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="Отправить">
        </td>
      </tr>
    </form>
  </table>
</body>
</html>