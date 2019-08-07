<?php
// Пространство имен
namespace PHP7;

// Отладочная функция
function debug($obj) {
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
}

// Класс страницы
class Page {
  protected $title;
  protected $content;

  public function __construct($title = '', $content = '') {
    $this->title = $title;
    $this->content = $content;
  }
}