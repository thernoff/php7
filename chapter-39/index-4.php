<?php
// Отправка данных методом POST
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Форма</title>
</head>
<body>
  <form action="handler.php" method="POST">
    Имя: <input type="text" name="name" id="name"><br>
    Пароль: <input type="text" name="pass" id="pass"><br>
    <input type="submit" value="Отправить">
  </form>
</body>
</html>