<?php
// Незахватывающий поиск
// Позитивный просмотр вперед (?=подвыражение)
$re = "| (\S+) (?= \s* </) |x";
$str = "<h2>Welcome to our <b>site</b></h2>";
preg_match($re, $str, $matches);
foreach($matches as $key=>$value) {
    echo htmlspecialchars($value);
    echo "<br/>";
}

// Негативный просмотр вперед (?!подвыражение)
$re = '/
    (?![.,])
    ([[:punct:]]+)
/x';
$str = "Hi. My name, is John!!!";
preg_match($re, $str, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

// Позитивный просмотр назад (?<=подвыражение)
$re = '/
        (?<=<)  # слева идет "<" - начало тега...
        (\w+)   # дальше - имя тега
    /x';
$str = "gutten <tag>";
preg_match($re, $str, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

// Негативный просмотр назад (?<!подвыражение)
$re = '/(?<!foo)bar/';
preg_match($re, 'boobar', $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";
preg_match($re, 'foobar', $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";