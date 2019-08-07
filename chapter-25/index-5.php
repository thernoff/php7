<?php
require_once(__DIR__ . "/PHP7/Seo.php");
require_once(__DIR__ . "/PHP7/Tag.php");
require_once(__DIR__ . "/PHP7/Page.php");

$page = new PHP7\Page("About", "Content");
$page->tags();