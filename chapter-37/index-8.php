<?php
/**
 * Заполнение связанных таблиц
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Добавление новости</title>
</head>
<body>
  <form action="addnews.php"  method="POST">
    <label for="name">Название</label>
    <input type="text" name="name" id="name" />
    <br/>
    <label for="content">Содержимое</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <br/>
    <button type="submit">Добавить</button>
  </form>
</body>
</html>