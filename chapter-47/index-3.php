<?php
/**
 * Сложные имена полей
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP автоматически создает переменные при закачке</title>
</head>

<body>
  <?php
  if (@$_REQUEST['doUpload']) {
      echo '<pre>Содержимое $_FILES: ' . print_r($_FILES, true) . '</pre><hr/>';
  }
?>
  <form action="<?= $_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
    <h3>Выберите тип файлов в вашей системе:</h3>
    Текстовый файл: <input type="file" name="input[a][text]" /><br />
    Бинарный файл: <input type="file" name="input[a][bin]" /><br />
    <input type="submit" name="doUpload" value="Отправить файлы">
  </form>
</body>

</html>