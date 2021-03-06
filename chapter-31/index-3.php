<?php
/**
 * Получение выведенных заголовков
 * Прежде чем отправиться в браузер, все заголовки ответа накапливаются в специальном буфере.
 * Вы можете в любой момент получить содержимое при помощи описанной далее функции.
 * list headers_list()
 * Функция возвращает все заголовки, содержащиеся в буфере и отправленные скриптом до этого (в том числе явно,
 * при помощи функции header() или setcookie()). Результирующий список содержит строковые элементы следующего вида:
 * ИмяЗаголовка: ЗначениеЗаголовка
 * Например: Content-Type: text/plain
 */