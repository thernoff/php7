<?php
namespace base;

abstract class Page {
  protected $title;
  protected $content;
  protected $tags = [];

  public function __construct(String $title = '', String $content = '', Array $tags = []) {
    $this->title = $title;
    $this->content = $content;
    $this->tags = $tags;
  }

  public function html() {
    return "<h1>{$this->title}</h1><main>{$this->content}</main>";
  }

  abstract public function setTags(Array $tags);
}