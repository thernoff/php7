<?php
// Экранирование символов
// Функция preg_quote() принимает на вход некоторую строку и экранирует в ней следующие символы: . \ + * ? [ ^ ] $ ( ) { } = ! < > | : -
// Переменная $highlight хранит некоторое слово или фразу с пробелами. Мы хотим выделить эту фразу жирным шрифтом в тексте HTML-страницы.
$highlight = "tempor - incididunt";
$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor - incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
// Экранируем все спецсимволы
$re = preg_quote($highlight, "/"); // tempor \- incididunt
// Заменяем пробельные символы на \s+ - это позволит совпадать пробелам в $highlight с любыми пробельными символами в $text.
$re = preg_replace('/\s+/', '\\s+', $re); // tempor\s+\-\s+incididunt
echo preg_replace("/($re)/s", '<b>$1</b>', $text);
echo "<br/>";
echo "<br/>";
// Фильтрация массива
// Функция preg_grep()
foreach (preg_grep('/5.php$/xs', glob("*")) as $fn) {
    echo "Имя файла: $fn<br/>";
}