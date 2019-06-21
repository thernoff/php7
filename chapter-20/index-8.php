<?php
// "Карманы"
// Пусть в строке задана дата в формате DD-MM-YYYY, в ней могут находиться паразитные пробелы в начале
// и конце, а вместо дефисов случайно встречаются вообще любые знаки пунктуации, "пересыпанные" пробелами
// (слеши, точки, символы подчеркивания).
// Модификатор /x заставляет анализатор PCRE игнорировать все пробельные символы в выражении
// (за исключением явно указанных как \s или внутри квадратных скобок) - это позволяет записать
// выражение более красиво.
// Благодаря ему можно в регулярном выражении использовать комментарии, игнорировать переводы строк.
$re = '|
    ^\s*(                       # начало строки
        (\d+)                   # день
            \s*[[:punct:]]\s*   # разделитель
    (\d+)                       # месяц
            \s*[[:punct:]]\s*   # разделитель
        (\d+))                  # год
\s*$                            # конец строки
|xs';
$d = '    12,03  _   2019 ';
preg_match($re, $d, $m);

echo($m[1]); // 12,03 _ 2019
echo '<br/>';
echo($m[2]); // 12
echo '<br/>';
echo($m[3]); // 03
echo '<br/>';
echo($m[4]); // 2019
echo "<br/>";
// Использование карманов в функции замены
$text = htmlspecialchars(file_get_contents(__FILE__));
$html = preg_replace('/(\$[a-z]\w*)/is', '<b>$1</b>', $text);
//echo "<pre>$html</pre>";
echo "<br/>";

// Использование карманов в функции сопоставления
// Конструкция .*? обозначает не "любое число любых символов, но не обязательно",
// заставляет звездочку "умерить аппетит" и совпасть не с максимальным, а с минимальным
// возможным числом символов.
//$re = '|<(\w+) [^>]* > (.*?) </\1>|xs';
$re = '|<(\w+)> (.*?) </\1>|xs';
$str = "Hello, this <pre>word</pre> is bold!!!";
preg_match($re, $str, $m) or die("Нет тегов.");
echo htmlspecialchars("'$m[2]' обрамлено тегом '$m[1]'");

// Игнорирование карманов
// Иногда требуется исключить карман из результирующего массива $matches или индекса.
// Сразу после открывающейся скобки указывается последовательность ?:
$str = "2015-12-15";
//$re = '|^(?:\d{4})-(?:\d{2})-(?:\d{2})$|';
$re = '|^(\d{4})-(\d{2})-(\d{2})$|';
preg_match($re, $str, $m) or die("Совпадения не найдены.");
echo "<pre>";
print_r($m);
echo "</pre>";

// Именованные карманы
$str = "2015-12-15";
$re = "|^(?<year>\d{4}) - (?<month>\d{2}) - (?'day'\d{2})$|x";
preg_match($re, $str, $m) or die("Совпадения не найдены.");
echo "<pre>";
print_r($m);
echo "</pre>";

// Мои примеры
$strTest1 = '  г. Вологда, ул. Чернышевского, д.23';
$strTest2 = '  город Вологда, у. Чернышевского, д23';
$strTest3 = '  г.   Вологда,    улица Чернышевского, д.345   ';
$strTest4 = '  г. Вологда,  ул Чернышевского, 45   ';

$reTest = '|^\s*
                (?:г\w*\.?)               # г., город
                \s*
                (?<city>\w{3,}),        # название города
                \s+ 
                (?:у\w*\.?)               # у., ул., улица
                \s*
                (?<street>\w{3,}),      # название улицы
                \s+
                (?:д\.?)?                  # д., дом
                \s*
                (?<number>\d+)          # номер дома
                \s* 
        |uxs';
//$reTest = '|г. Вологда|';
preg_match($reTest, $strTest4, $m) or die("Совпадения не найдены.");
echo "<pre>";
print_r($m);
echo "</pre>";