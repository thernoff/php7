<?php
// Вложенные функции
// Стандарт PHP не поддерживает вложенные функции. Вместо того чтобы, как и у переменных, ограничить область видимости для вложенных функций своими
// "родителями", PHP делает из доступными для всей остальной части программы, но только с того момента, когда "функция-родитель" была из нее вызвана.
function father($a) {
    echo $a, "<br/>";
    function child($b) {
        echo $b + 1, "<br/>";
        return $b * $b;
    }

    return $a * $a * child($a);
    // Фактически возвращает $a * $a * ($a + 1) * ($a + 1)
}

// Вызываем функции
echo father(10), "<br/>";
echo child(30), "<br/>";

// Будет ошибка
// echo child(30), "<br/>";
// echo father(10), "<br/>";

// Будет ошибка, при вызове функции father во второй раз.
// echo father(30), "<br/>";
// echo father(10), "<br/>";