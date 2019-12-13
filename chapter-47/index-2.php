<?php
/**
 * Получение закачанного файла
 * С помощью команды copy($_FILES['myFile']['tmp_name'], "uploaded.dat") можно скопировать только что полученный файл
 * на новое место.
 *
 * bool move_uploaded_file(string $filename, string $destination)
 * Проверяет, является ли файл $filename только что закачанным, и, если это так, перемещает его на новое место под именем $destination
 * (желательно указывать абсолютный путь в этом аргументе). В случае ошибки возвращается false.
 */

## Простейший фотоальбом с возможностью закачки
$imgDir = "img";
@mkdir($imgDir, 0777);

// Проверяем, нажата ли кнопка добавления фотографии
if (@$_REQUEST['doUpload']) {
    $data = $_FILES['file'];
    $tmp = $data['tmp_name'];
    // Проверяем, принят ли файл
    if (is_uploaded_file($tmp)) {
        $info = @getimagesize($tmp);
        // Проверяем, является ли файл изображением
        if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
            // Имя берем равным текущему времени в секундах, а расширение - как часть MIME-типа после "image/"
            $name = "$imgDir/" . time() . "." . $p[1];
            // Добавляем файл в каталог с фотографиями
            move_uploaded_file($tmp, $name);
        } else {
            echo "<h2>Попытка добавить файл недопустимого формата!</h2>";
        }
    } else {
        echo "<h2>Ошибка закачки #{$data['error']}!</h2>";
    }
}
// Теперь считываем в массив наш фотоальбом
$photos = [];
foreach (glob("$imgDir/*") as $path) {
    $sz= getimagesize($path);
    $tm = filemtime($path);
    // Вставляем изображение в массив $photos
    $photos[$tm] = [
    'time' => $tm, // время добавления
    'name' => basename($path), // имя файла
    'url' => $path, // его URI
    'w' => $sz[0], // ширина картинки
    'h' => $sz[1], // ее высота
    'wh' => $sz[3] // "width=xxx height=yyy"
  ];

    // Ключи массива $photos - время в секундах, когда была добавлена та или иная фотография.
  // Сортируем массив: наиболее "свежие" фотографии располагаем ближе к началу.
}
krsort($photos);
// Данные для вывода готовы
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Простейший фотоальбом с возможностью закачки</title>
</head>

<body>
  <form action="<?php $_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" /><br />
    <input type="submit" name="doUpload" value="Закачать новую фотографию">
    <hr>
  </form>
  <?php
    foreach ($photos as $n => $img) {
        ?>
  <p>
    <img src="<?=$img['url']?>" <?=$img['wh']?> alt="Добавлена <?=date("d.m.Y H:i:s", $img['time'])?>">
  </p>
  <?php
    }
  ?>
</body>

</html>