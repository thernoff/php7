<?php
## Обращение к серверу точного времени
// Задаем адрес удаленного сервера
$curl = curl_init("http://wwv.nist.gov:13");
// Получаем содержимое
echo curl_exec($curl);
// Закрываем CURL-соединение
curl_close($curl);