<?php
require_once("connect_db.php");

$query = "SELECT * FROM news INNER JOIN news_contents ON news.news_id = news_contents.news_id";
try {
  $stmt = $pdo->query($query);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Ошибка: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Новости</h3>
  <?php foreach($rows as $row): ?>
  <h4><?= $row['name']; ?> <small>[<?= $row['putdate']; ?>]</small></h4>
  <div><?= $row['content']; ?></div>
  <?php endforeach; ?>
</body>
</html>