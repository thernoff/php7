<?php

spl_autoload_register();

use \pages\StaticPage;

$staticPage = new StaticPage("Заголовок статической страницы", "<p>Hello world!!!</p>");
$staticPage->setTags(['test', 'static', 'hello']);
$staticPage->tags();
echo $staticPage->html();