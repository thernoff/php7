<?php
/**
 * XPath
 * Выполняет для XML ту же роль, что и регулярные выражения для строк. Это специальный язык, для описания частей XML-документа.
 *
 * public array SimpleXMLElement::xpath(string $path)
 * Принимает XPath-путь $path и объект SimpleXMLElement с частью XML-дерева, которое описывается XPath-выражением.
 */

 ## Извлечение тегов <enclosure>
 $content = file_get_contents('rss.xml');
 $rss = new SimpleXMLElement($content);
 foreach ($rss->xpath('//enclosure') as $enclosure) {
     echo $enclosure['url'] . "<br/>";
 }
 ## Список атрибутов
 foreach ($rss->xpath('//item[1]/enclosure/@*') as $attr) {
     echo "{$attr}<br/>";
 }