<?php
/**
 * Формирование XML-файла
 *
 * public SimpleXMLElement SimpleXMLElement::addChild(
 *  string $name [, string $value, [, string $namespace]]
 * )
 * Добавляет элемент с именем $name и значением $value. Необязательный элемент $namespace позволяет определить пространство имен XML.
 *
 * public void SimpleXMLElement::addAttribute(
 *  string $name, [, string $value, [, string $namespace]]
 * )
 * Добавляет атрибут с именем $name и значением $value. Необязательный элемент $namespace позволяет определить пространство имен XML.
 *
 * public mixed SimpleXMLElement::asXML([string $filename])
 * Возвращает XML-документ в виде строки, если указан необязательный параметр $filename, с именем файла; XML-документ сохраняется в файл.
 *
 * В качестве примера сформируем RSS-канал.
 */

## Формирования XML-файла
$content = '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"></rss>';
$xml = new SimpleXMLElement($content);
$rss = $xml->addChild('channel');

$rss->addChild('title', 'PHP');
$rss->addChild('link', 'http://example.com');
$rss->addChild('description', 'Портал, посвященный PHP');
$rss->addChild('language', 'ru');
$rss->addChild('pubDate', date('r'));

// установка соединения с базой данных
require_once("connect_db.php");

try {
$query = "SELECT * FROM `news_rss` ORDER BY pubdate DESC LIMIT 20";
$itm = $pdo->query($query);

while ($news = $itm->fetch()) {
$item = $rss->addChild('item');
$item->addChild('title', $news['name']);
$item->addChild('description', $news['content']);
$item->addChild('link', "http://example.com/news/{$news['id']}");
$item->addChild('guid', "news/{$news['id']}");
$item->addChild('pubDate', date('r', strtotime($news['pubdate'])));
$item->addChild('title', $news['name']);

if (!empty($news['media'])) {
$enclosure = $item->addChild('enclosure');
$url = "http://example.com/images/{$news['id']}/{$news['media']}";
$enclosure->addAttribute('url', $url);
$enclosure->addAttribute('type', 'image/jpeg');
}
}
} catch (PDOException $e) {
echo "Ошибка выполнения запроса: " . $e->getMessage();
}

$xml->asXML('build.xml');