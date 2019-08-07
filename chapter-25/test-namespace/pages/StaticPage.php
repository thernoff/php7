<?php
namespace pages;

use \base\Page;
use \base\Tags;

class StaticPage extends Page {
  use Tags;

  public function setTags(Array $tags) {
    $this->tags = $tags;
  }
}