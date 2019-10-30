<?php
/**
 * Графические примитивы (полный список функций: http://ru.php.net/manual/ru/ref.image.php)
 *
 * Копирование изображений
 * int imageCopyResized(resource $dst_im, resource $src_im, int $dstX, int $dstY, int $srcX, int $srcY, int $dstW, int $dstH, int $srcW, int $srcH)
 * В отличии от предыдущей функции, следующая функция при изменении размеров изображения пытается провести сглаживание и интерполяцию точек
 * int imageCopyResampled(resource $dst_im, resource $src_im, int $dstX, int $dstY, int $srcX, int $srcY, int $dstW, int $dstH, int $srcW, int $srcH)
 */
## Увеличение картинки со сглаживанием
$from = imageCreateFromJpeg("witcher.jpg");
$to = imageCreateTrueColor(2000, 1252);
imageCopyResampled($to, $from, 0, 0, 0, 0, imageSX($to), imageSY($to), imageSX($from), imageSY($from));
//imageCopyResized($to, $from, 0, 0, 0, 0, imageSX($to), imageSY($to), imageSX($from), imageSY($from));
//header("Content-type: image/jpeg");
//imageJpeg($to);

/**
 * Прямоугольники
 * int imageFilledRectangle(resource $im, int $x1, int $y1, int $x2, int $y2, int $col)
 */
$i = imageCreate(100, 100);
$c = imageColorAllocate($i, 1, 255, 1);
imageFilledRectangle($i, 0, 0, imageSX($i) - 1, imageSY($i) - 1, $c);
imageColorTransparent($i, $c);
// Дальше работаем с изначально прозрачным фоном

/**
 * Следующая функция рисует в изображении прямоугольник с границей, толщиной 1 пиксел, цветом $col. Вместо цвета $col можно задавать константу
 * IMG_COLOR_STYLED, которая говорит библиотеке GD, что линию нужно рисовать не сплошную, а с использованием текущего стиля пера.
 * imageRectangle(resource $im, int $x1, int $y1, int $x2, int $y2, $col)
 *
 * Выбор пера
 * bool imageSetThickness(resource $im, int $thickness)
 * устанавливает толщину пера, которое используется при рисовании различных фигур. По умолчанию равна 1 пикселю.
 *
 * bool imageSetStyle(resource $image, list $style)
 * устанавливает стиль пера, который определяет, пикселы какого цвета будут составлять линию. Массив $style содержит идентификаторов цветов,
 * предварительно созданных в скрипте. Эти цвета будут чередоваться при выводе линий.
 * Если очередную точку при выводе линии необходимо пропустить, вместо идентификатора цвета можно указать специальную константу IMG_COLOR_TRANSPARENT.
 */
## Изменение пера
// Создаем новое изображение
$im = imageCreate(300, 300);
$w = imageColorAllocate($im, 255, 255, 255);
$c1 = imageColorAllocate($im, 0, 0, 255);
$c2 = imageColorAllocate($im, 0, 255, 0);
// Очищаем фон
imageFilledRectangle($im, 0, 0, imageSX($im), imageSX($im), $w);
// Устанавливаем стиль пера
$style = array($c2, $c2, $c2, $c2, $c2, $c2, $c2, $c1, $c1, $c1, $c1);
imageSetStyle($im, $style);
// Устанавливаем толщину пера
imageSetThickness($im, 4);
// Рисуем линию
imageLine($im, 0, 0, 300, 300, IMG_COLOR_STYLED);
// Выводим изображение в браузер
//header("Content-type: image/png");
//imagePng($im);

/**
 * Линии
 * int imageLine(resource $im, int $x1, int $y1, int $x2, int $y2, int $col)
 * Если вместо иденификатора цвета использовать константу IMG_COLOR_STYLED, то мы получим линию, нарисованную текущим
 * установленным стилем пера.
 *
 *
 * Дуга сектора
 * int imageArc(resource  $im, int $cx, int $cy, int $w, int $h, int $s, int $e, int $c)
 * Рисует в изображении $im дугу эллипса от угла $s до $e (углы указываются в градусах против часовой стрелке, отсчитываемых от
 * горизонтали). Эллипс рисуется такого размера, чтобы вписываться в прямоугольник ($x, $y, $w, $h), где $w и $h задают его
 * ширину и высоту, а $x и $y - координаты верхнего левого угла. Сама фигура не закрашивается, обводится только ее контур.
 * В качестве значения $c можно указать константу IMG_COLOR_STYLED.
 *
 *
 * Закраска произвольной области
 * int imageFill(resource  $im, int $x, int $y, int $col)
 * Выполняет сплошную заливку одноцветной области, содержащей точку с координатами ($x, $y) и цветом $col. Будут закрашены только
 * те точки, к которым можно проложить "одноцветный сильно связанный путь" из точки ($x, $y).
 *
 * int imageFillToBorder(resource $im, int $x, int $y, int $border, int $col)
 * Выполняет закраску не одноцветных точек, а любых, но до тех пор, пока не будет достигнута граница цвета $border.
 *
 *
 * Закраска текстурой
 * int imageSetTile(resource $im, resource $tile)
 * Устанавливает текущую текстуру закраски $tile для изображения $im.
 *
 *
 * Многоугольники
 * int imagePolygon(resource $im, list $points, int $num_points, int $col)
 * Координаты углов передаются в массиве-списке $points, причем $points[0] = x0, $points[1] = y0, $points[2] = $x1, $points[3] = $y1 и т.д.
 * $num_points - общее число вершин, на тот случай, если в массиве их больше, чем нужно рисовать.
 * Многоугольник не закрашивается.
 *
 * int imageFilledPolygon(resource $im, list $points, int $num_points, int $col)
 * Аналогична предыдущей, но заливает полученный многоугольник цветом $col.
 */
## Увеличение картинки со сглаживанием
$tile = imageCreateFromJpeg("texture.jpg");
$im = imageCreateTrueColor(800, 600);
imageFill($im, 0, 0, imageColorAllocate($im, 0, 255, 0));
imageSetTile($im, $tile);
// Создаем массив точек со случайными координатами
$p = [];
for ($i = 0; $i < 4; $i++) {
  array_push( $p, mt_rand(0, imageSX($im)), mt_rand(0, imageSY($im)) );
}
// Рисуем закрашенный многоугольник
imageFilledPolygon($im, $p, count($p)/2, IMG_COLOR_TILED);
// Выводим результат
header("Content-type: image/jpeg");
// Выводим картинку с максимальным качеством
imageJpeg($im, null, 100);

// Можно сжать с помощью PNG
//header("Content-type: image/png");
//imagePng($im);

/**
 * Работа с пикселами
 * int imageSetPixel(resource $im, int $x, int $y, int $col)
 * Выводит один пиксел, расположенный в точке ($x, $y) цвета $col в изображении $im.
 *
 * resource imageColorAt(resource $im, int $x, int $y)
 * Возвращает идентификатор цвета точки.
 */