<?php
// Библиотека SPL
/**
 * По умолчанию PHP предоставляет пользователю некоторое число готовых классов и интерфейсов, встроенных в язык.
 * Их название называется SPL (Standart PHP Library).
 * SPL включает несколько классов (ArrayIterator, DirectoryIterator, FilterIterator, SimpleXMLIterator и т.д.), а также интерфейсов
 * (RecursiveIterator, SeekableIterator и др.).
 */

// Класс DirectoryIterator предоставляет доступ к содержимому каталога.
$dir = new DirectoryIterator('./files');
foreach ($dir as $file) { // $file выступает не как строка, а как объект, реализующий различные методы
if ($file->isFile()) {
  echo $file . " " . $file->getSize() . "<br/>";
}
}

// Класс FilterIterator
class ExtensionFilter extends FilterIterator {
  // Фильтруемое расширение
  private $ext;
  // Итератор DirectoryIterator
  private $it;

  public function __construct(DirectoryIterator $it, $ext) {
    parent::__construct($it);
    $this->it = $it;
    $this->ext = $ext;
  }

  // Метод, определяющий, удовлетворяет текущий элемент фильтру или нет
  public function accept() {
    if (!$this->it->isDir()) {
      $ext = pathinfo($this->current(), PATHINFO_EXTENSION);
      return $ext === $this->ext;
    }

    return false;
  }
}

$filter = new ExtensionFilter(new DirectoryIterator('./files'), 'png');

foreach($filter as $file) {
  echo $file . "<br/>";
}

// Класс LimitIterator и его производные позволяют осуществить постраничный вывод.
/**
 * Конструктор класса принимает в качестве первого параметра итератор, а в качестве второго параметра - начальную позицию (по умолчанию равную 0),
 * а в качестве третьего - смещение от позиции. При этом итератор работает с участком коллекции, определяемым вторым и третьим параметрами.
 */
echo "Класс LimitIterator <br/>";
$limit = new LimitIterator( new ExtensionFilter(new DirectoryIterator('.'), "php"), 3, 2);
foreach ($limit as $file) {
  echo $file . "<br/>";
}

// Рекурсивные итераторы
// Использование рекурсивной функции
function recursion_dir($path) {
  static $depth = 0;

  $dir = opendir($path);
  while (($file = readdir($dir)) !== false) {
    if ($file == "." || $file == "..") continue;

    echo str_repeat("-", $depth) . " $file<br/>";

    if (is_dir("$path/$file")) {
      $depth++;
      recursion_dir("$path/$file");
      $depth--;
    }
  }
  closedir($dir);
}
echo "Использование рекурсивной функции<br/>";
recursion_dir(".");

// Использование рекурсивного итератора
$dir = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator('.'),
  true
);

echo "Использование рекурсивного итератора<br/>";
foreach($dir as $file) {
  echo str_repeat("-", $dir->getDepth()) . " $file<br/>";
}