<?php
/**
 * Фильтрация внешних данных
 * Внешние данные приходят в скрипт через один из суперглобальных массивов
 * $_GET
 * $_POST
 * $_COOKIE данные поступившие из cookies
 * $_SERVER данные установленные Web-сервером
 * $_ENV переменные окружения, установленные процессу Web-сервером
 *
 * $_FILES загруженные на сервер файлы
 * $_SESSION - данные сессии
 * $_REQUEST объединение всех перечисленных выше данных
 */

 /**
  * Для фильтрации данных из этих массивов предназначена специальная функция filter_input или filter_input_array
  */

$value = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$result = filter_input(
  INPUT_POST,
  'search',
  FILTER_CALLBACK,
  [
    'options' => function($value) {
      // Фильтруем слова меньше 3-х символов
      $value = preg_replace_callback(
        "/\b([^\s]+?)\b/u", // \b соответствует началу или концу слова
        function($match) {
          if (mb_strlen($match[1]) > 3) {
            return $match[1];
          } else {
            return '';
          }
        },
        $value);
        // Удаляем теги
        return strip_tags($value);
    }
  ]
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Фильтрация пользовательских данных</title>
</head>
<body>
  <form method="POST">
    <input type="text" name="search" id="" value="<?= $value ?>"><br/>
    <input type="submit" value="Фильтровать">
  </form>
  <?= $result; ?>
</body>
</html>