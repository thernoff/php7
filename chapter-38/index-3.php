<?php
/**
 * Работа с цветом в формате RGB
 *
 * Создание нового цвета
 * int imageColorAllocate(resource $im, int $red, int $green, int $blue) // функция возвращает идентификатор цвета
 *
 * Текстовое представление цвета
 * $txtcolor = "FFFF00";
 * sscanf($txtcolor, "%2x%2x%2x", $red, $green, $blue);
 * $color = imageColorAllocate($ime, $red, $green, $blue);
 *
 * Для обратного преобразования
 * $txtcolor = sprintf("%2x%2x%2x", $red, $green, $blue);
 *
 * Получение ближайшего в палитре цвета
 * Вместо того чтобы пытаться выискать свободное место в палитре цветов, данная функция возвращает идентификатор цвета, уже существующего в рисунке
 * и находящегося ближе всего к затребованному. Таким образом, новый цвет в палитру не добавляется.
 * int imageColorClosest(resource $im, int $red, int $green, int $blue)
 *
 * Эффект прозрачности (!Задание прозрачного цвета поддерживают только палитровые изображнеия, но не полноцветные.)
 * Данная функция указывает GD, что соответствующий цвет $col (заданный своим идентификатором) в изображении $im должен обозначиться как прозрачный.
 * Возвращает идентификатор нового цвета или текущего цвета, если ничего не изменилось. Если аргумент $col не задан и в изображении нет прозрачных цветов
 * функция вернет -1.
 * int imageColorTransparent(resource $im [,$int col])
 *
 * $tc = imageColorClosest($im, 0, 255, 0);
 * imageColorTransparent($im, $tc);
 *
 * Получение RGB-составляющих
 * Данная функция возвращает ассоциативный массив с ключами red, green и blue, которым соответствуют значения, равные величинам компонентов RGB
 * в идентификаторе цвета $index.
 * array imageColorsForIndex(resource $im, int $index)
 *
 * $c = imageColorAt($im, 0, 0); // Возвращает индекс (идентификатор?) цвета пиксела на заданных координатах на изображении image.
 * list ($r, $g, $b) = array_values(imageColorsForIndex($im, $c));
 * echo "R=$r, g=$g, b=$b";
 *
 * Использование полупрозрачных цветов
 * Для их создания используются функции imageColorAllocateAlpha(), imageColorClosestAlpha(), imageColorExactAlpha() и т.п.
 */
## Работа с полупрозрачными цветами
$size = 300;
$im = imageCreateTrueColor($size, $size);
$back = imageColorAllocate($im, 255, 255, 255);
imageFilledRectangle($im, 0, 0, $size - 1, $size - 1, $back);
// Создаем идентификаторы полупрозрачных цветов
$yellow = imageColorAllocateAlpha($im, 255, 255, 0, 75);
$red = imageColorAllocateAlpha($im, 255, 0, 0, 75);
$blue = imageColorAllocateAlpha($im, 0, 0, 255, 75);
// Рисуем 3 пересекающихся круга
$radius = 150;
imageFilledEllipse($im, 100, 75, $radius, $radius, $yellow);
imageFilledEllipse($im, 120, 165, $radius, $radius, $red);
imageFilledEllipse($im, 187, 125, $radius, $radius, $blue);
// Выводим изображение в браузер
header("Content-type: image/png");
imagePng($im);