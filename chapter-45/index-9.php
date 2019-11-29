<?php
/**
 * Сжатие PHAR-архива
 *
 * По умолчанию PHAR-архивы не подвергаются сжатию. Однако для экономии места их можно преобразовать в tag.gz или bz2-архивы.
 *
 * final public static bool Phar::canCompress([ int $type ])
 * Проверяет, может ли архив подвергнуться сжатию, если это возможно, возвращается true, иначе возвращается false.
 * Необязательный параметр $type позволяет уточнить метод сжатия:
 * Phar::GZ - gzip-сжатие
 * Phar::BZ2 - bzip2-сжатие
 *
 * public object Phar::compress(int $compression [, string $extension ])
 * Сообщает классу Phar о необходимости сжатия PHAR-архива перед сохранением. Параметр $compression определяет метод сжатия и может принимать одну
 * из констант:
 * Phar::NONE - отсутствие сжатия;
 * Phar::GZ - gzip-сжатие;
 * Phar::BZ2 - bzip2-сжатие.
 *
 * Пример см. на стр. 852
 *
 * public object Phar::decompress([ string $extension ])
 * Распаковывает сжатый архив до состояния обычного PHAR-архива.
 *
 * public void Phar::compressFiles(int $compression)
 * Сжимает не весь архив, а файлы внутри исполняемого архива.
 *
 * public bool Phar::decompressFiles(void)
 * Распаковывает сжатые файлы внутри PHAR-архива.
 *
 * public PharData Phar::convertToData([
 *  int $format [,
 *    int $compression [,
 *      string $extension]]])
 * Преобразует PHAR-архив в обычный tar.gz или zip-архив.
 */