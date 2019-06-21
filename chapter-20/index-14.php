<?php
// Разбиение по регулярному выражению
// Функция preg_split() - разбивает строку, руководствуясь регулярным выражением. Те участки строки, которые совпадают с этим выражением,
// и будут служить разделителями.
// PREG_SPLIT_NO_EMPTY - из результирующего списка будут удалены элементы, равные пустой строке.
// PREG_SPLIT_DELIM_CAPTURE - в список будут включены не только участки между совпадениями, но также и сами совпадения.
// PREG_SPLIT_OFFSET_CAPTURE - функция возвращает не массив строк, а массив списков.

// Выделение всех уникальных слов в текста
// Функция getUniques() выделяет из текста в $text все уникальные слова и возвращает их список.
// В необязательный параметр $nOrigWords помещается исходное число слов в тексте, которое было до "фильтрации" дубликатов.
function getUniques($text, &$nOrigWords = false) {
    // Сначала получаем все слова в тексте
    $words = preg_split("/ ([^[:alnum:]] | ['-])+/xs", $text);
    $nOrigWords = count($words);
    // Затем приводим слова к нижнему регистру
    $words = array_map("strtolower", $words);
    // Получаем уникальные значения
    $words = array_unique($words);
    return $words;
}

setlocale(LC_ALL, 'ru_RU.UTF-8');
$fname = "largetextfile.txt";
$text = file_get_contents($fname);
$uniq = getUniques($text, $nOrig);
echo "Было слов: $nOrig<br/>";
echo "Стало слов: " . count($uniq) . "<hr/>";
echo join(" ", $uniq);