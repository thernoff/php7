<?php
/**
 * Массивы и cookie
 * Для сохранения в cookie сложного объекта можно использовать функцию serialize().
 * Либо каждые элемент массива поместить в отдельном cookie.
 */

setcookie("arr[0]", "What was said was for you and for you alone.");
setcookie("arr[1][0]", "Whoa, deja vu.");
/**
 * По сути, cookie с именем arr[0] ничем не отличается с точки зрения браузера и сервера от обычного cookie.
 * Зато PHP, получив cookie с именем, содержащим квадратные скобки, поймет, что это на самом деле элемент массива, и создаст его (массив)
 * как элементы $_COOKIE
 */

echo "Значение первого элемента cookie: {$_COOKIE['arr'][0]} <br/>";
echo "{$_COOKIE['arr'][1][0]} - What did you just say?";