<?php
/**
 * Чтение XML-файла
 *
 * Получить доступ к содержимому XML-файла в PHP-скрипте проще всего через класс SimpleXMLElement.
 * Конструктор имеет следующий синтаксис:
 * final public SimpleXMLElement::__construct(
 *  string $data [,
 *    int $options = 0, [,
 *      bool $data_is_url = false [,
 *        string $ns = "" [,
 *          bool $is_prefix = false
 *        ]
 *      ]
*     ]
 *  ]
 * )
 */

 ## Чтение XML-файла
 echo "<h3>Чтение XML-файла</h3>";
 $content = file_get_contents('rss.xml');
 $rss = new SimpleXMLElement($content);
 echo $rss->channel->title . "<br/>";
 echo $rss->channel->description . "<br/>";

 /**
  * Если в XML-файле встречается коллекция тегов, как в случае с тегом <item>,
  * они трансформируются в индексный массив.
  */
 echo "<h3>Коллекция тегов</h3>";
 foreach ($rss->channel->item as $item) {
     // echo strtotime($item->pubDate) . "<br/>";
     echo date("Y.m.d H:i", strtotime($item->pubDate)) . " ";
     echo $item->title . "<br/>";
 }

 /**
  * public int SimpleXMLElement::count(void)
  * Возвращает количество элементов в коллекции.
  */
  ## Количество элементов в коллекции
  echo $rss->channel->item->count(); // 3
  echo "<br/>";

  /**
   * Для работы с атрибутами тега предусмотрен специальный метод attributes(), который имеет следующий синтаксис
   * public SimpleXMLElement SimpleXMLElement::attributes([
   *    string $ns = NULL [,
   *        bool $is_prefix = false
   *    ]
   * ])
   * Параметр $ns предназначен для задания пространства имен и рассматривается как префикс, если значение параметра $is_prefix установлено
   * в true, иначе параметр $ns рассматривается как URL.
   */
  ## Список атрибутов
  foreach ($rss->channel->item[0]->enclosure->attributes() as $name => $value) {
      echo "{$name} = {$value}<br/>";
  }
  echo "<br/>";
  // Также получить доступ к атрибутам можно как к элементам ассоциативного массива
  foreach ($rss->channel->item as $item) {
      echo $item->enclosure['url'] . "<br/>";
  }