<?php
/**
 * Функции для работы с DNS
 *
 * string gethostbyaddr(string $ip_address) функция возвращает доменное имя хоста, заданного своим IP-адресом. В случае ошибки
 * возвращается $ip_address.
 * Функция не гарантирует, что полученное имя будет на самом деле соответствовать действительности.
 */
echo gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo "<br/>";

echo gethostbyname("http://exler.ru");
echo "<br/>";

print_r(gethostbynamel("http://exler.ru"));
echo "<br/>";