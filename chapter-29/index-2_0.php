<?php
// Определение собственного итератора
// Итератор - это объект, класс которого реализует встроенный в PHP интерфейс Iterator. Он позволяет программе решать, какие значения
// необходимо подставлять в переменные инструкции foreach при ее работе и в каком порядке это делать.

// Пример определения итератора
/**
 * Каталог. При итерации возвращает свое содержимое.
*/

class FSDirectory implements IteratorAggregate {
  public $path;

  public function __construct($path) {
    $this->path = $path;
  }

  // Возвращает итератор - "представителя" данного объекта
  public function getIterator() {
    return new FSDirectoryIterator($this);
  }
}

/**
 * Класс-итератор. Является представителем для объекта FSDirectory
 * при переборе содержимого каталога.
*/
class FSDirectoryIterator implements Iterator {
  // Ссылка на "объект-начальник"
  private $owner;
  // Дескриптор открытого каталога
  private $d = null;
  // Текущий считанный элемент каталога
  private $cur = false;
  // Конструктор. Инициализирует новый итератор.
  public function __construct($owner) {
    $this->owner = $owner;
    $this->d = opendir($owner->path);
    $this->rewind();
  }
  /**
   * Далее идут переопределения виртуальных методов интерфейса Iterator
   * rewind(), valid(), key(), current(), value()
   */
  // Устанавливает итератор на первый элемент
  public function rewind() {
    // rewinddir() - Сбрасывает поток каталога, переданный в параметре dir_handle таким образом, чтобы тот указывал на начало каталога.
    rewinddir($this->d);
    $this->cur = readdir($this->d);
  }
  // Проверяет, не закончились ли уже элементы
  public function valid() {
    // readdir() возвращает false, когда элементы каталога закончились
    return $this->cur !== false;
  }

  // Возвращает текущий ключ
  public function key() {
    return $this->cur;
  }

  // Возвращает текущее значение
  public function current() {
    $path = $this->owner->path . "/" . $this->cur;
    return is_dir($path) ? new FSDirectory($path) : new FSFile($path);
  }

  // Передвигает итератор к следующему элементу в списке
  public function next() {
    $this->cur = readdir($this->d);
  }
}

/**
 * Файл
 */
class FSFile {
  public $path;

  public function __construct($path) {
    $this->path = $path;
  }

  // Возвращает информацию об изображении
  public function getSize() {
    return filesize($this->path);
  }

  // Здесь могут быть другие методы
}

// Пример использования итератора
$d = new FSDirectory("./files");
foreach ($d as $path => $entry) {
  if ($entry instanceof FSFile) {
    echo "<tt>$path</tt>: " . $entry->getSize() . "<br/>";
  }
}