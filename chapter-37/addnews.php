<?php
require_once("connect_db.php");

try {
// Проверяем, заполнены ли поля HTML-формы
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);

if (!$name || !$content) {
  exit('Не заполнено одно или несколько полей формы');
}

// Добавляем  новостное сообщение в таблицу news
$query = "INSERT INTO news VALUES (NULL, :name, NOW())";
$stmtNews = $pdo->prepare($query);
$stmtNews->execute(['name' => $name]);

// Получаем только что сгенерированный идентификатор news_id
$newsId = $pdo->lastInsertId();

// Вставляем содержимое новостного сообщения в таблицу news_contents
// Формируем запросы
$query = "INSERT INTO news_contents VALUES (NULL, :content, :news_id)";
$stmtContent = $pdo->prepare($query);
$stmtContent->execute(['content' => $content, 'news_id' => $newsId]);

// Осуществляем переадресацию на главную страницу
header("Location: news.php");
} catch (PDOException $e) {
  echo "Ошибка выполнения запроса: " . $e->getMessage();
}