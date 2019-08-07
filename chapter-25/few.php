<?php
namespace PHP7\functions {
  // Отладочная функция
  function debug($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
  }
}

namespace PHP7\classes {
  // Класс страницы
  class Page {
    protected $title;
    protected $content;

    public function __construct($title = '', $content = '') {
      $this->title = $title;
      $this->content = $content;
    }
  }
}