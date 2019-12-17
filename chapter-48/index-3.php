<?php
/**
 * Самопереадресация
 * Страница заставляет браузер перейти на саму себя
 */
## Плохая реализация гостевой книги
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Плохая реализация гостевой книги</title>
</head>

<body>
  <?php
    $FNAME = "book.txt";
    if (@$_REQUEST['doAdd']) {
        $f = fopen($FNAME, "a");

        if (@$_REQUEST['text']) {
            fputs($f, $_REQUEST['text']."\n");
        }
        fclose($f);
    }

    $gb = @file($FNAME);
    if (!$gb) {
        $gb = [];
    }
  ?>

  <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
    Текст:<br />
    <textarea name="text" id="text" cols="30" rows="2"></textarea><br />
    <input type="submit" name="doAdd" value="Добавить">
  </form>
  <?php
    foreach ($gb as $text) {
        echo $text . "<br/><hr/>";
    }
  ?>
</body>

</html>