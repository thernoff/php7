<?php
/**
 * Разбиение и "склеивание" URL
 * array parse_url(string $url)
 * Данная функция принимает на вход некоторый полный URL и разбирает его: выделяет имя протокола, адрес хоста и порт, URI и т.д.
 */
$url = "http://username:password@example.com:80/some/path?arg=value&name=John#anchor";
$arr = parse_url($url);
echo "<pre>";
print_r($arr);
echo "</pre>";

/* В итоге получим:
Array
(
    [scheme] => http
    [host] => example.com
    [port] => 80
    [user] => username
    [pass] => password
    [path] => /some/path
    [query] => arg=value&name=John
    [fragment] => anchor
)
*/

// В PHP нет функции, обратной parse_url().
// Напишем свою реализацию данной функции.
// Функция http_build_url() составляет URL по частям из массива $parsed.
function http_build_url($parsed) {
    if (!is_array($parsed)) {
        return false;
    }

    // Задан протокол?
    if (isset($parsed['scheme'])) {
        $sep = (strtolower($parsed['scheme']) == 'mailto') ? ':' : '://';
        $url = $parsed['scheme'] . $sep;
    } else {
        $url = '';
    }

    // Заданы пароль или имя пользователя?
    if (isset($parsed['pass']) && isset($parsed['user'])) {
        $url .= "$parsed[user]:$parsed[pass]@";
    } elseif (isset($parsed['user'])) {
        $url .= "$parsed[user]@";
    }

    // QUERY_STING представлена в виде массива?
    if (@!is_scalar($parsed['query'])) {
        // преобразуем в строку
        $parsed['query'] = http_build_query($parsed['query'], "&");
    }

    // дальше составляем URL
    if (isset($parsed['host'])) $url .= $parsed['host'];
    if (isset($parsed['port'])) $url .= $parsed['port'];
    if (isset($parsed['path'])) $url .= $parsed['path'];
    if (isset($parsed['query'])) $url .= "?" . $parsed['query'];
    if (isset($parsed['fragment'])) $url .= "#" . $parsed['fragment'];
    return $url;
}

## Модификация части URL.
// URL с которым будем работать
$url = "http://user@example.com:80/path?arg=value#anchor";

// Разбираем URL на части
$parsed = parse_url($url);
// Разбираем одну из частей, QUERY_STRING, на элементы массива
parse_str(@$parsed['query'], $query);
// Добавляем новый элемент в массив QUERY_STRING
$query['names']['read'] = 'tom';
// Собираем QUERY_STRING назад из массива
$parsed['query'] = http_build_query($query, "&");
// Создаем результирующий URL
$newUrl = http_build_url($parsed);
// Выводим результаты работы
echo "Старый URL: {$url}<br/>";
echo "Новый URL: {$newUrl}<br/>";

parse_str($parsed['query'], $out);
echo "<pre>";
print_r($out);
echo "</pre>";