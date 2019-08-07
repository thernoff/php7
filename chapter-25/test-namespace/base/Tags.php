<?php
namespace base;

trait Tags {
    public function tags() {
        // $query = "SELECT * FROM tags WHERE id IN(:ids)"
        echo implode(', ', $this->tags);
    }
}