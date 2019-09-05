<?php
/**
 * Запрет кэширования
 * Вообще говоря, если браузер "захочет" сохранять страницу в кэше и затем постоянно выдавать пользователю одно и то же,
 * никакая сила не сможет запретить ему делать это.
 */

 // Запрет кэширования.
 ## Функция для запрета кэширования страницы браузером
 function nocache() {
   header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
   header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
   header("Cache-Control: no-cache, must-revalidate");
   header("Cache-Control: post-check=0,pre-check=0");
   header("Cache-Control: max-age=0");
   header("Pragma: no-cache");
 }