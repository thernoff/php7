<?php
## Отправка данных методом POST
$curl = curl_init("http://php7/chapter-39/handler.php");
curl_setopt($curl, CURLOPT_POST, 1);
$data = "name=" . urlencode("Александр") . "&pass=" . urlencode("123") . "\r\n\r\n";
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_exec($curl);
curl_close($curl);