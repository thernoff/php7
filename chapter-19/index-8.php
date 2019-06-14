<?php
// Календарь на текущий месяц
/*
    Функция makeCalendar() формерует двумерный массив, представляющий собой календарь на указанный месяци и год.
    Массив состоит из строк, соответствующих неделям. Каждая строка - массив из элементов,
    которые равны числам (или пустой строке, если данная клетка календаря пуста).
*/
function makeCalendar($year, $month) {
    // Получаем номер дня недели для 1 числа месяца.
    // N - Порядковый номер дня недели в соответствии со стандартом ISO-8601
    // от 1 (понедельник) до 7 (воскресенье)
    $wday = date('N',  mktime(0,0,0,$month,1,$year));
    // Начинаем с этого числа в месяце (если меньше нуля или больше длины месяца,
    // тогда в календаре будет пропуск).
    $n = - ($wday - 2);
    $cal = [];
    // Проход по неделям
    for ($y = 0; $y < 6; $y++) {
        // Будущая строка. Вначале пуста.
        $row = [];
        $notEmpty = false;
        // Цикл внутри строки по дням недели.
        for ($x = 0; $x < 7; $x++, $n++) {
            // Текущее число > 0 и < длины месяца
            if (checkdate($month, $n, $year)) {
                // Да. Заполняем клетку.
                $row[] = $n;
                $notEmpty = true;
            } else {
                // Нет. Клетка пуста.
                $row[] = "";
            }
        }

        // Если в данной строке нет ни одного непустого элемента,
        // значит, месяц кончился.
        if (!$notEmpty) break;
        // Добавляем строку в массив.
        $cal[] = $row;
    }

    return $cal;
}

/* echo "<pre>";
print_r(makeCalendar(2019, 6));
echo "</pre>";
 */
// Формируем календарь на текущий месяц
$now = getdate();
$calendar = makeCalendar($now['year'], $now['mon']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Календарь на текущий месяц</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Пн</td>
            <td>Вт</td>
            <td>Ср</td>
            <td>Чт</td>
            <td>Пт</td>
            <td>Сб</td>
            <td>Вс</td>
        </tr>
        <?php foreach($calendar as $row): ?>
            <tr>
                <?php foreach($row as $i => $v):?>
                    <td style="<?= $i == 6 ? 'color: red' : ''?>">
                        <?= $v ? $v : "&nbsp;"?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>