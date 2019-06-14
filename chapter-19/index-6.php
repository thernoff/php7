<?php
// Разбор timestamp
// getdate(int $timestamp) - возвращает ассоциативный массив, содержащий данные об
// указанном времени.
$arrDate = getdate(time());
echo "<pre>";
print_r($arrDate);
echo "</pre>";