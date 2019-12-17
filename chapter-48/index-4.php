<?php
/**
 * Самопереадресация
 * Страница заставляет браузер перейти на саму себя
 */
  $FNAME = "book.txt";
  if (@$_REQUEST['doAdd']) {
      $f = fopen("book.txt", "a");
      if (@$_REQUEST['text']) {
          fputs($f, $_REQUEST['text'] . "\n");
          fclose($f);
          $rnd = time();
          header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?$rnd");
          exit();
      }
  }

  $gb = @file($FNAME);
  if (!$gb) {
      $gb = [];
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Использование самопереадресации</title>
</head>

<body>

  <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
    Текст:<br />
    <textarea name="text" id="text" cols="30" rows="2"></textarea><br />
    <input type="submit" name="doAdd" value="Добавить">
  </form>
  <?php
    foreach ($gb as $text) {
        echo htmlspecialchars($text) . "<br/><hr/>";
    }
  ?>
</body>

</html>