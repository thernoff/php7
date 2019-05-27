<?php
// Работа с подмассивами
$input = ["a", "b", "c", "d", "e"];
$output = array_slice($input, 2); // ["c", "d", "e"]
$output = array_slice($input, -2, 1); // ["d"]
$output = array_slice($input, 2, -1); // ["c", "d"]
$output = array_slice($input, 0, 3); // ["a", "b", "c"]

// splice() - позволяет вырезать часть массива и при этом добавлять новые элементы
$colors = ["red", "green", "blue", "yellow"];
//$result = array_splice($colors, 2); // $colors == ["red", "green"], $result = [ "blue", "yellow"]
//$result = array_splice($colors, 1, -1); // $colors == ["red", "yellow"], $result = [ "green", "blue"]
//$result = array_splice($colors, -1, 1); // $colors == ["red", "green", "blue"], $result = [ "yellow"]
//$result = array_splice($colors, -1, 1, ["black", "maroon"]); // $colors == ["red", "green", "blue", "black", "maroon"], $result = [ "yellow"]
$result = array_splice($colors, 1, count($colors), "orange"); // $colors == ["red", "green", "blue", "black", "maroon"], $result = [ "yellow"]
echo "<pre>";
echo "<b>colors</b><br/>";
print_r($colors); 
echo "</pre>";
echo "<pre>";
echo "<b>result</b><br/>";
print_r($result);
echo "</pre>";
echo "<br/>";