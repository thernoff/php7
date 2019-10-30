<?php
/**
 * Работа с изображениями и библиотека GD
 *
 * Создание изображения
 * Сначала нужно создать картинку - пустую (при помощи функции imageCreate()) или же загруженную с диска (функции imageCreateFromPng(),
 * imageCreateFromJpeg() или imageCreateFromGif()):
 *
 * resource imageCreate(int $x, int $y)
 *
 * Изображения, созданные при помощи функции imageCreate(), обычно сохраняют в формате PNG или GIF, но не JPEG.
 *
 * resource imageCreateTrueColor(int $x, int $y) - создает полноцветные изображения.
 *
 * Загрузка изображения
 *
 * resource imageCreateFromPng(string $filename)
 * resource imageCreateFromJpeg(string $filename)
 * resource imageCreateFromGif(string $filename)
 *
 * При загрузке изображение распаковывается и хранится в памяти уже в неупакованном виде.
 * При сохранении на диск или выводе в браузер функцией imagePng() (imageJpeg(), imageGif()) картинка автоматически упаковывается.
 *
 * Определение параметров изображения
 * Как только картинка создана и получен ее идентификатор, библиотеке GD становится совершенно все равно, какой формат она (картинка)
 * имеет и каким путем ее создали.
 * В любой момент времени можно определить размер загруженной картинки, с помощью функций:
 * int imageSX(resource $im) и int imageSY(resource $im) - получаем ширину и высоту картинки в пикселах.
 *
 *
 * Сохранение изображения (можно выводить в браузер, можно сохранять). Сначала изображение должно быть загружено,
 * либо создано с помощью функции imageCreate(). Если аргумент $filename опущен (или равен пустой строке "" или NULL), то сжатые данные
 * в соответствующем формате отправляются прямо в стандартный выходной поток, т.к. в браузер. Нужный заголовок Content-type при этом не выводится,
 * ввиду чего нужно указывать его вручную при помощи header().
 * int imagePng(resource $im, [,string $filename] [,int $quality])
 * int imageJpeg(resource $im, [,string $filename] [,int $quality])
 * int imageGif(resource $im, [,string $filename] [,int $quality])
 *
 * Фактически нужно вызвать одну из двух команд (лучше вызывать перед вызовом imagePng() или imageJpeg()):
 * header("Content-type: image/png"); // для PNG
 * header("Content-type: image/jpeg"); // для JPEG
 *
 * Преобразование изображения в палитровое
 * void imagetruecolortopalette(resource $im, bool $ditcher, int $ncolors)
 */