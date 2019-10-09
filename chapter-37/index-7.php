<?php
/**
 * Параметризация SQL-запросов
 * Параметризованный запрос проходит несколько стадий: подготовки, связывания с переменными и выполнения.
 */

 ## Использование параметризованного запроса
 require_once("connect_db.php");

 try {
   $query = "SELECT * FROM catalogs WHERE catalog_id =:catalog_id";
   // PDO::prepare — Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
   $stmt = $pdo->prepare($query);
   // PDOStatement::execute — Запускает подготовленный запрос на выполнение
   $stmt->execute(['catalog_id' => 1]);
   echo $stmt->fetch()['name'];
 } catch (PDOException $e) {
   echo "Ошибка выполнения запроса: " . $e->getMessage();
 }