<?php
// Григорианский календарь
// Получаем количество дней от 4714 года до н.э. (можно до 9999 года н.э.)
$gdc = GregorianToJD(6, 12, 2017);
echo $gdc; // 2457917
echo "<br/>";
echo JDToGregorian($gdc); // 6/12/2017