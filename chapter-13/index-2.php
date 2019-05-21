<?php
// Вывод UTF-8 символа русской буквы А
echo "\u{0410}<br/>";

// Проблемы с обработкой UTF-8 в PHP
$str = "Hello world";
echo "{$str[2]}<br/>"; // l
$str = "Привет мир!";
echo "{$str[2]}<br/>"; // �

echo "В строке &quot;$str&quot; " . strlen($str) . " байт<br/>"; // 20
echo "В строке &quot;$str&quot; " . mb_strlen($str) . " байт<br/>"; // 11