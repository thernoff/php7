<?php
// Работа с подстроками
$str = "В лесу родилась ёлочка,\nВ лесу она росла.\nЗимой и летом стройная,\nЗелёная была.";

echo $str;
echo "<br/>";
$s1 = mb_substr($str, 0, 15);
echo $s1;
echo "<br/>";
echo "<br/>";

$s2 = str_replace("\n", "<br />\n", $str);
echo $s2;
echo "<br/>";
echo "<br/>";

$s3 = nl2br($str);
echo $s3;
echo "<br/>";
echo "<br/>";

$str2 = "В лесу ёлочка";
echo substr_replace($str2, "родилась ", 12); // В лесу родилась
echo "<br/>";
echo substr_replace($str2, "родилась ", 12, 0); // В лесу родилась ёлочка
echo "<br/>";