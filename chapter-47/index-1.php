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
## PHP автоматически создает переменные при закачке
if (@$_REQUEST['doUpload']) {
    echo '<pre>Содержимое $_FILES: ' . print_r($_FILES, true) . '</pre><hr />';
}
?>
  Выберите какой-нибудь файл в форме ниже:
  <form action="<?php $_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="myFile" />
    <input type="submit" name="doUpload" value="Закачать">
  </form>
</body>

</html>

<?php
/**
 * bool is_uploaded_file(string $filename)
 * Возвращает true, если файл $filename был загружен на сервер. Причем в качестве аргумента $filename следует передавать имя временного
 * файла на сервере $_FILES['myFile']['tmp_name']
 */