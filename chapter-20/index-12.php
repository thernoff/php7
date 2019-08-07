<?php
// Другие возможности PCRE
// Поиск совпадений
// Все функции поиска по регулярному выражению по умолчанию работают в многострочном режиме,
// как будто бы указан модификатор /m. Для однострочного режима нужно использовать модификатор \s.

// Функция preg_match() ищет первое совпадение выражения в строке.
// Использование PREG_OFFSET_CAPTURE заставляет изменить формат списка $matches:
// теперь вместе с совпавшим текстом сохраняется такжи и позиция совпадения в исходной строке.
$st = '<b>Жирный текст</b>';
$re = '|<(\w+).*?>(.*?)</\1>|us';
preg_match($re, $st, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";
preg_match($re, $st, $matches, PREG_OFFSET_CAPTURE);
echo "<pre>";
print_r($matches);
echo "</pre>";

// Функция preg_match_all() ищет все совпадения. Возращает число найденных подстрок или 0, если ничего не найдено.
// Возможные константы для параметра $flags
// PREG_PATTERN_ORDER (по умолчанию) - список $matches содержит элементы, упорядоченные по номеру 
// открывающей скобки. Иными словами, к массиву нужно обращаться так: $matches[B][N], 
// где B - порядковый номер открывающей скобки в выражении, а N - номер совпадения, если их было несколько.

// PREG_SET_ORDER - список $matches оказывается отсортированным по номер совпадения.

// PREG_OFFSET_CAPTURE - величина которую можно прибавить к PREG_PATTERN_ORDER или PREG_SET_ORDER.
// Она заставляет PHP возвращать цифровые смещения найденных элементов вместе с их значениями.

// Различные флаги preg_match_all()
$flags = [
    "PREG_PATTERN_ORDER",
    "PREG_SET_ORDER",
    "PREG_OFFSET_CAPTURE"
];

$re = '| <(\w+) .*? > (.*?) </\1> |xs';
$text = "<b>текст</b> и еще <i>другой текст</i>";
echo "Строка: $text<br/>";
echo "Выражение: $re<br/>";

foreach ($flags as $name) {
    preg_match_all($re, $text, $matches, eval("return $name;"));
    echo "Флаг $name:<br/>";
    echo "<pre>";
    print_r($matches);
    echo "</pre>";
}