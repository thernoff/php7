<?php
// Работа со временем по GMT.
date_default_timezone_set('Europe/Moscow');

// Вычисляет timestamp в Гринвиче, который соответствует локальному timestamp-формату
// Перевод временной метки в моей временной зоне во временную метку в Гринвиче.
function local2gm($localStamp = false) {
    if ($localStamp === false) $localStamp = time();
    // Получаем смещение часовой зоны в секундах
    $tzOffset = date("Z", $localStamp);
    // Вычитаем разницу и получаем время по GMT
    return $localStamp - $tzOffset;
}

// Вычисляет локальный timestamp в Гринвиче, который соответствует timestamp-формату по GMT.
// Можно указать смещение локальной зоны относительно GMT (в часах), тогда будет осуществлен
// перевод в эту зону (а не текущую локальную).
// Перевод временной метки в Гринвиче во временную метку в моей временной зоне.
function gm2local($gmStamp = false, $tzOffset = false) {
    if ($gmStamp === false) return time();
    // Получаем смещение часовой зоны в секундах
    if ($tzOffset === false) 
        $tzOffset = date("Z", $gmStamp);
    else
        $tzOffset *= 60 * 60;

    // Вычитаем разницу и получаем время по GMT
    return $gmStamp + $tzOffset;
}

echo "Текущая временная метка в моей временной зоне: " . time();
echo "<br/>";
echo "Текущая временная метка в Гринвиче: " . local2gm();
echo "<br/>";
echo "Разница между временными метками: " . (local2gm() - time());
echo "<br/>";
echo "Временная метка в Гринвиче в моей временной зоне: " . gm2local();
echo "<br/>";
echo "Форматированное значение: " . date("Y-m-d H:i", gm2local());