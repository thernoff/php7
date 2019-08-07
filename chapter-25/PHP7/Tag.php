<?php
namespace PHP7;

trait Tag {
    public function tags() {
        // $query = "SELECT * FROM tags WHERE id IN(:ids)"
        echo "Tag::tags<br/>";
    }
}